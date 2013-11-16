Identicon plugin for Elgg 1.9
Latest Version: 1.9.1
Released: 2013-11-14
Contact: iionly@gmx.de
License: GNU General Public License version 2
Copyright: (c) iionly 2013, (C) Justin Richer, The MITRE Corporation 2010-2013



This plugin offers Identicon images to be used as profile images and group images. Identicons are images created by an algorithm to be unique for every user / group. The user Identicons are based on the user's email address while the group Identicons are created based on the group name.

For profile images the Identicon image will automatically used, if the user has not yet uploaded a custom profile image. So your site will look a bit more colorful - less gray heads... If a user has already uploaded a profile image, this custom profile image will continue to be used instead of the Identicon image. But the user can decide to enable/disable the use of the Identicon image on the edit avatar page at any time.

For groups the use of the Identicon image is offered as an option on the group's edit page. Additionally, any newly created groups (i.e. created after the Identicon plugin has been enabled) will use the group Identicon image when no custom group image is uploaded. Unfortunately, it doesn't work for existing groups to use the Identicon automatically also, if their group settings have been altered at a former time. For these groups you can only enable the Identicon manually on the group's edit page.


Installation and configuration:

(0. If you have a previous version of the plugin installed, disable it on your site and remove the identicon plugin folder from your mod directory completely before copying the new version on the server.)

1. copy the Identicon plugin folder into the mod folder on your server and
2. enable the plugin in the admin section of your site.



Changelog:

1.9.1 (by iionly):

- Updated for Elgg 1.9.

1.8.1

- Code cleanup,
- Made the Removal button on the avatar edit page working both with regular user avatars and identicon images (not showing the button in the latter case).

1.8.0 (by iionly):

- initial release for Elgg 1.8.
