<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.page-thankyou .product-name a:hover,
	.order-review .order-total .amount,
	.cart_totals table td .amount,
	.cart-content li .image ~ p a:hover,
	.cart-content span,
	.products-ordering li:hover span,
	.sidebar-box .price_slider_amount .button:hover,
	.primary-menu .sub-menu .sub-menu a:hover,
	.footer-list li a:hover,
	.single-categorie:hover a, .single-categorie:hover .cat-number,
	.blog-entry-meta-two .meta-box li a:hover,
	.blog-entry-meta-two .blog-content h4 a:hover,
	.blog-entry-meta-two .blg-readmore,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.categorie-acitve .owl-dots .owl-dot.active,
	.wc-proceed-to-checkout a:hover,
	.main-page .woocommerce-cart-form table .button:hover,
	.cart-content .cart-container-list .buttons .button:hover,
	.sidebar-box .price_slider_amount .button,
	.sidebar-box .price_slider_wrapper .ui-slider-handle,
	.ui-slider-range.ui-widget-header.ui-corner-all,
	.social-footer li a:hover,
	.blog-entry-meta-two .entry-meta .date,
	.header-style-two.sticky,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.sidebar-box .price_slider_amount .button,
	.single-categorie:hover .cat-img,
	.border-hover-effect.border-red-effect .single-aboss-product:hover:before,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

</style>