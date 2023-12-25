<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">
	
	.main-single-product .pro .price ins .amount,
	.sidebar-box .shop-catigory-title,
	.beauty-tabs li a.active,
	.footer-box .socials-box li a:hover,
	.allpro .ap-slider-item .buy-btn:hover,
	.wel .buy-btn:hover,
	.t4,
	.nivo-directionNav > a .icon,
	.top-cart-btn,
	.megamenu .nav-menu li.current-menu-item a,
	.megamenu.megamenu-desktop a:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover,
	.back-to-top,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.main-products .products-ordering.show label,
	.main-products .products-ordering.show ul,
	.main-contacts form .wpcf7-submit,
	.main-contacts .contact-add-item:not(:last-of-type):after,
	.allpro .ap-slider-item .buy-btn,
	.pdetail-reslider .item .buy-btn,
	.products-list .sale-item .buy-btn,
	.wel .buy-btn,
	.b1,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.sidebar-box .woocommerce-product-search > button,
	.sidebar-box .price_slider_amount .button:hover,
	.sidebar-box .price_slider_wrapper .ui-slider-handle,
	.sidebar-box .price_slider_wrapper .ui-slider-range,
	.wpcf7-submit, .submit, .btn, .button, button,
	/*.slick-slider .slick-arrow:hover,*/
	/*.slick-slidershow .slick-arrow:hover,*/
	.back-to-top:hover{
		background: <?php echo $color; ?>;
	}

	.main-products .products-ordering.show label,
	.main-products .products-ordering.show ul,
	/*.slick-slider .slick-arrow:hover,*/
	/*.slick-slidershow .slick-arrow:hover,*/
	.sidebar-box .price_slider_amount .button:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.back-to-top:hover {
		color: #fff;
	}

	.order_review_2 .place-order .button,
	.sidebar-box .shop-catigory-title,
	.main-products .products-ordering label,
	.main-products .products-ordering ul,
	.beauty-tabs li a.active,
	.sale-percent,
	.wel-tabs li,
	.cate-slider-item a:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	/*.slick-slider .slick-arrow:hover,*/
	/*.slick-slidershow .slick-arrow:hover,*/
	.wpcf7-submit, .submit, .btn, .button, button,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

</style>