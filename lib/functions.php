<?php
/** generate sprite for corners and sides */
function identicon_getsprite($shape, $R, $G, $B, $rotation, $spriteZ) {
	$sprite = imagecreatetruecolor($spriteZ, $spriteZ);
	imageantialias($sprite, true);
	$fg = imagecolorallocate($sprite, $R, $G, $B);
	$bg = imagecolorallocate($sprite, 255, 255, 255);
	imagefilledrectangle($sprite, 0, 0, $spriteZ, $spriteZ, $bg);
	switch ($shape) {
		case 0: // triangle
			$shape = [
				0.5, 1,
				1, 0,
				1, 1
			];
			break;
		case 1: // parallelogram
			$shape = [
				0.5, 0,
				1, 0,
				0.5, 1,
				0, 1
			];
			break;
		case 2: // mouse ears
			$shape = [
				0.5, 0,
				1, 0,
				1, 1,
				0.5, 1,
				1, 0.5
			];
			break;
		case 3: // ribbon
			$shape = [
				0, 0.5,
				0.5, 0,
				1, 0.5,
				0.5, 1,
				0.5, 0.5
			];
			break;
		case 4: // sails
			$shape = [
				0, 0.5,
				1, 0,
				1, 1,
				0, 1,
				1, 0.5
			];
			break;
		case 5: // fins
			$shape = [
				1, 0,
				1, 1,
				0.5, 1,
				1, 0.5,
				0.5, 0.5
			];
			break;
		case 6: // beak
			$shape = [
				0, 0,
				1, 0,
				1, 0.5,
				0, 0,
				0.5, 1,
				0, 1
			];
			break;
		case 7: // chevron
			$shape = [
				0, 0,
				0.5, 0,
				1, 0.5,
				0.5, 1,
				0, 1,
				0.5, 0.5
			];
			break;
		case 8: // fish
			$shape = [
				0.5, 0,
				0.5, 0.5,
				1, 0.5,
				1, 1,
				0.5, 1,
				0.5, 0.5,
				0, 0.5
			];
			break;
		case 9: // kite
			$shape = [
				0, 0,
				1, 0,
				0.5, 0.5,
				1, 0.5,
				0.5, 1,
				0.5, 0.5,
				0, 1
			];
			break;
		case 10: // trough
			$shape = [
				0, 0.5,
				0.5, 1,
				1, 0.5,
				0.5, 0,
				1, 0,
				1, 1,
				0, 1
			];
			break;
		case 11: // rays
			$shape = [
				0.5, 0,
				1, 0,
				1, 1,
				0.5, 1,
				1, 0.75,
				0.5, 0.5,
				1, 0.25
			];
			break;
		case 12: // double rhombus
			$shape = [
				0, 0.5,
				0.5, 0,
				0.5, 0.5,
				1, 0,
				1, 0.5,
				0.5, 1,
				0.5, 0.5,
				0, 1
			];
			break;
		case 13: // crown
			$shape = [
				0, 0,
				1, 0,
				1, 1,
				0, 1,
				1, 0.5,
				0.5, 0.25,
				0.5, 0.75,
				0, 0.5,
				0.5, 0.25
			];
			break;
		case 14: // radioactive
			$shape = [
				0, 0.5,
				0.5, 0.5,
				0.5, 0,
				1, 0,
				0.5, 0.5,
				1, 0.5,
				0.5, 1,
				0.5, 0.5,
				0, 1
			];
			break;
		default: // tiles
			$shape = [
				0, 0,
				1, 0,
				0.5, 0.5,
				0.5, 0,
				0, 0.5,
				1, 0.5,
				0.5, 1,
				0.5, 0.5,
				0, 1
			];
			break;
	}

	// apply ratios
	for ($i = 0; $i < count($shape); $i++) {
		$shape[$i] = $shape[$i] * $spriteZ;
	}
	imagefilledpolygon($sprite, $shape, count($shape) / 2, $fg);
	// rotate the sprite
	for ($i = 0; $i < $rotation; $i++) {
		$sprite = imagerotate($sprite, 90, $bg);
	}

	return $sprite;
}

