<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.woocommerce-cart .woocommerce .module__footer a:hover,
	.lth-product-tabs .module__content .detailed-reviews .btn-read-more:hover,
	.lth-hot .module_products .post-donate a:hover,
	.lth-categories .brands-box .megamenu .menu a:hover,
	.footer-main .footer-box .menu a:hover,
	.module_blogs .post-btn a:hover,
	.module_blogs .post-name a:hover,
	.title .icon,
	.lth-blogs .module_title>a:hover,
	.lth-products .module__header .product-cats ul li a:hover,
	.module_products .post-name a:hover,
	.cart-btn a:hover,
	.megamenu .nav-menu li.current-menu-item a,
	.megamenu.megamenu-desktop a:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover,
	.back-to-top,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.main-blogs .module_button a:hover,
	.main-products .module_button a:hover,
	.posts-list .btn:hover,
	.footer-bottom .footer-box .btn-mobile:hover,
	.footer-main .footer-box .menu a:hover .icon,
	.lth-contacts form .form-group-button .wpcf7-submit:hover,
	.module_products .post-btn .btn:hover,
	.module-post .post-content .post-btn .btn:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.wpcf7-submit, .submit, .btn, .button, button,
	/*.slick-slider .slick-arrow:hover,*/
	/*.slick-slidershow .slick-arrow:hover,*/
	.back-to-top:hover{
		background-color: <?php echo $color; ?>;
	}

	.main-blogs .module_button a:hover,
	.main-products .module_button a:hover,
	.posts-list .btn:hover,
	.footer-bottom .footer-box .btn-mobile:hover,
	.footer-main .footer-box .menu a:hover .icon,
	.module-post .post-content .post-btn .btn:hover,
	/*.slick-slider .slick-arrow:hover,*/
	/*.slick-slidershow .slick-arrow:hover,*/
	.back-to-top:hover {
		color: #fff;
	}

	.main-blogs .module_button a:hover,
	.main-products .module_button a:hover,
	.posts-list .btn:hover,
	.footer-bottom .footer-box .btn-mobile:hover,
	.footer-main .footer-box .menu a:hover .icon,
	.lth-contacts form .form-group-button .wpcf7-submit,
	.lth-hot .module_products .module_content,
	.lth-hot .title,
	.module_products .post-btn .btn:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	/*.slick-slider .slick-arrow:hover,*/
	/*.slick-slidershow .slick-arrow:hover,*/
	.wpcf7-submit, .submit, .btn, .button, button,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

	.megamenu.megamenu-desktop .sub-menu a:hover{
		color: <?php echo $color; ?> !important;
	}

</style>