Identicon plugin for Elgg 2.3 and newer 2.X
===========================================

Latest Version: 2.3.2  
Released: 2017-01-07  
Contact: iionly@gmx.de  
License: GNU General Public License version 2  
Copyright: (c) iionly 2013, (C) Justin Richer, The MITRE Corporation 2009


Description
-----------

This plugin offers Identicon images to be used as profile images and group images. Identicons are images created by an algorithm to be unique for every user / group. The user Identicons are based on the user's email address while the group Identicons are created based on the group name.

For profile images the Identicon image will automatically used, if the user has not yet uploaded a custom profile image. So your site will look a bit more colorful - less gray heads... If a user has already uploaded a profile image, this custom profile image will continue to be used instead of the Identicon image. But the user can decide to enable/disable the use of the Identicon image on the edit avatar page at any time.

For groups the use of the Identicon image is offered as an option on the group's edit page. Additionally, any newly created groups (i.e. created after the Identicon plugin has been enabled) will use the group Identicon image when no custom group image is uploaded. Unfortunately, it doesn't work for existing groups to use the Identicon automatically also, if their group settings have been altered at a former time. For these groups you can only enable the Identicon manually on the group's edit page.


Requirements
------------

For creation of the Identicon images the plugin requires the functions imageantialias() and imagerotate(). These functions are part of the GD php extension (which is also a requirement of Elgg core anyway) but on some php installations these two functions are not included in the GD php extension unfortunately. On activating the Identicon plugin the availability of these two functions is checked and if either of them is missing the Identicon plugin won't be activated.


Installation
------------

1. If you have a previous version of the plugin installed, disable it on your site and remove the identicon plugin folder from your mod directory completely before copying the new version on the server,
2. Copy the Identicon plugin folder into the mod folder on your server and
3. Enable the plugin in the admin section of your site.
