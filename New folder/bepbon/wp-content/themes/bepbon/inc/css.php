<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	/*.megamenu .menu .current-menu-item a,*/
	.footer-fixed a,
	.main-products .sidebars .current-menu-item > a,
	.post-content .post-button a:hover,
	.posts-list .post-content .post-name a:hover,
	.breadcrumbs .woocommerce-breadcrumb a:hover,
	.lth-products .products .post-name a:hover,
	.lth-toggle .entry-header ul .active a,
	.tab-title a.active,
	.tab-title a:hover,
	.slick-categories .name a:hover,
	.footer-main .footer-box .megamenu .menu a:hover,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.footer-fixed a:hover,
	.main-page .cart-collaterals .wc-proceed-to-checkout a:hover,
	.woocommerce-cart-form table .actions .button:hover,
	.main-single-products .lth-product-tabs .entry-button .btn:hover,
	.main-single-products .entry-summary .post-btn .btn-buynow:hover,
	.main-single-products .entry-summary .post-btn .add-cart:hover,
	.lth-category-content .entry-button .btn:hover,
	/*.paginations .current:hover,*/
	.paginations a:hover,
	.lth-products .products .post-btn .btn:hover,
	.lth-banner .content a:hover,
	.slick-slider .slick-arrow:hover,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.footer-fixed a,
	.main-single-products .lth-product-tabs .entry-button .btn:hover,
	.lth-category-content .entry-button .btn:hover,
	/*.paginations .current:hover,*/
	.paginations a:hover,
	.tab-title a.active,
	.tab-title a:hover,
	.slick-slider .slick-arrow:hover,
	.back-to-top,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		border-color: <?php echo $color; ?>;
	}

	/*.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php //echo $color; ?>;
	}

	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php //echo $color; ?>;
		color: #fff;
	}

	.back-to-top {
		border-color: <?php //echo $color; ?>;
	}*/

</style>