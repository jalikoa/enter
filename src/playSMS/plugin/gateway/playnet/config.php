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
$reg = gateway_get_registry('playnet');

// plugin configuration
$plugin_config['playnet'] = [
	'name' => 'playnet',
	'callback_url' => gateway_callback_url('playnet'),
	'callback_authcode' => isset($reg['callback_authcode']) && $reg['callback_authcode'] ? $reg['callback_authcode'] : '',
	'callback_access' => isset($reg['callback_access']) && $reg['callback_access'] ? $reg['callback_access'] : '',
	'playnet_server' => isset($reg['playnet_server']) && $reg['playnet_server'] ? 1 : 0,
	'playnet_client' => isset($reg['playnet_client']) && $reg['playnet_client'] ? 1 : 0,
	'server_callback_url' => isset($reg['server_callback_url']) && $reg['server_callback_url'] ? $reg['server_callback_url'] : '',
	'server_pause' => isset($reg['server_pause']) && $reg['server_pause'] ? 1 : 0,
	'poll_interval' => isset($reg['poll_interval']) && (int) $reg['poll_interval'] > 0 ? (int) $reg['poll_interval'] : 10,
	'poll_limit' => isset($reg['poll_limit']) && (int) $reg['poll_limit'] > 0 ? (int) $reg['poll_limit'] : 10,
	'module_sender' => isset($reg['module_sender']) ? $reg['module_sender'] : '',
	'datetime_timezone' => isset($reg['datetime_timezone']) ? $reg['datetime_timezone'] : '',
];

// smsc configuration
$plugin_config['playnet']['_smsc_config_'] = [
	'callback_authcode' => _('Callback authcode'),
	'callback_access' => _('Callback access'),
	'playnet_server' => _('This playSMS is playnet server'),
	'playnet_client' => _('This playSMS is playnet client'),
	'server_callback_url' => _('Playnet server callback URL'),
	'server_pause' => _('Pause access to playnet server'),
	'module_sender' => _('Module sender ID'),
	'module_timezone' => _('Module timezone')
];
