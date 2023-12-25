<?php
	$breadcrumb_all = get_field('breadcrumb', 'option');
	// $page_breadcrumb = get_field('breadcrumb_image');

	// if ($page_breadcrumb) {
	// 	$img_url = $page_breadcrumb;
	// } else {
		$img_url = $breadcrumb_all;
	// }
?>

<div class="breadcrumbs">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<?php if ($img_url) { ?>
					<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-box/breadcrumb-image-box.php'); ?>
				<?php } ?>
			</div>
		</div>


		<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-box/breadcrumb-content-box.php'); ?>
	</div>
</div>