/** generate sprite for center block */
function identicon_getcenter($shape, $fR, $fG, $fB, $bR, $bG, $bB, $usebg, $spriteZ) {
	$sprite = imagecreatetruecolor($spriteZ, $spriteZ);
	imageantialias($sprite, true);
	$fg = imagecolorallocate($sprite, $fR, $fG, $fB);
	/** make sure there's enough contrast before we use background color of side sprite */
	if ($usebg > 0 && (abs($fR - $bR) > 127 || abs($fG - $bG) > 127 || abs($fB - $bB) > 127)) {
		$bg = imagecolorallocate($sprite, $bR, $bG, $bB);
	} else {
		$bg = imagecolorallocate($sprite, 255, 255, 255);
	}
	imagefilledrectangle($sprite, 0, 0, $spriteZ, $spriteZ, $bg);
	switch ($shape) {
		case 0: // empty
			$shape = [];
			break;
		case 1: // fill
			$shape = [
				0, 0,
				1, 0,
				1, 1,
				0, 1
			];
			break;
		case 2: // diamond
			$shape = [
				0.5, 0,
				1, 0.5,
				0.5, 1,
				0, 0.5
			];
			break;
		case 3: // reverse diamond
			$shape = [
				0, 0,
				1, 0,
				1, 1,
				0, 1,
				0, 0.5,
				0.5, 1,
				1, 0.5,
				0.5, 0,
				0, 0.5
			];
			break;
		case 4: // cross
			$shape = [
				0.25, 0,
				0.75, 0,
				0.5, 0.5,
				1, 0.25,
				1, 0.75,
				0.5, 0.5,
				0.75, 1,
				0.25, 1,
				0.5, 0.5,
				0, 0.75,
				0, 0.25,
				0.5, 0.5
			];
			break;
		case 5: // morning star
			$shape = [
				0, 0,
				0.5, 0.25,
				1, 0,
				0.75, 0.5,
				1, 1,
				0.5, 0.75,
				0, 1,
				0.25, 0.5
			];
			break;
		case 6: // small square
			$shape = [
				0.33, 0.33,
				0.67, 0.33,
				0.67, 0.67,
				0.33, 0.67
			];
			break;
		case 7: // checkerboard
			$shape = [
				0, 0,
				0.33, 0,
				0.33, 0.33,
				0.66, 0.33,
				0.67, 0,
				1, 0,
				1, 0.33,
				0.67, 0.33,
				0.67, 0.67,
				1, 0.67,
				1, 1,
				0.67, 1,
				0.67, 0.67,
				0.33, 0.67,
				0.33, 1,
				0, 1,
				0, 0.67,
				0.33, 0.67,
				0.33, 0.33,
				0, 0.33
			];
			break;
	}
	/** apply ratios */
	for ($i = 0; $i < count($shape); $i++) {
		$shape[$i] = $shape[$i] * $spriteZ;
	}
	if (count($shape) > 0) {
		imagefilledpolygon($sprite, $shape, count($shape) / 2, $fg);
	}
	return $sprite;
}

