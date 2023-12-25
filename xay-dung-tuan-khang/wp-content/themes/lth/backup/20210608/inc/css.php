<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.module_contacts .contact-info .single-item .icon-holder span::before,
	.woocommerce-checkout .woocommerce-privacy-policy-text a,
	.main-page .woocommerce .cart-collaterals .order-total .amount,
	.product-content-box .price,
	.sidebar-box .single-shop-item .img-holder .overlay .box .content a:hover,
	.single-shop-item .title-holder h4,
	.review-box ul li i,
	.single-shop-item .img-holder .overlay .box .content a,
	.nav-breadcrumbs .content-box a:hover,
	.project-single .single-project-item .text-holder p a,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.projects-list .single-project-item .text-holder p a,
	.projects-list .project-filter li.active a,
	.projects-list .project-filter li:hover a,
	.single-service-item:hover .text-holder .readmore,
	.fact-counter-area .single-fact-counter .box h2 i,
	.fact-counter-area .single-fact-counter .box h2 span,
	.fact-counter-area .single-fact-counter .box .icon-holder span::before,
	.slick-fact-counter .slick-arrow:hover,
	.sidebars .tagcloud a:hover,
	.module_single .tag-social-share-box .tag p a,
	.sidebars .single-blog-item .text-holder .meta-info li,
	.sidebars .sidebar-box .cat-item a:hover,
	.footer-bottom-area .footer-menu ul li a:hover i,
	.footer-bottom-area .copyright-text p a,
	.single-footer-widget .latest-project ul li .img-holder .overlay .box .content a:hover i,
	.single-blog-item .text-holder:hover .text .readmore,
	.single-blog-item .text-holder .meta-info li a:hover,
	.single-blog-item .text-holder .blog-title:hover,
	.working-area .single-working-item .icon-box .icon,
	.testimonials-carousel .single-slide-item .text-box span::before,
	.testimonials-carousel .single-slide-item .text-box .text h4,
	.testimonials-carousel .single-slide-item .review-box ul li i,
	.slogan-area .slogan h2,
	.single-project-item .img-holder .overlay .box .content a h3:hover,
	.single-project-item .img-holder .overlay .box .content p a,
	.latest-project-area .project-filter li.active span,
	.latest-project-area .project-filter li:hover span,
	.single-service-item .text-holder h3,
	.subscribe-form .form-button i,
	.single-footer-widget .footer-contact-info li .icon-holder span:before,
	.top-bar-area .contact-info-left ul li span:before,
	.top-bar-area .contact-info-right .phnumber span::before,
	.top-social-links ul li a:hover i,
	.main-menu .navigation > li:hover > a,
	.main-menu .navigation > li.current_page_item > a,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.scroll-to-top,
	.module_contacts .contacts-box form .form-button .wpcf7-submit,
	.woocommerce-checkout .button,
	.main-page .woocommerce .cart-collaterals .button,
	.main-page .woocommerce .woocommerce-cart-form .button,
	.slick-dots .slick-active button,
	.product-content-box .single_add_to_cart_button,
	.products-list .products-ordering li:hover,
	.single-shop-item .img-holder .overlay .box .content a:hover,
	.projects-list .single-project-item .img-holder .overlay .box .content .icon-holder:hover,
	.module_single .tag-social-share-box .social-share .social-share-links li:hover i,
	.module_single .tag-social-share-box .social-share .social-share-links li a:hover i,
	.sidebars .search-form button,
	.brand-area,
	.testimonials-carousel .slick-dots .slick-active button,
	.working-area .single-working-item:hover .icon-box .count,
	.working-area .single-working-item:hover .icon-box,
	.testimonials-carousel .single-slide-item .img-box .client-photo,
	.testimonial-area .sec-title .border,
	.latest-project-area .single-project-item .img-holder .overlay .box .content .icon-holder:hover,
	.bg-cl-1,
	.sec-title span.decor:before,
	.sec-title span.decor,
	.header-area .outer-box .cart-btn a .item-count,
	.header-search .form-control:focus + button,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.scroll-to-top:hover,
	.scroll-to-top,
	.module_contacts .contacts-box form .wpcf7-form-control:focus,
	.module_contacts .contacts-box form .form-button .wpcf7-submit,
	.slick-dots .slick-active button,
	.product-content-box .single_add_to_cart_button,
	.slick-fact-counter .slick-arrow:hover,
	.module_single .tag-social-share-box .social-share .social-share-links li:hover i,
	.module_single .tag-social-share-box .social-share .social-share-links li a:hover i,
	.testimonials-carousel .slick-dots .slick-active button,
	.thm-btn:hover,
	.thm-btn,
	.header-search .form-control:focus,
	.header-search button,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

	@media only screen and (max-width: 767px) { 
		/*a {
			color: <?php echo $color; ?>;
		}*/

		.main-menu .navigation > li > a, 
		.main-menu .navigation > li > ul > li > a, 
		.main-menu .navigation > li > ul > li > ul > li > a,
		.main-menu .navbar-header .navbar-toggle .icon-bar {
			background-color: <?php echo $color; ?>;
			color: #fff;
		}

		.main-menu .navbar-header .navbar-toggle {
			border-color: <?php echo $color; ?>;
		}
	}

</style>