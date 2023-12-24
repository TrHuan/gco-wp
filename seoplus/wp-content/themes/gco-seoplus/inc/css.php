<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">
	.back-to-top,
	.logins-box .login-submit input,
	.main-my-account .content-box .woocommerce-MyAccount-content .edit,
	.contacts-box form .wpcf7-submit,
	.slick-slider .slick-dots button:hover,
	.slick-slider .slick-dots .slick-active button,
	.pagination .page-numbers,
	.slick-slider .slick-arrow,
	.wpcf7-submit, .submit, .btn, .button, button {
		border-color: <?php echo $color; ?>;
	}

	.lth-post-single .sidebars .sidebar-box .content-box .item .post-content .post-title:before,
	.tables-box .table .colspan a:hover,
	.lth-banners.style_08 .banner-content .buttons .btn,
	.lth-banners.style_07 .banner-content .buttons .btn,
	.main-contacts .contacts-box .form-group.form-group-button .button-load .wpcf7-submit:hover,
	.back-to-top:hover,
	.popups-content form .form-control.wpcf7-submit:hover,
	.popups-content form .wpcf7-form-control.wpcf7-submit:hover,
	.footer-bottom .copyright a:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover,
	.search-button .title-box .btn,
	.tabs-box .title-tab .title.active,
	.tab-box-2 .title.active,
	.lth-logins .user-box a.active,
	.main-my-account .content-box .woocommerce-MyAccount-content .edit,
	.main-my-account .content-box .woocommerce-MyAccount-navigation li.is-active a,
	.header-main .hotline-box a,
	.contacts-box form .wpcf7-submit,
	.logins-box .user-close:hover,
	.tab-link .active a, .tab-link a:hover,
	.pagination .page-numbers,
	#review_form .comment-form-rating .stars > span:hover a,
	#review_form .comment-form-rating .selected a,
	.star-rating span,
	.slick-slider .slick-arrow,
	.back-to-top,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.muc-luc-box .sub-menu a.active:after, 
	.muc-luc-box .sub-menu a:hover:after,
	.lth-banners.style_08 .banner-content .buttons .btn:after,
	.lth-banners.style_07 .banner-content .buttons .btn:after,
	.lth-banners.style_04 .banner-box .banner-content .btn:hover,
	.megamenu .nav a:after,
	.slick-slider .slick-dots button:hover,
	.slick-slider .slick-dots .slick-active button {
		background-color: <?php echo $color; ?>;
	}

	.post-single-box .post-content .post-tags a:hover,
	.main-contacts .contacts-box .form-group.form-group-button .button-load .wpcf7-submit,
	.back-to-top,
	.popups-content form .form-control.wpcf7-submit,
	.popups-content form .wpcf7-form-control.wpcf7-submit,
	.wpcf7-submit, .submit, .btn, .button, button,
	.main-my-account .content-box .woocommerce-MyAccount-content .edit:hover,
	.contacts-box form .wpcf7-submit:hover,
	.megamenu .menu-mobile-title .title:hover,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.slick-slider .slick-arrow:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.search-box .content-box .btn:hover {
		color: #fff !important;
	}

	.main-contacts .contacts-box .form-group.form-group-button .button-load .wpcf7-submit:hover,
	.back-to-top:hover,
	.popups-content form .form-control.wpcf7-submit:hover,
	.popups-content form .wpcf7-form-control.wpcf7-submit:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
    	background-color: #fff;
    }
</style>