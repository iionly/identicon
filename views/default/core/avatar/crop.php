<?php
/**
 * Avatar cropping view
 *
 * @uses vars['entity']
 *
 * modified for Identicon plugin to disable cropping when Identicon image is used as user icon.
 *
 */

$user = $vars['entity'];

if (!($user->preferIdenticon)) {
?>

<div id="avatar-croppingtool" class="mtl ptm">
	<label><?php echo elgg_echo('avatar:crop:title'); ?></label>
	<br />
	<p>
		<?php echo elgg_echo("avatar:create:instructions"); ?>
	</p>
	<?php echo elgg_view_form('avatar/crop', [], $vars); ?>
</div>

<?php
}