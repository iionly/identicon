<?php

$user_guid = (int)get_input('user_guid');
$user = get_entity($user_guid);

$pref = get_input('preferIdenticon', false);
if (is_array($pref)){
        $pref = $pref[0];
}

if ($pref) {
  $user->preferIdenticon = true;
  unset($user->icontime);
  system_message(elgg_echo('identicon:identicon_yes'));
} else {
  $user->preferIdenticon = false;

  $filehandler = new ElggFile();
  $filehandler->owner_guid = $user->guid;
  $filehandler->setFilename("profile/{$user->guid}master.jpg");

  if ($filehandler->open("read")) {
    if ($contents = $filehandler->read($filehandler->getSize())) {
      $user->icontime = time();
    } else {
      unset($user->icontime);
    }
  }

  system_message(elgg_echo('identicon:identicon_no'));
}

forward(REFERER);