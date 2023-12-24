<?php
	$breadcrumb_all = get_field('breadcrumb', 'option');

	$breadcrumb_post = get_field('breadcrumb');

	if ($breadcrumb_post) {
		$img_url = $breadcrumb_post;
	} else {
		$img_url = $breadcrumb_all;
	}
?>

<div class="lth-breadcrumbs">
	<?php if ($img_url) { ?>
		<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-box/breadcrumb-image-box.php'); ?>
	<?php } ?>

	<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-box/breadcrumb-content-box.php'); ?>
</div>