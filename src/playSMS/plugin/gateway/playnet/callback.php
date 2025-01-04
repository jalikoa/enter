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
_log($_REQUEST, 3, "playnet callback");

// get SMS data from request
$action = $_REQUEST['action'] ?? '';
$sms_datetime = core_get_datetime();
$sms_sender = isset($_REQUEST['sms_sender']) ? core_sanitize_sender($_REQUEST['sms_sender']) : '';
$sms_receiver = isset($_REQUEST['sms_receiver']) ? core_sanitize_mobile($_REQUEST['sms_receiver']) : '';
$message = $_REQUEST['message'] ?? '';
$unicode = (int) ($_REQUEST['unicode'] ?: 0);
$sms_type = $_REQUEST['sms_type'] ?? 'text';
$smsc = $_REQUEST['smsc'] ?? '';

$authcode = isset($_REQUEST['authcode']) && trim($_REQUEST['authcode']) ? trim($_REQUEST['authcode']) : '';

// validate authcode
if (!gateway_callback_auth('playnet', 'callback_authcode', $authcode, $smsc)) {
	_log("error auth authcode:" . $authcode . " smsc:" . $smsc . " remote_id:" . $remote_id . " from:" . $sms_sender . " to:" . $sms_receiver . " content:[" . $message . "]", 2, "playnet callback");

	ob_end_clean();
	exit();
}

// validate _REQUEST must be coming from callback servers
if (!gateway_callback_access('playnet', 'callback_access', $smsc)) {
	_log("error forbidden authcode:" . $authcode . " smsc:" . $smsc . " remote_id:" . $remote_id . " from:" . $sms_sender . " to:" . $sms_receiver . " content:[" . $message . "]", 2, "playnet callback");

	ob_end_clean();
	exit();
}

switch (strtolower($action)) {
	case 'pull_outgoing':
		$plugin_config = gateway_apply_smsc_config($smsc, $plugin_config);

		$rows = [];

		$conditions = [
			'flag' => 1, // get new SMS
			'smsc' => $smsc
		];
		$extras = [
			'LIMIT' => (int) $plugin_config['playnet']['poll_limit']
		];
		$list = dba_search(_DB_PREF_ . '_gatewayPlaynet_outgoing', 'id, smsc, smslog_id, uid, sender_id, sms_to, message, sms_type, unicode', $conditions, [], $extras);
		foreach ( $list as $data ) {
			$rows[] = [
				'smsc' => $data['smsc'],
				'smslog_id' => $data['smslog_id'],
				'uid' => $data['uid'],
				'sender_id' => $data['sender_id'],
				'sms_to' => $data['sms_to'],
				'message' => $data['message'],
				'sms_type' => $data['sms_type'],
				'unicode' => $data['unicode']
			];

			// update flag
			$items = [
				'flag' => 2 // SMS has been processed
			];
			$condition = [
				'flag' => 1,
				'id' => (int) $data['id']
			];
			if (dba_update(_DB_PREF_ . '_gatewayPlaynet_outgoing', $items, $condition, 'AND')) {
				// update dlr
				$p_status = 1;
				dlr($data['smslog_id'], $data['uid'], $p_status);
			}
		}

		$content = [];
		if (count($rows)) {
			$content['status'] = 'OK';
			$content['data'] = $rows;
		} else {
			$content['status'] = 'ERROR';
			$content['error_string'] = 'No outgoing data';
		}

		ob_end_clean();
		echo json_encode($content);
		exit();

	case 'push_outgoing':
		$username = $plugin_config['playnet']['username'] ?? '';

		if (user_username2uid($username) && $sms_to && $message) {
			if ($returns = sendsms_helper($username, $sms_to, $message, $sms_type, $unicode, '', true, '', $sms_sender)) {

				ob_end_clean();
				echo json_encode([
					'status' => 'OK',
					'data' => $returns,
				]);
				exit();
			}
		}

		ob_end_clean();
		echo json_encode([
			'status' => 'ERROR',
			'error_string' => 'ERROR',
		]);
		exit();

	case 'push_incoming':
		if ($sms_datetime && $sms_receiver && $message) {
			// log it
			_log("push_incoming dt:" . $sms_datetime . " from:" . $sms_sender . " to:" . $sms_receiver . " message:[" . $message . "] smsc:" . $smsc, 2, "playnet callback");

			// save incoming SMS for further processing
			if ($recvlog_id = recvsms($sms_datetime, $sms_sender, $message, $sms_receiver, $smsc)) {

				ob_end_clean();
				echo json_encode([
					'status' => 'OK',
					'data' => [
						'recvlog_id' => $recvlog_id,
					]
				]);
				exit();
			}
		}

		ob_end_clean();
		echo json_encode([
			'status' => 'ERROR',
			'error_string' => 'ERROR',
		]);
		exit();
}
