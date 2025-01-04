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
$reg = gateway_get_registry('generic');

// plugin configuration
$plugin_config['generic'] = [
	'name' => 'generic',
	'default_url' => 'http://example.com/?user={GENERIC_API_USERNAME}&pwd={GENERIC_API_PASSWORD}&sender={GENERIC_SENDER}&msisdn={GENERIC_TO}&message={GENERIC_MESSAGE}',
	'url' => isset($reg['url']) && $reg['url'] ? $reg['url'] : $plugin_config['generic']['default_url'],
	'callback_url' => gateway_callback_url('generic'),
	'callback_authcode' => isset($reg['callback_authcode']) && $reg['callback_authcode'] ? $reg['callback_authcode'] : '',
	'callback_access' => isset($reg['callback_access']) && $reg['callback_access'] ? $reg['callback_access'] : '',
	'http_method' => isset($reg['http_method']) && (strtoupper($reg['http_method']) == 'GET' || strtoupper($reg['http_method']) == 'POST') ? strtoupper($reg['http_method']) : 'GET',
	'api_username' => isset($reg['api_username']) && $reg['api_username'] ? $reg['api_username'] : '',
	'api_password' => isset($reg['api_password']) && $reg['api_password'] ? $reg['api_password'] : '',
	'module_sender' => isset($reg['module_sender']) ? $reg['module_sender'] : '',
	'datetime_timezone' => isset($reg['datetime_timezone']) ? $reg['datetime_timezone'] : '',
];

// smsc configuration
$plugin_config['generic']['_smsc_config_'] = [
	'url' => _('Generic send SMS URL'),
	'callback_authcode' => _('Callback authcode'),
	'callback_access' => _('Callback access'),
	'http_method' => _('HTTP method'),
	'api_username' => _('API username'),
	'api_password' => _('API password'),
	'module_sender' => _('Module sender ID'),
	'datetime_timezone' => _('Module timezone')
];