/** Builds the avatar. */
function identicon_build($seed, $file) {

	elgg_call(ELGG_IGNORE_ACCESS, function() use ($seed, $file) {
	/** parse hash string */
	$csh = hexdec(substr($seed, 0, 1)); // corner sprite shape
	$ssh = hexdec(substr($seed, 1, 1)); // side sprite shape
	$xsh = hexdec(substr($seed, 2, 1)) & 7; // center sprite shape

	$cro = hexdec(substr($seed, 3, 1)) & 3; // corner sprite rotation
	$sro = hexdec(substr($seed, 4, 1)) & 3; // side sprite rotation
	$xbg = hexdec(substr($seed, 5, 1)) % 2; // center sprite background

	/** corner sprite foreground color */
	$cfr = hexdec(substr($seed, 6, 2));
	$cfg = hexdec(substr($seed, 8, 2));
	$cfb = hexdec(substr($seed, 10, 2));

	/** side sprite foreground color */
	$sfr = hexdec(substr($seed, 12, 2));
	$sfg = hexdec(substr($seed, 14, 2));
	$sfb = hexdec(substr($seed, 16, 2));

	/** final angle of rotation */
	$angle = hexdec(substr($seed, 18, 2));

	/** size of each sprite */
	$spriteZ = 128;

	/** start with blank 3x3 identicon */
	$identicon = imagecreatetruecolor($spriteZ * 3, $spriteZ * 3);
	imageantialias($identicon, true);

	/** assign white as background */
	$bg = imagecolorallocate($identicon, 255, 255, 255);
	imagefilledrectangle($identicon, 0, 0, $spriteZ, $spriteZ, $bg);

	/** generate corner sprites */
	$corner = identicon_getsprite($csh, $cfr, $cfg, $cfb, $cro, $spriteZ);
	imagecopy($identicon, $corner, 0, 0, 0, 0, $spriteZ, $spriteZ);
	$corner = imagerotate($corner, 90, $bg);
	imagecopy($identicon, $corner, 0, $spriteZ * 2, 0, 0, $spriteZ, $spriteZ);
	$corner = imagerotate($corner, 90, $bg);
	imagecopy($identicon, $corner, $spriteZ * 2, $spriteZ * 2, 0, 0, $spriteZ, $spriteZ);
	$corner = imagerotate($corner, 90, $bg);
	imagecopy($identicon, $corner, $spriteZ * 2, 0, 0, 0, $spriteZ, $spriteZ);

	/** generate side sprites */
	$side = identicon_getsprite($ssh, $sfr, $sfg, $sfb, $sro, $spriteZ);
	imagecopy($identicon, $side, $spriteZ, 0, 0, 0, $spriteZ, $spriteZ);
	$side = imagerotate($side, 90, $bg);
	imagecopy($identicon, $side, 0, $spriteZ, 0, 0, $spriteZ, $spriteZ);
	$side = imagerotate($side, 90, $bg);
	imagecopy($identicon, $side, $spriteZ, $spriteZ * 2, 0, 0, $spriteZ, $spriteZ);
	$side = imagerotate($side, 90, $bg);
	imagecopy($identicon, $side, $spriteZ * 2, $spriteZ, 0, 0, $spriteZ, $spriteZ);

	/** generate center sprite */
	$center = identicon_getcenter($xsh, $cfr, $cfg, $cfb, $sfr, $sfg, $sfb, $xbg, $spriteZ);
	imagecopy($identicon, $center, $spriteZ, $spriteZ, 0, 0, $spriteZ, $spriteZ);

	/** make white transparent */
	imagecolortransparent($identicon, $bg);

	$size = 200;

	/** create blank image according to specified dimensions */
	$resized = imagecreatetruecolor($size, $size);
	imageantialias($resized, true);

	/** assign white as background */
	$bg = imagecolorallocate($resized, 255, 255, 255);
	imagefilledrectangle($resized, 0, 0, $size, $size, $bg);

	/** resize identicon according to specification */
	imagecopyresampled($resized, $identicon, 0, 0, (imagesx($identicon) - $spriteZ * 3) / 2, (imagesx($identicon) - $spriteZ * 3) / 2, $size, $size, $spriteZ * 3, $spriteZ * 3);

	/** make white transparent */
	imagecolortransparent($resized, $bg);

	/** and finally, save */
	$filename = $file->getFilenameOnFilestore();
	$file->open('write');
	imagejpeg($resized, $filename);
	$file->close();
	imagedestroy($resized);

	$icon_sizes = elgg_get_icon_sizes('user');
	
	$file_new = new ElggFile();
	$file_new->owner_guid = $file->owner_guid;
	$file_new->setFilename('identicon/' . $seed . '/topbar.jpg');
	$file_new->setMimeType('image/jpeg');
	elgg_save_resized_image($filename, $file_new->getFilenameOnFilestore(), $icon_sizes['topbar']);

	$file_new = new ElggFile();
	$file_new->owner_guid = $file->owner_guid;
	$file_new->setFilename('identicon/' . $seed . '/tiny.jpg');
	$file_new->setMimeType('image/jpeg');
	elgg_save_resized_image($filename, $file_new->getFilenameOnFilestore(), $icon_sizes['tiny']);

	$file_new = new ElggFile();
	$file_new->owner_guid = $file->owner_guid;
	$file_new->setFilename('identicon/' . $seed . '/small.jpg');
	$file_new->setMimeType('image/jpeg');
	elgg_save_resized_image($filename, $file_new->getFilenameOnFilestore(), $icon_sizes['small']);
	
	$file_new = new ElggFile();
	$file_new->owner_guid = $file->owner_guid;
	$file_new->setFilename('identicon/' . $seed . '/medium.jpg');
	$file_new->setMimeType('image/jpeg');
	elgg_save_resized_image($filename, $file_new->getFilenameOnFilestore(), $icon_sizes['medium']);
	
	$file_new = new ElggFile();
	$file_new->owner_guid = $file->owner_guid;
	$file_new->setFilename('identicon/' . $seed . '/large.jpg');
	$file_new->setMimeType('image/jpeg');
	elgg_save_resized_image($filename, $file_new->getFilenameOnFilestore(), $icon_sizes['large']);
	
	});
	
	return true;
}

