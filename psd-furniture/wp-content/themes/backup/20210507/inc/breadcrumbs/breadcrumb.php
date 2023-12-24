<?php
	$breadcrumb_all = get_field('breadcrumb', 'option');
	$page_breadcrumb = get_field('breadcrumb_image');

	if ($breadcrumb) {
		$img_url = $page_breadcrumb;
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