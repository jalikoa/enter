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
function playnet_hook_sendsms($smsc, $sms_sender, $sms_footer, $sms_to, $sms_msg, $uid = 0, $gpid = 0, $smslog_id = 0, $sms_type = 'text', $unicode = 0)
{
	global $plugin_config;

	// override $plugin_config by $plugin_config from selected SMSC
	$plugin_config = gateway_apply_smsc_config($smsc, $plugin_config);

	// re-filter, sanitize, modify some vars if needed
	$module_sender = isset($plugin_config['playnet']['module_sender']) && core_sanitize_sender($plugin_config['playnet']['module_sender'])
		? core_sanitize_sender($plugin_config['playnet']['module_sender']) : '';
	$sms_sender = $module_sender ?: core_sanitize_sender($sms_sender);
	$sms_to = core_sanitize_mobile($sms_to);
	$sms_footer = core_sanitize_footer($sms_footer);
	$sms_msg = stripslashes($sms_msg . $sms_footer);

	// log it
	_log("begin smsc:" . $smsc . " smslog_id:" . $smslog_id . " uid:" . $uid . " from:" . $sms_sender . " to:" . $sms_to, 3, "playnet_hook_sendsms");

	if ($sms_sender && $sms_to && $sms_msg) {
		if ($plugin_config['playnet']['playnet_server']) {
			$now = core_get_datetime();

			$items = [
				'created' => $now,
				'last_update' => $now,
				'flag' => 1, // flag 1 = new SMS
				'uid' => $uid,
				'smsc' => $smsc,
				'smslog_id' => $smslog_id,
				'sender_id' => $sms_sender,
				'sms_to' => $sms_to,
				'message' => $sms_msg,
				'sms_type' => $sms_type,
				'unicode' => (int) $unicode ? 1 : 0,
			];
			if ($outgoing_id = dba_add(_DB_PREF_ . '_gatewayPlaynet_outgoing', $items)) {
				$p_status = 0; // pending
				dlr($smslog_id, $uid, $p_status);

				_log("end smslog_id:" . $smslog_id . " p_status:" . $p_status . " outgoind_id:" . $outgoing_id, 3, "playnet_hook_sendsms");

				return true;
			}
		} else if ($plugin_config['playnet']['playnet_client']) {
			// push outgoing to playnet server
			$server_url = $plugin_config['playnet']['server_callback_url'] . '?action=push_outgoing';
			if (isset($plugin_config['playnet']['callback_authcode']) && $plugin_config['playnet']['callback_authcode']) {
				$server_url .= '&authcode=' . $plugin_config['playnet']['callback_authcode'];
			}
			$server_url .= '&sms_sender=' . urlencode($sms_sender);
			$server_url .= '&sms_receiver=' . urlencode($sms_to);
			$server_url .= '&message=' . urlencode($sms_msg);
			$server_url .= '&sms_type=' . $sms_type;
			$server_url .= '&unicode=' . (int) $unicode;

			$response_raw = core_get_contents($server_url);
			$response = json_decode($response_raw, 1);

			if (isset($response) && is_array($response) && isset($response['status']) && strtoupper($response['status']) == 'OK') {
				$p_status = 1; // sent
				dlr($smslog_id, $uid, $p_status);

				_log("end smslog_id:" . $smslog_id . " p_status:" . $p_status, 3, "playnet_hook_sendsms");

				return true;
			}
		}
	}

	$p_status = 2; // failed
	dlr($smslog_id, $uid, $p_status);

	_log("end smslog_id:" . $smslog_id . " p_status:" . $p_status, 3, "playnet_hook_sendsms");

	return false;
}

/**
 * Playnet client periodically poll playnet server at poll_interval
 * 
 * @return void
 */
function playnet_hook_playsmsd()
{
	global $core_config, $plugin_config;

	if (!core_playsmsd_timer($plugin_config['playnet']['poll_interval'])) {

		return;
	}

	$smscs = gateway_getall_smsc_names('playnet');
	foreach ( $smscs as $smsc ) {
		$c_plugin_config = gateway_apply_smsc_config($smsc, $plugin_config);

		if ($c_plugin_config['playnet']['playnet_client'] && $c_plugin_config['playnet']['server_callback_url'] && !$c_plugin_config['playnet']['server_pause']) {

			// pull outgoing from playnet server
			$server_url = $c_plugin_config['playnet']['server_callback_url'] . '?action=pull_outgoing';
			if (isset($c_plugin_config['playnet']['callback_authcode']) && $c_plugin_config['playnet']['callback_authcode']) {
				$server_url .= '&authcode=' . $c_plugin_config['playnet']['callback_authcode'];
			}
			$server_url .= '&smsc=' . $c_plugin_config['playnet']['name'];

			$response_raw = core_get_contents($server_url);
			$response = json_decode($response_raw, 1);

			// validate response
			if (isset($response) && is_array($response) && isset($response['status']) && strtoupper($response['status']) == 'OK') {
				if (isset($response['data']) && is_array($response['data'])) {
					foreach ( $response['data'] as $data ) {
						$remote_smsc = $data['smsc'];
						$remote_smslog_id = $data['smslog_id'];
						$remote_uid = $data['uid'];
						$username = $c_plugin_config['playnet']['sendsms_username'];
						$sms_to = $data['sms_to'];
						$message = $data['message'];
						$unicode = core_detect_unicode($message);
						$sms_type = $data['sms_type'];
						$sms_sender = $data['sender_id'];
						_log('sendsms remote_smsc:' . $remote_smsc . ' remote_smslog_id:' . $remote_smslog_id . ' remote_uid:' . $remote_uid . ' u:' . $username . ' sender_id:' . $sms_sender . ' to:' . $sms_to . ' m:[' . $message . '] unicode:' . $unicode, 3, 'playnet_hook_playsmsd');

						if ($username && $sms_to && $message) {
							sendsms_helper($username, $sms_to, $message, $sms_type, $unicode, '', true, '', $sms_sender);
						}
					}
				}
			}
		}
	}
}
