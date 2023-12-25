<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.megamenu .nav-menu li.current-menu-item a,
	.megamenu.megamenu-desktop a:hover,
	.slick-slider .slick-arrow:hover,
	.slick-slidershow .slick-arrow:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover,
	.back-to-top,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.main-products .sidebar-products ul li .sub-menu a:hover,
	.main-products .sidebar-products ul li.current-menu-parent > a,
	.main-products .sidebar-products ul li.current-menu-item .sub-menu > a,
	.main-products .sidebar-products ul li a:hover,
	.main-products .sidebar-products ul li.current-menu-item > a,
	.main-products .module_categories ul li a:hover,
	.main-products .module_categories ul li a.active,
	.main-contacts .lth-contacts form .wpcf7-form-control.wpcf7-submit:hover,
	.module-post .post-content .post-btn .btn:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.wpcf7-submit, .submit, .btn, .button, button,
	.back-to-top:hover{
		background-color: <?php echo $color; ?>;
	}

	.main-products .sidebar-products ul li .sub-menu a:hover,
	.main-products .sidebar-products ul li.current-menu-item > a,
	.main-products .sidebar-products ul li.current-menu-parent .sub-menu li.current-menu-item > a,
	.main-products .sidebar-products ul li.current-menu-parent > a,
	.main-products .sidebar-products ul li a:hover,
	.main-products .sidebar-products ul li.current-menu-item > a,
	.main-products .module_categories ul li a:hover,
	.main-products .module_categories ul li a.active,
	.main-contacts .lth-contacts form .wpcf7-form-control.wpcf7-submit:hover,
	.module-post .post-content .post-btn .btn:hover,
	.back-to-top:hover {
		color: #fff;
	}

	.main-contacts .lth-contacts form .wpcf7-form-control.wpcf7-submit:hover,
	.module-post .post-content .post-btn .btn:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.slick-slider .slick-arrow:hover,
	.slick-slidershow .slick-arrow:hover,
	.wpcf7-submit, .submit, .btn, .button, button,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

</style>