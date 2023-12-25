<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">
	.product-content-box .single_add_to_cart_button,
	.logins-box .login-submit input,
	.main-my-account .content-box .woocommerce-MyAccount-content .edit,
	.product-content-box .slick-product-images-nav .slick-current img,
	.contacts-box form .wpcf7-submit,
	.product-content-box .woocommerce-tabs #review_form .form-submit .submit,
	.cart-icon>a:hover,
	.slick-slider .slick-dots button:hover,
	.slick-slider .slick-dots .slick-active button,
	.slick-slider .slick-arrow,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button {
		border-color: <?php echo $color; ?>;
	}

	.product-content-box .single_add_to_cart_button:hover,
	.shopcart .cart-list a:hover,
	.tabs-box .title-tab .title.active,
	.tab-box-2 .title.active,
	.lth-logins .user-box a.active,
	.main-my-account .content-box .woocommerce-MyAccount-content .edit,
	.main-my-account .content-box .woocommerce-MyAccount-navigation li.is-active a,
	.post-content .post-meta li.post-date,
	.header-main .hotline-box,
	.contacts-box form .wpcf7-submit,
	.product-content-box .woocommerce-tabs #review_form .form-submit .submit,
	/*.product-content-box .price,*/
	.product-box .product-price,
	.products-ordering ul input:hover ~ span,
	.logins-box .user-close:hover,
	.tab-link .active a, .tab-link a:hover,
	.cart-content .cart-container-list .cart-close:hover,
	#review_form .comment-form-rating .stars > span:hover a,
	#review_form .comment-form-rating .selected a,
	.star-rating span,
	.cart-container-list .total span,
	.slick-slider .slick-arrow,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.product-content-box .single_add_to_cart_button,
	.sidebar-box .price_slider_wrapper .ui-slider-handle ~ .ui-slider-handle,
	.price_slider_wrapper .price_slider > div,
	.price_slider_wrapper .price_slider > span ~ span,
	.slick-slider .slick-dots button:hover,
	.slick-slider .slick-dots .slick-active button {
		background-color: <?php echo $color; ?>;
	}

	.main-my-account .content-box .woocommerce-MyAccount-content .edit:hover,
	.contacts-box form .wpcf7-submit:hover,
	.product-content-box .woocommerce-tabs #review_form .form-submit .submit:hover,
	.megamenu .menu-mobile-title .title:hover,
	.cart-icon > a:hover,
	.slick-slider .slick-arrow:hover,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.search-box .content-box .btn:hover {
		color: #fff !important;
	}
</style>