function identicon_build_group($seedbase, $file) {
	
	elgg_call(ELGG_IGNORE_ACCESS, function() use ($seedbase, $file) {
		
	$size = 200;

	$grid = imagecreatetruecolor($size * 2, $size * 2);

	for ($i = 0; $i < 4; $i++) {
		$md5 = md5(substr($seedbase, $i * 4, 4));
		$seed = substr($md5, 0, 17);

		/** parse hash string */
		$csh = hexdec(substr($seed, 0, 1)); // corner sprite shape
		$ssh = hexdec(substr($seed, 1, 1)); // side sprite shape
		$xsh = hexdec(substr($seed, 2, 1)) & 7; // center sprite shape

		$cro = hexdec(substr($seed, 3, 1)) & 3; // corner sprite rotation
		$sro = hexdec(substr($seed, 4, 1)) & 3; // side sprite rotation
		$xbg = hexdec(substr($seed, 5, 1)) % 2; // center sprite background

		/** corner sprite foreground color */
		$cfr = hexdec(substr($seed, 6, 2));
		$cfg = hexdec(substr($seed, 8, 2));
		$cfb = hexdec(substr($seed, 10, 2));

		/** side sprite foreground color */
		$sfr = hexdec(substr($seed, 12, 2));
		$sfg = hexdec(substr($seed, 14, 2));
		$sfb = hexdec(substr($seed, 16, 2));

		/** final angle of rotation */
		$angle = hexdec(substr($seed, 18, 2));

		/** size of each sprite */
		$spriteZ = 128;

		/** start with blank 3x3 identicon */
		$identicon = imagecreatetruecolor($spriteZ * 3, $spriteZ * 3);
		imageantialias($identicon, true);

		/** assign white as background */
		$bg = imagecolorallocate($identicon, 255, 255, 255);
		imagefilledrectangle($identicon, 0, 0, $spriteZ, $spriteZ, $bg);

		/** generate corner sprites */
		$corner = identicon_getsprite($csh, $cfr, $cfg, $cfb, $cro, $spriteZ);
		imagecopy($identicon, $corner, 0, 0, 0, 0, $spriteZ, $spriteZ);
		$corner = imagerotate($corner, 90, $bg);
		imagecopy($identicon, $corner, 0, $spriteZ * 2, 0, 0, $spriteZ, $spriteZ);
		$corner = imagerotate($corner, 90, $bg);
		imagecopy($identicon, $corner, $spriteZ * 2, $spriteZ * 2, 0, 0, $spriteZ, $spriteZ);
		$corner = imagerotate($corner, 90, $bg);
		imagecopy($identicon, $corner, $spriteZ * 2, 0, 0, 0, $spriteZ, $spriteZ);

		/** generate side sprites */
		$side = identicon_getsprite($ssh, $sfr, $sfg, $sfb, $sro, $spriteZ);
		imagecopy($identicon, $side, $spriteZ, 0, 0, 0, $spriteZ, $spriteZ);
		$side = imagerotate($side, 90, $bg);
		imagecopy($identicon, $side, 0, $spriteZ, 0, 0, $spriteZ, $spriteZ);
		$side = imagerotate($side, 90, $bg);
		imagecopy($identicon, $side, $spriteZ, $spriteZ * 2, 0, 0, $spriteZ, $spriteZ);
		$side = imagerotate($side, 90, $bg);
		imagecopy($identicon, $side, $spriteZ * 2, $spriteZ, 0, 0, $spriteZ, $spriteZ);

		/** generate center sprite */
		$center = identicon_getcenter($xsh, $cfr, $cfg, $cfb, $sfr, $sfg, $sfb, $xbg, $spriteZ);
		imagecopy($identicon, $center, $spriteZ, $spriteZ, 0, 0, $spriteZ, $spriteZ);

		/** make white transparent */
		imagecolortransparent($identicon, $bg);

		/** create blank image according to specified dimensions */
		$resized = imagecreatetruecolor($size, $size);
		imageantialias($resized, true);

		/** assign white as background */
		$bg = imagecolorallocate($resized, 255, 255, 255);
		imagefilledrectangle($resized, 0, 0, $size, $size, $bg);

		/** resize identicon according to specification */
		imagecopyresampled($resized, $identicon, 0, 0, (imagesx($identicon) - $spriteZ * 3) / 2, (imagesx($identicon) - $spriteZ * 3) / 2, $size, $size, $spriteZ * 3, $spriteZ * 3);

		/** make white transparent */
		imagecolortransparent($resized, $bg);

		// put this avatar into the grid in the right spot
		imagecopy($grid, $resized, ($i % 2) * $size, intval($i / 2) * $size, 0, 0, $size, $size);
	}

	/** and finally, save */
	$filename = $file->getFilenameOnFilestore();
	$file->open('write');
	imagejpeg($grid, $filename);
	$file->close();
	imagedestroy($grid);

	$icon_sizes = elgg_get_icon_sizes('user');

	$file_new = new ElggFile();
	$file_new->owner_guid = $file->owner_guid;
	$file_new->setFilename('identicon/' . $seedbase . '/tiny.jpg');
	$file_new->setMimeType('image/jpeg');
	elgg_save_resized_image($filename, $file_new->getFilenameOnFilestore(), $icon_sizes['tiny']);

	$file_new = new ElggFile();
	$file_new->owner_guid = $file->owner_guid;
	$file_new->setFilename('identicon/' . $seedbase . '/small.jpg');
	$file_new->setMimeType('image/jpeg');
	elgg_save_resized_image($filename, $file_new->getFilenameOnFilestore(), $icon_sizes['small']);

	$file_new = new ElggFile();
	$file_new->owner_guid = $file->owner_guid;
	$file_new->setFilename('identicon/' . $seedbase . '/medium.jpg');
	$file_new->setMimeType('image/jpeg');
	elgg_save_resized_image($filename, $file_new->getFilenameOnFilestore(), $icon_sizes['medium']);

	$file_new = new ElggFile();
	$file_new->owner_guid = $file->owner_guid;
	$file_new->setFilename('identicon/' . $seedbase . '/large.jpg');
	$file_new->setMimeType('image/jpeg');
	elgg_save_resized_image($filename, $file_new->getFilenameOnFilestore(), $icon_sizes['large']);
	
	});
	return true;
}

