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

if (!auth_isadmin()) {
	auth_block();
}

include $core_config['apps_path']['plug'] . "/gateway/playnet/config.php";

switch (_OP_) {
	case "manage":
		$tpl = [
			'name' => 'playnet',
			'vars' => [
				'DIALOG_DISPLAY' => _dialog(),
				'Manage' => _('Manage'),
				'Gateway' => _('Gateway'),
				'Callback URL' => _('Callback URL'),
				'Callback authcode' => _('Callback authcode'),
				'Callback access' => _('Callback access'),
				'Poll interval' => _('Poll interval'),
				'Poll limit' => _('Poll limit'),
				'Module sender ID' => _('Module sender ID'),
				'Module timezone' => _('Module timezone'),
				'Save' => _('Save'),
				'Notes' => _('Notes'),
				'HINT_CALLBACK_URL' => _hint(_('Empty callback URL to set default')),
				'HINT_CALLBACK_AUTHCODE' => _hint(_('Fill with at least 16 alphanumeric authentication code to secure callback URL')),
				'HINT_CALLBACK_ACCESS' => _hint(_('Fill with IP addresses (separated by comma) to limit access to callback URL')),
				'HINT_MODULE_SENDER' => _hint(_('Max. 16 numeric or 11 alphanumeric char. empty to disable')),
				'HINT_TIMEZONE' => _hint(_('Eg: +0700 for UTC+7 or Jakarta/Bangkok timezone')),
				'CALLBACK_URL_ACCESSIBLE' => _('Your callback URL must be accessible from IP addresses listed in callback access'),
				'CALLBACK_AUTHCODE' => sprintf(_('You have to include callback authcode as query parameter %s'), ': <strong>authcode</strong>'),
				'CALLBACK_ACCESS' => _('Your callback requests must be coming from IP addresses listed in callback access'),
				'BUTTON_BACK' => _back('index.php?app=main&inc=core_gateway&op=gateway_list'),
				'gateway_name' => $plugin_config['playnet']['name'],
				'url' => $plugin_config['playnet']['url'],
				'callback_url' => gateway_callback_url('playnet'),
				'callback_authcode' => $plugin_config['playnet']['callback_authcode'],
				'callback_access' => $plugin_config['playnet']['callback_access'],
				'poll_interval' => (int) $plugin_config['playnet']['poll_interval'],
				'poll_limit' => (int) $plugin_config['playnet']['poll_limit'],
				'module_sender' => $plugin_config['playnet']['module_sender'],
				'datetime_timezone' => $plugin_config['playnet']['datetime_timezone']
			]
		];
		_p(tpl_apply($tpl));
		break;

	case "manage_save":
		$callback_url = gateway_callback_url('playnet');
		$callback_authcode = isset($_REQUEST['callback_authcode']) && core_sanitize_alphanumeric($_REQUEST['callback_authcode'])
			? core_sanitize_alphanumeric($_REQUEST['callback_authcode']) : '';
		$callback_access = isset($_REQUEST['callback_access']) ? preg_replace('/[^0-9a-zA-Z\.,_\-\/]+/', '', trim($_REQUEST['callback_access'])) : '';
		$callback_access = preg_replace('/[,]+/', ',', $callback_access);
		$poll_interval = isset($_REQUEST['poll_interval']) && (int) $_REQUEST['poll_interval'] > 0 ? (int) $_REQUEST['poll_interval'] : 10;
		$poll_limit = isset($_REQUEST['poll_limit']) && (int) $_REQUEST['poll_limit'] > 0 ? (int) $_REQUEST['poll_limit'] : 400;
		$module_sender = core_sanitize_sender($_REQUEST['module_sender']);
		$datetime_timezone = $_REQUEST['datetime_timezone'];
		if ($poll_interval && $poll_limit) {
			$items = [
				'callback_url' => $callback_url,
				'callback_authcode' => $callback_authcode,
				'callback_access' => $callback_access,
				'poll_interval' => $poll_interval,
				'poll_limit' => $poll_limit,
				'module_sender' => $module_sender,
				'datetime_timezone' => $datetime_timezone
			];
			if (registry_update(0, 'gateway', 'playnet', $items)) {
				$_SESSION['dialog']['info'][] = _('Gateway module configurations has been saved');
			} else {
				$_SESSION['dialog']['danger'][] = _('Fail to save gateway module configurations');
			}
		} else {
			$_SESSION['dialog']['danger'][] = _('All mandatory fields must be filled');
		}
		header("Location: " . _u('index.php?app=main&inc=gateway_playnet&op=manage'));
		exit();
}
