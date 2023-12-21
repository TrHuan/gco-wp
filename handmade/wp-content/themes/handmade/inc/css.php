<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.sidebar-box .menu-danh-muc-san-pham-container li.current-menu-item a,
	.module_videos .module_videos_popup .slick-slider .slick-arrow:hover,
	.module_videos .slider_videos_popup .slick-slider .slick-arrow:hover,
	.product-content-box .post-price .amount,
	.sidebar-box .product-categories .current-cat>a,
	.megamenu .current_page_item a,
	.module_contacts .form-group-button .form-button .wpcf7-submit:hover ~ .icon,
	.module_teams .content-box p,
	.footer-main .footer-box .socials-box .icon,
	.footer-main .footer-box .module_contact label,
	.footer-main h3,
	.module_products .post-price .amount,
	.search-box .search-content .btn-search:hover,
	.home .header-stick .megamenu .nav-menu li.current-menu-item a,
	.home .header-stick .megamenu .nav-menu a:hover,
	.megamenu .nav-menu li.current-menu-item a,
	.megamenu.megamenu-desktop a:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover,
	.back-to-top,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.module_product_tabs .title:after,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.module_contacts .form-group-button .form-button .wpcf7-submit,
	.slick-slider .slick-arrow:hover,
	.slick-slidershow .slick-arrow:hover,
	.wpcf7-submit, .submit, .btn, .button, button,
	.back-to-top:hover{
		background-color: <?php echo $color; ?>;
	}

	.slick-slider .slick-arrow:hover,
	.slick-slidershow .slick-arrow:hover,
	.back-to-top:hover {
		color: #fff;
	}

	.sidebar-box .menu-danh-muc-san-pham-container .sub-menu li.current-menu-item a,
	/*.module_product_tabs .title,*/
	.sidebar-box .product-categories .cat-parent ul li.current-cat > a,
	.pagination .page-numbers.current,
	.pagination .page-numbers:hover,
	.module_contacts .form-group-button .form-button .wpcf7-submit,
	.slick-slider .slick-arrow:hover,
	.slick-slidershow .slick-arrow:hover,
	.wpcf7-submit, .submit, .btn, .button, button,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

</style>