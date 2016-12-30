<?php

if (!empty($vars["entity"])) {
	$group = $vars['entity'];
	$group_guid = $group->guid;

	// call the hook directly to avoid overrides and other logic
	$wav = identicon_url($group, 'large');

	$img = '<img src="' . $wav . '" alt="identicon" />';

	$check = elgg_view('input/checkboxes', array(
		'name' => 'preferGroupIdenticon',
		'options' => array(elgg_echo('identicon:group_preference_checkbox') => true),
		'value' => ($group->preferGroupIdenticon ? true : false)
	));

	$submit = elgg_view('input/submit', array('value' => elgg_echo('save')));

	$form = elgg_view('input/form', array('action' =>  elgg_get_site_url() . "action/identicon/grouppreference?group_guid=$group_guid", 'body' => $img . "\n" . $check . "\n<br>" . $submit));

	$identicon_title = elgg_echo('identicon:title');
	$identicon_explanation = elgg_echo('identicon:group_explanation');

$output = <<<HTML
<div id="identicon-editgroupicon" class="elgg-divide-top mtl ptm">
	<label>$identicon_title</label>
	<p>
		$identicon_explanation
	</p>
	$form
</div>
HTML;

	echo $output;
}
