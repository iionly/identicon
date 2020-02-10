<?php
use Elgg\DefaultPluginBootstrap;

class Identicon extends DefaultPluginBootstrap {

  public function init() {
  	elgg_extend_view('core/avatar/upload', 'identicon/editusericon');
  	elgg_extend_view('groups/edit', 'identicon/editgroupicon');

  	elgg_register_plugin_hook_handler('entity:icon:url', 'user', 'identicon_usericon_hook', 900);
  	elgg_register_plugin_hook_handler('entity:icon:url', 'group', 'identicon_groupicon_hook', 900);
  }
  
  public function activate() {
    $plugin = elgg_get_plugin_from_id('identicon');

    if ((!function_exists('imageantialias')) || (!function_exists('imagerotate'))) {
    	register_error(elgg_echo('identicon:missing_function'));
    	$plugin->deactivate();
    }
  }
}