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

include $core_config['apps_path']['plug'] . "/gateway/kannel/config.php";

switch (_OP_) {
	case "manage":
		$tpl = [
			'name' => 'kannel_configuration',
			'vars' => [
				'Kannel send SMS URL' => _mandatory(_('kannel send SMS URL')),
				'Callback URL' => _('Callback URL'),
				'sms-service get-url' => _('sms-service get-url'),
				'Callback authcode' => _('Callback authcode'),
				'Callback access' => _('Callback access'),
				'Kannel send SMS username' => _('Kannel send SMS username'),
				'Kannel send SMS password' => _('Kannel send SMS password'),
				'Module sender ID' => _('Module sender ID'),
				'Module timezone' => _('Module timezone'),
				'DLR mask' => _('DLR mask'),
				'Additional parameters' => _('Additional parameters'),
				'Default SMS status' => _('Default SMS status'),
				'Save' => _('Save'),
				'Notes' => _('Notes'),
				'GET_URL' => '<strong>' . $plugin_config['kannel']['callback_url'] . '?mo=1&authcode=' . $plugin_config['kannel']['callback_authcode'] . '&t=%t&q=%q&a=%a&Q=%Q&smsc=%i</strong>',
				'HINT_CALLBACK_AUTHCODE' => _hint(_('Fill with at least 16 alphanumeric authentication code to secure callback URL')),
				'HINT_CALLBACK_ACCESS' => _hint(_('Fill with IP addresses (separated by comma) to limit access to callback URL')),
				'HINT_FILL_PASSWORD' => _hint(_('Fill to change the password')),
				'HINT_DLR_MASK' => sprintf(_('See: %s'), _a('https://www.kannel.org/download/1.4.5/userguide-1.4.5/userguide.html#delivery-reports', _('Kannel delivery reports guide'), '', '', '_blank')),
				'HINT_DEFAULT_STATUS' => _hint(_('Default SMS status after successful submission to Kannel sets to 0 for pending and 1 for sent')),
				'HINT_MODULE_SENDER' => _hint(_('Max. 16 numeric or 11 alphanumeric char. empty to disable')),
				'HINT_TIMEZONE' => _hint(_('Eg: +0700 for UTC+7 or Jakarta/Bangkok timezone')),
				'CALLBACK_URL_ACCESSIBLE' => _('Your callback URL must be accessible from IP addresses listed in callback access'),
				'CALLBACK_AUTHCODE' => sprintf(_('You have to include callback authcode as query parameter %s'), ': <strong>authcode</strong>'),
				'CALLBACK_ACCESS' => _('Your callback requests must be coming from IP addresses listed in callback access'),
				'REMOTE_PUSH_DLR' => _('Remote gateway or callback server will push DLR and incoming SMS to your callback URL'),
				'BUTTON_BACK' => _back('index.php?app=main&inc=core_gateway&op=gateway_list'),
				'gateway_name' => $plugin_config['kannel']['name'],
				'url' => $plugin_config['kannel']['url'],
				'callback_url' => $plugin_config['kannel']['callback_url'],
				'callback_authcode' => $plugin_config['kannel']['callback_authcode'],
				'callback_access' => $plugin_config['kannel']['callback_access'],
				'username' => $plugin_config['kannel']['username'],
				'dlr_mask' => $plugin_config['kannel']['dlr_mask'],
				'additional_param' => $plugin_config['kannel']['additional_param'],
				'default_status' => (int) $plugin_config['kannel']['default_status'],
				'module_sender' => $plugin_config['kannel']['module_sender'],
				'datetime_timezone' => $plugin_config['kannel']['datetime_timezone']
			],
		];
		$kannel_configuration_tpl = tpl_apply($tpl);

		$admin_password = $plugin_config['kannel']['admin_password'] ?? '';
		$admin_url = $plugin_config['kannel']['admin_url'] ?? 'http://localhost:13000';
		$url = $admin_url . '/status?password=' . $admin_password;
		$kannel_status = core_get_contents($url);
		_log('status url:' . $url . ' status:[' . substr($kannel_status, 0, 30) . '...]', 3, 'kannel_manage_update');

		$tpl = [
			'name' => 'kannel_operational',
			'vars' => [
				'Kannel admin URL' => _('kannel admin URL'),
				'Kannel admin password' => _('kannel admin password'),
				'Kannel status' => _('Kannel status'),
				'Update status' => _('Update status'),
				'Restart Kannel' => _('Restart Kannel'),
				'Save' => _('Save'),
				'HINT_FILL_PASSWORD' => _hint(_('Fill to change the password')),
				'admin_url' => $plugin_config['kannel']['admin_url'],
				'kannel_status' => $kannel_status,
			],
		];
		$kannel_operational_tpl = tpl_apply($tpl);

		$tpl = [
			'name' => 'kannel',
			'vars' => [
				'DIALOG_DISPLAY' => _dialog(),
				'Manage' => _('Manage'),
				'Gateway' => _('Gateway'),
				'Configuration' => _('Configuration'),
				'Operational' => _('Operational'),
				'BUTTON_BACK' => _back('index.php?app=main&inc=core_gateway&op=gateway_list'),
				'http_path_plug' => _HTTP_PATH_PLUG_,
				'kannel_configuration_tpl' => $kannel_configuration_tpl,
				'kannel_operational_tpl' => $kannel_operational_tpl,
			],
		];
		_p(tpl_apply($tpl));
		break;

	case "manage_save":
		$url = $_REQUEST['url'] ?: 'http://localhost:13031';
		$callback_url = gateway_callback_url('kannel');
		$callback_authcode = $_REQUEST['callback_authcode'] ?? '';
		$callback_authcode = core_sanitize_alphanumeric($callback_authcode);
		$callback_authcode = strlen($callback_authcode) >= 16 ? $callback_authcode : bin2hex(core_get_random_string(16));
		$callback_access = $_REQUEST['callback_access'] ?: '127.0.0.1';
		$callback_access = preg_replace('/[^0-9a-zA-Z\.,_\-\/]+/', '', $callback_access);
		$callback_access = preg_replace('/[,]+/', ',', $callback_access);
		$username = $_REQUEST['username'] ?? '';
		$password = $_REQUEST['password'] ?? '';
		$dlr_mask = (int) ($_REQUEST['dlr_mask'] ?? 27);
		$additional_param = $_REQUEST['additional_param'] ?? '';
		$default_status = isset($_REQUEST['default_status']) && $_REQUEST['default_status'] ? 1 : 0;
		$admin_url = $_REQUEST['admin_url'] ?? 'http://localhost:13000';
		$admin_password = $_REQUEST['admin_password'] ?? '';
		$module_sender = $_REQUEST['module_sender'] ?? '';
		$module_sender = core_sanitize_sender($module_sender);
		$datetime_timezone = $_REQUEST['datetime_timezone'] ?? '';
		if ($url) {
			$items = [
				'url' => $url,
				'callback_url' => $callback_url,
				'callback_authcode' => $callback_authcode,
				'callback_access' => $callback_access,
				'username' => $username,
				'dlr_mask' => $dlr_mask,
				'additional_param' => $additional_param,
				'default_status' => $default_status,
				'module_sender' => $module_sender,
				'datetime_timezone' => $datetime_timezone,
				'admin_url' => $admin_url,
			];
			if ($password) {
				$items['password'] = $password;
			}
			if ($admin_password) {
				$items['admin_password'] = $admin_password;
			}
			if (registry_update(0, 'gateway', 'kannel', $items)) {
				$_SESSION['dialog']['info'][] = _('Gateway module configurations has been saved');
			} else {
				$_SESSION['dialog']['danger'][] = _('Fail to save gateway module configurations');
			}
		} else {
			$_SESSION['dialog']['danger'][] = _('All mandatory fields must be filled');
		}
		header("Location: " . _u('index.php?app=main&inc=gateway_kannel&op=manage'));
		exit();

	case "manage_update":
		header("Location: " . _u('index.php?app=main&inc=gateway_kannel&op=manage'));
		exit();

	case "manage_restart":
		$admin_password = $plugin_config['kannel']['admin_password'] ?? '';
		$admin_url = $plugin['kannel']['admin_url'] ?? 'http://localhost:13000';
		$url = $admin_url . '/restart?password=' . $admin_password;
		$restart = core_get_contents($url);
		_log('restart kannel url:' . $url . ' status:' . $restart, 3, 'kannel_manage_restart');
		$_SESSION['dialog']['info'][] = _('Restart Kannel') . ' - ' . _('Status') . ': ' . $restart;
		header("Location: " . _u('index.php?app=main&inc=gateway_kannel&op=manage'));
		exit();
}
