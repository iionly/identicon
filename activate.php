<?php

$plugin = elgg_get_plugin_from_id('identicon');

if ((!function_exists('imageantialias')) || (!function_exists('imagerotate'))) {
	register_error(elgg_echo('denticon:missing_function'));
	$plugin->deactivate();
}