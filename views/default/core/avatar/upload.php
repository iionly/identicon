<?php
/**
 * Avatar upload view
 *
 * @uses $vars['entity']
 *
 * modified for Identicon plugin to disable uploading (and especially preventing accidental removal) of a regular user icon when Identicon image is used.
 *
 */

$user = $vars['entity'];

if ($user->preferIdenticon) {
    echo "<p>" . elgg_echo("identicon:avatar_upload_disabled") . "</p>";
} else {

    $user_avatar = elgg_view('output/img', array(
        'src' => $user->getIconUrl('medium'),
        'alt' => elgg_echo('avatar')
       ));

    $current_label = elgg_echo('avatar:current');

    $remove_button = '';
    if ($user->icontime) {
        $remove_button = elgg_view('output/url', array(
            'text' => elgg_echo('remove'),
            'title' => elgg_echo('avatar:remove'),
            'href' => 'action/identicon/remove?guid=' . elgg_get_page_owner_guid(),
            'is_action' => true,
            'class' => 'elgg-button elgg-button-cancel mll'
           ));
    }

    $form_params = array('enctype' => 'multipart/form-data');
    $upload_form = elgg_view_form('avatar/upload', $form_params, $vars);

?>

    <p class="mtm">
        <?php echo elgg_echo('avatar:upload:instructions'); ?>
    </p>

<?php

$image = <<<HTML
    <div id="current-user-avatar" class="mrl prl">
        <label>$current_label</label><br />
        $user_avatar<br />
        $remove_button
    </div>
HTML;

$body = <<<HTML
    <div id="avatar-upload">
        $upload_form
    </div>
HTML;

    echo elgg_view_image_block($image, $body);

}