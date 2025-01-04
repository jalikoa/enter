<?php

/**
 * This file is part of playSMS.
 *
 * playSMS is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * playSMS is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with playSMS. If not, see <http://www.gnu.org/licenses/>.
 */
defined('_SECURE_') or die('Forbidden');

/**
 * This function hooks sendsms() and called by daemon sendsmsd
 * 
 * @param string $smsc Selected SMSC
 * @param string $sms_sender SMS sender ID
 * @param string $sms_footer SMS message footer
 * @param string $sms_to Mobile phone number
 * @param string $sms_msg SMS message
 * @param int $uid User ID
 * @param int $gpid Group phonebook ID
 * @param int $smslog_id SMS Log ID
 * @param string $sms_type Type of SMS
 * @param int $unicode Indicate that the SMS message is in unicode
 * @return bool true if delivery successful
 */
function kannel_hook_sendsms($smsc, $sms_sender, $sms_footer, $sms_to, $sms_msg, $uid = 0, $gpid = 0, $smslog_id = 0, $sms_type = 'text', $unicode = 0)
{
	global $plugin_config;

	// override $plugin_config by $plugin_config from selected SMSC
	$plugin_config = gateway_apply_smsc_config($smsc, $plugin_config);

	// re-filter, sanitize, modify some vars if needed
	$module_sender = isset($plugin_config['kannel']['module_sender']) && core_sanitize_sender($plugin_config['kannel']['module_sender'])
		? core_sanitize_sender($plugin_config['kannel']['module_sender']) : '';
	$sms_sender = $module_sender ?: core_sanitize_sender($sms_sender);
	$sms_to = core_sanitize_mobile($sms_to);
	$sms_footer = core_sanitize_footer($sms_footer);
	$sms_msg = stripslashes($sms_msg . $sms_footer);

	// log it
	_log("begin smsc:" . $smsc . " smslog_id:" . $smslog_id . " uid:" . $uid . " from:" . $sms_sender . " to:" . $sms_to, 3, "kannel_hook_sendsms");

	if ($sms_sender && $sms_to && $sms_msg) {
		$authcode = $plugin_config['kannel']['callback_authcode'] ?? '';
		$dlr_url = $plugin_config['kannel']['callback_url'] . "?dlr=1&authcode=" . $authcode . "&type=%d&smslog_id=" . $smslog_id . "&uid=" . $uid . "&smsc=" . $smsc;

		$URL = $plugin_config['kannel']['url'];
		$URL .= "/cgi-bin/sendsms?username=" . urlencode($plugin_config['kannel']['username']) . "&password=" . urlencode(htmlspecialchars_decode($plugin_config['kannel']['password']));
		$URL .= "&from=" . urlencode($sms_sender) . "&to=" . urlencode($sms_to);
		$URL .= "&dlr-mask=" . $plugin_config['kannel']['dlr_mask'] . "&dlr-url=" . urlencode($dlr_url);

		if ($sms_type == 'flash') {
			$URL .= "&mclass=0";
		}

		if ($unicode) {
			if (function_exists('mb_convert_encoding')) {
				$sms_msg = mb_convert_encoding($sms_msg, "UCS-2BE", "auto");
				$URL .= "&charset=UTF-16BE";
			}
			$URL .= "&coding=2";
		}

		if ($uid && $username = user_uid2username($uid)) {
			$URL .= "&account=" . $uid . "-" . $username; // eg: account=1-admin or account = 27-someuser1
		}
		$URL .= "&text=" . urlencode($sms_msg);

		$additional_param = "";
		if (isset($plugin_config['kannel']['additional_param']) && $additional_param = htmlspecialchars_decode($plugin_config['kannel']['additional_param'])) {
			$additional_param = "&" . $additional_param;
		}
		if ($additional_param) {
			$URL .= $additional_param;
		}
		$URL = str_replace("&&", "&", $URL);

		_log("URL:[" . $URL . "]", 3, "kannel_hook_sendsms");

		$response = core_get_contents($URL);
		if (($response == "Sent.") || ($response == "0: Accepted for delivery") || ($response == "3: Queued for later delivery")) {
			// set status according to default status
			$p_status = isset($plugin_config['kannel']['default_status']) && $plugin_config['kannel']['default_status'] ? 1 : 0;
			dlr($smslog_id, $uid, $p_status);

			_log("end smslog_id:" . $smslog_id . " p_status:" . $p_status . " response:" . $response, 3, "kannel_hook_sendsms");

			return true;
		}
	}

	// set status to failed
	$p_status = 2;
	dlr($smslog_id, $uid, $p_status);

	_log("end smslog_id:" . $smslog_id . " p_status:" . $p_status . " response:" . $response, 3, "kannel_hook_sendsms");

	return false;
}

function kannel_hook_call($requests)
{
	global $plugin_config;

	$PLAYSMS_INIT_SKIP = true;

	$access = $requests['access'];
	if ($access == 'dlr') {
		$fn = _APPS_PATH_PLUG_ . '/gateway/kannel/dlr.php';
		_log("start load:" . $fn, 2, "kannel call");
		include $fn;
		_log("end load dlr", 2, "kannel call");
	}
	if ($access == 'geturl') {
		$fn = _APPS_PATH_PLUG_ . '/gateway/kannel/geturl.php';
		_log("start load:" . $fn, 2, "kannel call");
		include $fn;
		_log("end load geturl", 2, "kannel call");
	}
}
