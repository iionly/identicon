<?php

return [
	'actions' => [
		'identicon/userpreference' => [],
		'identicon/grouppreference' => [],
		'identicon/remove' => [],
	],
	'routes' => [
    'identicon_user_icon:object:identicon' => [
      'path' => '/identicon/identicon_user_icon/{user_guid}/{size}',
      'resource' => 'identicon/identicon_user_icon',
    ],
    'identicon_group_icon:object:identicon' => [
      'path' => '/identicon/identicon_group_icon/{group_guid}/{size}',
      'resource' => 'identicon/identicon_group_icon',
    ],
	],
];
