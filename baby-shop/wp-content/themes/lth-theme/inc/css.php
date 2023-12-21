<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.cart-collaterals .cart-link .email a:hover,
	.cart-collaterals .cart-link > a:hover,
	.cart-collaterals .cart-link .phone a:hover,
	.vk-shop-item--style-1 .vk-shop-item__price,
	.vk-footer__item h3,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.cart-collaterals .wc-proceed-to-checkout .del-btn:hover,
	.cart-collaterals .wc-proceed-to-checkout .button:hover,
	.page-cart .woocommerce-cart-form .wc-proceed-to-checkout .button:hover,
	.ui-slider-horizontal .ui-slider-handle,
	.ui-slider .ui-slider-range,
	.price_slider_wrapper .button,
	.vk-form--search .vk-btn,
	.vk-header__cat .vk-btn,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.place-order .button:hover,
	.cart-collaterals .wc-proceed-to-checkout .del-btn:hover,
	.vk-form--search .form-control,
	.vk-form--search .vk-btn,
	.vk-header__cat .vk-btn,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

	/*.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.back-to-top {
		border-color: <?php echo $color; ?>;
	}*/

</style>