/**
 * builds a standard seed from the entity's email field (if a user) or the name (if a group)
 * if neither is available, use the guid
 */
function identicon_seed($entity) {
	if ($entity instanceof ElggUser) {
		$start = strtolower($entity->email);
	} else if ($entity instanceof ElggGroup) {
		$start = strtolower($entity->name);
	}

	if (!$start) {
		$start = (string) $entity->getGUID();
	}

	$md5 = md5($start);
	$seed = substr($md5, 0, 17);
	return $seed;
}

/**
 * This makes sure that the image is present (builds it if it isn't) and then
 * displays it.
 */
function identicon_check($entity) {
	//make sure the image functions are available before trying to make avatars
	if (function_exists("imagecreatetruecolor")) {
		// entity is group, user or something else?
		if ($entity instanceof ElggGroup) {
			$file = new ElggFile();
			$file->owner_guid = $entity->owner_guid;

			$seed = identicon_seed($entity);
			$file->setFilename('identicon/' . $seed . '/master.jpg');
			$file->setMimeType('image/jpeg');

			if (!$file->exists()) {
				if (identicon_build_group($seed, $file)) {
					return true;
				} else {
					// there was some error building the icon
					return false;
				}
			} else {
				// file's already there
				return true;
			}
		} else if ($entity instanceof ElggUser) {
			$file = new ElggFile();
			$file->owner_guid = $entity->getGUID();

			$seed = identicon_seed($entity);
			$file->setFilename('identicon/' . $seed . '/master.jpg');
			$file->setMimeType('image/jpeg');

			if (!$file->exists()) {
				if (identicon_build($seed, $file)) {
					return true;
				} else {
					// there was some error building the icon
					return false;
				}
			} else {
				// file's already there
				return true;
			}
		} else {
			// neither group nor user
			return false;
		}
	}

	// we can't build the icon
	return false;
}

