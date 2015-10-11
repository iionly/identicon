<?php

$user = $vars['entity'];

if ($user) {

	// call the hook directly to avoid overrides and other logic
	$wav = identicon_url($user, 'large');

	$img = '<img src="' . $wav . '" alt="identicon" />';

	$check = elgg_view('input/checkboxes', array(
		'name' => 'preferIdenticon',
		'options' => array(elgg_echo('identicon:preference_checkbox') => true),
		'value' => ($user->preferIdenticon ? true : false)
	));

	$submit = elgg_view('input/submit', array('value' => elgg_echo('save')));

	$form = elgg_view('input/form', array('action' =>  elgg_get_site_url() . "action/identicon/userpreference?user_guid={$user->guid}", 'body' => $img . "\n" . $check . "\n<br>" . $submit));

	$identicon_title = elgg_echo('identicon:title');
	$identicon_explanation = elgg_echo('identicon:explanation');


$output = <<<HTML
<div id="identicon-editusericon" class="elgg-divide-top mtl ptm">
	<label>$identicon_title</label>
	<p>
		$identicon_explanation
	</p>
	$form
</div>
HTML;

	echo $output;
}