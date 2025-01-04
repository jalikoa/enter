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

error_reporting(0);

// load callback init
if (!(isset($PLAYSMS_INIT_SKIP) && $PLAYSMS_INIT_SKIP === true) && is_file('../common/callback_init.php')) {
	include '../common/callback_init.php';
}

// log original request
_log($_REQUEST, 3, "kannel callback");

// get SMS data from request
$dlr_marker = (int) ($_REQUEST['dlr'] ?? 0);
$mo_marker = (int) ($_REQUEST['mo'] ?? 0);
$authcode = $_REQUEST['authcode'] ?? '';
$smslog_id = $_REQUEST['smslog_id'] ?? '';
$type = (int) ($_REQUEST['type'] ?? 0);
$uid = (int) ($_REQUEST['uid'] ?? 0);
$sms_datetime = core_get_datetime();
$sms_sender = isset($_REQUEST['q']) ? core_sanitize_sender($_REQUEST['q']) : '';
$sms_receiver = isset($_REQUEST['Q']) ? core_sanitize_mobile($_REQUEST['Q']) : '';
$message = $_REQUEST['a'] ?? '';
$smsc = $_REQUEST['smsc'] ?? '';

if (!($dlr_marker || $mo_marker)) {
	_log("error invalid authcode:" . $authcode . " dlr:" . $dlr_marker . " mo:" . $mo_marker . " smsc:" . $smsc . " smslog_id:" . $smslog_id . " type:" . $type . " uid:" . $uid . " from:" . $sms_sender . " to:" . $sms_receiver . " content:[" . $message . "]", 2, "kannel callback");
	ob_end_clean();

	echo "invalid";
	exit();
}

// validate authcode
if (!gateway_callback_auth('kannel', 'callback_authcode', $authcode, $smsc)) {
	_log("error unauthorized authcode:" . $authcode . " dlr:" . $dlr_marker . " mo:" . $mo_marker . " smsc:" . $smsc . " smslog_id:" . $smslog_id . " type:" . $type . " uid:" . $uid . " from:" . $sms_sender . " to:" . $sms_receiver . " content:[" . $message . "]", 2, "kannel callback");

	ob_end_clean();
	echo "unauthorized";
	exit();
}

// validate _REQUEST must be coming from callback servers
if (!gateway_callback_access('kannel', 'callback_access', $smsc)) {
	_log("error forbidden authcode:" . $authcode . " dlr:" . $dlr_marker . " mo:" . $mo_marker . " smsc:" . $smsc . " smslog_id:" . $smslog_id . " type:" . $type . " uid:" . $uid . " from:" . $sms_sender . " to:" . $sms_receiver . " content:[" . $message . "]", 2, "kannel callback");

	ob_end_clean();
	echo "forbidden";
	exit();
}

// handle DLR
if ($dlr_marker) {
	if ($type && $smslog_id && $uid) {
		// log it
		_log("dlr type:" . $type . " smslog_id:" . $smslog_id . " uid:" . $uid . " smsc:" . $smsc, 2, "kannel callback");

		switch ($type) {
			case 8: // delivered to SMSC = sent
			case 9: // sent
			case 12: // sent
				$p_status = 1;
				break;
			case 2: // undelivered to phone = failed
			case 16: // undelivered to phone = failed
			case 18: // failed
				$p_status = 2;
				break;
			case 1: // delivered to phone = delivered
				$p_status = 3;
				break;
			case 4: // queued on SMSC = pending
			default: // unknown type = pending
				$p_status = 0;
		}
		dlr($smslog_id, $uid, $p_status);
	}
}

// handle incoming SMS (MO)
if ($mo_marker) {
	if ($sms_sender && $message) {
		// log it
		_log("mo dt:" . $sms_datetime . " from:" . $sms_sender . " to:" . $sms_receiver . " message:[" . $message . "] smsc:" . $smsc, 2, "kannel callback");

		// save incoming SMS for further processing
		$sms_recvlog_id = recvsms($sms_datetime, $sms_sender, $message, $sms_receiver, $smsc);
	}
}

ob_end_clean();
echo "ok";
exit();
