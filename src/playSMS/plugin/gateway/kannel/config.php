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

// gateway configuration in registry
$reg = gateway_get_registry('kannel');

// plugin configuration
$plugin_config['kannel'] = [
	'name' => 'kannel',
	'url' => $reg['url'] ?: 'http://localhost:13131',
	'callback_url' => gateway_callback_url('kannel'),
	'callback_authcode' => $reg['callback_authcode'] ?? '',
	'callback_access' => $reg['callback_access'] ?: '127.0.0.1',
	'username' => $reg['username'] ?? '',
	'password' => $reg['password'] ?? '',
	'dlr_mask' => (int) ($reg['dlr_mask'] ?? 27),
	'additional_param' => $reg['additional_param'] ?? '',
	'default_status' => isset($reg['default_status']) && $reg['default_status'] ? 1 : 0,
	'admin_url' => $reg['admin_url'] ?: 'http://localhost:13000',
	'admin_password' => $reg['admin_password'] ?? '',
	'module_sender' => $reg['module_sender'] ?? '',
	'datetime_timezone' => $reg['datetime_timezone'] ?? '',
];

// smsc configuration
$plugin_config['kannel']['_smsc_config_'] = [
	'url' => _('Kannel send SMS URL'),
	'callback_authcode' => _('Callback authcode'),
	'callback_access' => _('Callback access'),
	'username' => _('Username'),
	'password' => _('Password'),
	'dlr_mask' => _('DLR mask'),
	'additional_param' => _('Additional URL parameter'),
	'default_status' => _('Default SMS status'),
	'admin_url' => _('Kannel admin URL'),
	'admin_password' => _('Kannel admin password'),
	'module_sender' => _('Module sender ID'),
	'module_timezone' => _('Module timezone'),
];