/**
 * This hooks into the getIcon API
 *
 * @return unknown
 */
function identicon_usericon_hook(\Elgg\Hook $hook) {
	$hook_name = $hook->getName();
	$returnvalue = $hook->getValue();
	$params = $hook->getParams();
		
	if (($hook_name == 'entity:icon:url') && ($params['entity'] instanceof ElggUser)) {
		$ent = $params['entity'];
		// if we don't have an icon or the user just prefers the avatar
		if ($ent->preferIdenticon || !($ent->icontime)) {
			return identicon_url($ent, $params['size']);
		}
	} else {
		return $returnvalue;
	}
}

function identicon_groupicon_hook(\Elgg\Hook $hook) {
	$hook_name = $hook->getName();
	$returnvalue = $hook->getValue();
	$params = $hook->getParams();
	
	if (($hook_name == 'entity:icon:url') && ($params['entity'] instanceof ElggGroup)) {
		$ent = $params['entity'];
		// if we don't have an icon or the user just prefers the avatar
		if ($ent->preferGroupIdenticon || !($ent->icontime)) {
			return identicon_url($ent, $params['size']);
		}
	} else {
		return $returnvalue;
	}
}

function identicon_url($ent, $size) {
	if ($ent instanceof ElggUser) {
		if (identicon_check($ent)) {
			return elgg_get_site_url() .'identicon/identicon_user_icon/' . $ent->getGUID() . '/' . $size;
		}
	} else if ($ent instanceof ElggGroup) {
		if (identicon_check($ent)) {
			return elgg_get_site_url() . 'identicon/identicon_group_icon/' . $ent->getGUID() . '/' . $size;
		}
	}

	return false;
}
