<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.sidebar-services-box .post-name a:hover,
	.main-projects .projects-list .post-button a:hover,
	.main-projects .projects-list .post-name a:hover,
	.fleet-single .post-button .btn:hover,
	.main-blogs .pagination-blogs a,
	.module_department .table tbody td a:hover,
	.module_contact form .wpcf7-submit:hover,
	.module_projects .post-name a:hover,
	.slick-slidershow .btn-slider:hover,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.main-blogs .pagination-blogs a:hover,
	.module_contact form .wpcf7-submit,
	.slick-slider .slick-arrow:hover,
	.slick-slider .slick-dots .slick-active button,
	.slick-slidershow .btn-slider,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.pagination .page-numbers,
	.module_fleets .module_content article,
	.main-blogs .pagination-blogs a,
	.module_contact form .wpcf7-submit,
	.btn, .button, .submit, .wpcf7-submit, button,
	.slick-slider .slick-arrow:hover,
	.module_ve_chung_toi .content-box .btn-banner,
	.slick-slidershow .btn-slider,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

</style>