<?php

$group_guid = get_input('group_guid');

if($group_guid) {
    $group = get_entity($group_guid);

    $pref = get_input('preferGroupIdenticon', false);
    if (is_array($pref)){
        $pref = $pref[0];
    }

    if ($pref) {
        $group->preferGroupIdenticon = true;
        unset($group->icontime);
        system_message(elgg_echo('identicon:group_identicon_yes'));
    } else {
        $group->preferGroupIdenticon = false;
        $group->icontime = time();
        system_message(elgg_echo('identicon:group_identicon_no'));
    }
}

forward(REFERER);