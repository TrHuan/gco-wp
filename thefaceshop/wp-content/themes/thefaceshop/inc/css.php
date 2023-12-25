<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">
	
	.sidebar-box .product-categories .current-cat > a,
	.sidebar-box .menu li.current-menu-item > a,
	.main-page .woocommerce-cart-form .product-remove a:hover,
	.module_cart table td.product-name a:hover,
	.tags-social li iframe:hover ~ a,
	.tags-social li a:hover,
	.recent-desc h6 a:hover,
	.sidebar-box li.cat-item:hover,
	.sidebar-box li.cat-item a:hover,
	.subscribe-content-two h6 span,
	.blog-content h4 a:hover,
	.meta-box li a:hover,
	.blg-readmore,
	.nav-breadcrumbs .woocommerce-breadcrumb a:hover,
	.megamenu-desktop .nav-menu > li > .sub-menu a:hover,
	.cart-container-list .total span,
	.cart-container-list .content > p > a:hover,
	.cart-content .cart-container-list span,
	.deal-pro-active .owl-nav div:hover,
	.brand-logo-active .owl-nav div:hover,
	.blog-activation .owl-nav div:hover,
	.blog-entry-meta-two .meta-box li a:hover,
	.blog-entry-meta-two .blog-content h4 a:hover,
	.blog-entry-meta-two .blg-readmore,
	.pro-content h4 a:hover,
	.single-categorie:hover a,
	.single-categorie:hover .cat-number,
	.footer-bottom a,
	.search-form button:hover,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	#order_review_details .button-box .button:hover,
	.main-page .cart-collaterals .wc-proceed-to-checkout a:hover,
	.module_cart .woocommerce-cart-form .shop-continue:hover,
	.main-page .module_cart .woocommerce-cart-form table .button:hover,
	.owl-nav div:hover,
	.social-sharing ul li a:hover,
	.social-sharing ul li iframe:hover ~ a,
	footer .socials-box li a:hover,
	.sidebar-box .tagcloud a:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.entry-meta .date,
	.contact-form .wpcf7-submit:focus,
	.cart-container-list .buttons a:hover,
	.blog-entry-meta-two .entry-meta .date,
	.owl-dots .owl-dot.active,
	.sticker-new,
	.slider-style-two .owl-nav div:hover,
	.slider-style-two .slide-btn a:hover,
	.slider-style-two .shop-now:hover,
	.categorie-acitve .owl-dots .owl-dot.active,
	.featured-pro-color-style-two .owl-dots .owl-dot.active,
	.testmonial-color-two .owl-dots .owl-dot.active,
	.module_products .pro-actions .btn:hover,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.sidebar-box .menu-danh-muc-san-pham-container .sub-menu li.current-menu-item > a,
	.sidebar-box .product-categories .cat-parent ul li.current-cat > a,
	.chk-tabs-menu .nav-link.active:after,
	.main-page #payment .payment_methods input:checked ~ .custom-control-indicator,
	.thumb-menu.owl-carousel .owl-item a:hover,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.deal-pro-active .owl-nav div:hover,
	.brand-logo-active .owl-nav div:hover,
	.blog-activation .owl-nav div:hover,
	.single-categorie:hover .cat-img,
	.module_products .single-aboss-product:hover:before,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

</style>