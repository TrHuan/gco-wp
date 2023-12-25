<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.order-review .shop_table tfoot tr:last-child td .amount,
	.cart_totals table td .amount,
	.table-content table td.product-remove a:hover,
	.table-content table td.product-name a:hover,
	.main-thumb-desc li a.active,
	.lth-sidebars .sidebar-product h3::after,
	.products-header .grid-list-view a.active,
	.woocommerce-breadcrumb a:hover,
	.woocommerce-breadcrumb,
	.mini_cart_item .content a:hover,
	.mini_cart_item .quantity span,
	.cart-content .total bdi,
	.recent-desc h6 a:hover,
	.sidebar-box li.cat-item a:hover,
	.categorie-tabs-list li a.active,
	.categorie-tabs-list li a:hover,
	.single-deal-active .owl-nav div:hover,
	.meta-box li a:hover,
	.blog-content h4 a:hover,
	.pro-tabs-area li a:hover,
	.pro-tabs-area li a.active,
	.add-to-cart:hover,
	.cart-wishlist:hover::before,
	.cart-compare:hover:before,
	.add-to-cart:hover:before, 
	.pro-title a:hover,
	.single-makal-product .add-to-cart:hover,
	.single-footer li a:hover,
	.single-footer .social-icon li a:hover,
	.footer-list li a:hover,
	.footer-menu li a:hover,
	.footer-copyright p a:hover,
	.header-top-left ul > li:hover > a,
	.header-top-right ul > li:hover > a,
	.wish-compare-items li a:hover,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.quick-view-pro:hover,
	.wc-proceed-to-checkout a:hover,
	.woocommerce-cart-form table .actions .button:hover,
	.woocommerce .return-to-shop .button:hover,
	.social-sharing ul li a:hover,
	.product-content-single .social-sharing ul iframe:hover ~ a,
	.product-content-single .single_add_to_cart_button:hover,
	.slick-product-images-nav .slick-arrow:hover,
	.product-content-box .social-sharing ul li a:hover,
	.product-content-box .social-sharing ul iframe:hover ~ a,
	.sticker-sale,
	.cart-icon .item-count,
	.cat-content a:hover, .multi-banner .cat-content a:hover,
	.cart-content .buttons a:hover,
	.register-contact .form-button .wpcf7-submit:hover,
	.tagcloud a:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.owl-nav div:hover,
    .wpcf7-submit:hover, .submit:hover,
    .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.main-thumb-desc li a.active,
	.social-sharing ul li a:hover,
	.product-content-single .social-sharing ul iframe:hover ~ a,
	.product-content-single .slick-product-images-nav .slick-current a,
	.product-content-single .slick-product-images-nav a:hover,
	.product-content-box .social-sharing ul li a:hover,
	.product-content-box .social-sharing ul iframe:hover ~ a,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.pro-tabs-area li a:hover,
	.pro-tabs-area li a.active {
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