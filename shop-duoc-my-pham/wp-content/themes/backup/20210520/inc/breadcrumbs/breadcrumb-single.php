<?php
	$breadcrumb_all = get_field('breadcrumb', 'option');

	if ( get_post_type() == 'post' ) {
		$page_blogs = get_field('page_single_blog', 'option');
		$breadcrumb = $page_blogs['breadcrumb'];
	}

	if ( get_post_type() == 'product' ) {
		$page_shop = get_field('page_single_product', 'option');
		$breadcrumb = $page_shop['breadcrumb'];
	}

	if ($breadcrumb) {
		$img_url = $breadcrumb;
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