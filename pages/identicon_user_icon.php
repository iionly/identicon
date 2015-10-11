<?php
/**
 * View Identicon user icon
 */

$user_guid = get_input('user_guid');
if ($user_guid) {
	$user = get_entity($user_guid);
}

// Get the size
$size = strtolower(get_input('size'));
if (!in_array($size, array('master', 'large', 'medium', 'small', 'tiny', 'topbar'))) {
	$size = 'medium';
}

// If user doesn't exist, return default icon
if (!$user || !($user instanceof ElggUser)) {
	$url = "_graphics/icons/default/{$size}.png";
	$url = elgg_normalize_url($url);
	forward($url);
}

$seed = identicon_seed($user);

// Try and get the icon
$filehandler = new ElggFile();
$filehandler->owner_guid = $user_guid;
$filehandler->setFilename("identicon/" . $seed . '/' . $size . ".jpg");

$success = false;

try {
	if ($filehandler->open("read")) {
		if ($contents = $filehandler->read($filehandler->getSize())) {
			$success = true;
		}
	}
} catch (InvalidParameterException $e) {
	elgg_log("Unable to get Identicon for user with GUID $user_guid", 'ERROR');
}

if (!$success) {
	$url = "_graphics/icons/user/default{$size}.gif";
	$url = elgg_normalize_url($url);
	forward($url);
}

header("Content-type: image/jpeg", true);
header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', strtotime("+6 months")), true);
header("Pragma: public", true);
header("Cache-Control: public", true);
header("Content-Length: " . strlen($contents));

echo $contents;
