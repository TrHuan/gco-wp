<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.quick-links ul li:hover a,
	.single-tweet > p a:hover,
	.food-info-content > a:hover,
	footer a:hover,
	.woocommerce-error,
	.woocommerce-checkout label .required,
	.product-details-content .product-categories a:hover,
	.view-mode > li.active a,
	.communication-text > p a:hover,
	.communication-icon i,
	.testimonial-active.owl-carousel .owl-nav div:hover,
	.blog-details-btn > a:hover,
	.blog-dec-tags > ul li a:hover,
	.blog-dec-social ul li a:hover,
	.sidebar-box .menu li a:hover,
	.copyright a,
	.footer-widget ul li a:hover,
	footer a:hover,
	.overview-content h1 span,
	.header-cart .icon-cart span.count-style,
	.blog-hm-content > h3 a:hover,
	.blog-hm-social ul li a:hover,
	.latest-product-slider.owl-carousel .owl-nav div:hover,
	.product-area .slick-products .slick-arrow:hover,
	.megamenu .nav-menu li.current-menu-item a,
	.megamenu.megamenu-desktop a:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover,
	.back-to-top,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.payment_methods_title input:checked ~ label,
	.your-order .place-order .button:hover,
	.cart-collaterals .cart_totals > h2,
	.product-share ul li a:hover,
	.product-details-content .btn-style,
	.sidebar-box .woocommerce-product-search > button,
	.sidebar-box .price_slider_amount .button:hover,
	.sidebar-box .price_slider_wrapper .ui-slider-handle,
	.sidebar-box .price_slider_wrapper .ui-slider-range,
	.shop-list-cart > a.btn:hover,
	.contact-message-wrapper .wpcf7-submit,
	.contact-title::before,
	.single-communication:hover .communication-icon i,
	.communication-icon i:hover,
	.sidebar-box .tagcloud a:hover,
	.pagination .nav-links .page-numbers.current,
	.pagination .nav-links .page-numbers:hover,
	.product-tab-list a.active h4,
	.question-icon,
	.cart-btn > a:hover,
	.continue-shopping-btn > a:hover,
	.product-action a:hover,
	#scrollUp,
	.cart-btn .icon-cart,
	.blog-hm-social ul li a,
	.slick-slider .slick-arrow:hover,
	.slick-slidershow .slick-arrow:hover,
	.wpcf7-submit, .submit, .btn, .button, button,
	.back-to-top:hover{
		background-color: <?php echo $color; ?>;
	}

	.payment_methods .payment_method_bacs .bank-title li.active,
	.sidebar-box .price_slider_amount .button:hover,
	.shop-list-cart > a.btn:hover,
	.contact-message-wrapper .wpcf7-submit,
	.communication-icon i:hover,
	.sidebar-box .tagcloud a:hover,
	.product-action a:hover,
	.slick-slider .slick-arrow:hover,
	.slick-slidershow .slick-arrow:hover,
	.back-to-top:hover {
		color: #fff;
	}

	.product-share ul li a:hover,
	.shop-list-cart > a.btn,
	.communication-icon i,
	.sidebar-box .tagcloud a:hover,
	.product-action a:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.slick-slider .slick-arrow:hover,
	.slick-slidershow .slick-arrow:hover,
	.wpcf7-submit, .submit, .btn, .button, button,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

</style>