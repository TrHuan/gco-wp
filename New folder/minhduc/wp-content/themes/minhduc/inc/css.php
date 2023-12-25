<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.breadcrumb span,
	.btn-blues__alls:hover > i,
	.items-news__mains .intros-news__mains .name-news__mains:hover,
	.items-news__mains .intros-news__mains .name-news__mains:focus,
	.sl-feedback__mains .swiper-pagination .swiper-pagination-bullet-active,
	.text-color__blues,
	.items-news__mains .intros-news__mains .btn-see__news,
	.list-intros__footers li a:hover,
	.list-intros__footers li a:focus,
	.menu-desktop > ul > li > a:hover,
	.menu-desktop > ul > li > a:focus,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.btn-blues__alls:hover,
	.items-news__mains .intros-news__mains .btn-see__news:hover,
	.items-news__mains .intros-news__mains .btn-see__news:focus,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.form-contacts__details .wpcf7-submit:hover,
	.btn-blues__alls:hover,
	.sl-feedback__mains .swiper-pagination .swiper-pagination-bullet-active,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

	/*.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php //echo $color; ?>;
	}

	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php //echo $color; ?>;
		color: #fff;
	}

	.back-to-top {
		border-color: <?php //echo $color; ?>;
	}*/

</style>