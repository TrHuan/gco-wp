<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.popup-box.popup-2 .content-box form.wpcf7-form .form-group-button .wpcf7-submit,
	.popup-content form.wpcf7-form .form-group-button .form-button .wpcf7-submit:hover,
	.lth-service-pack .title,
	.lists-content .module_button .btn:hover,
	form.wpcf7-form .groups-box-3 h3,
	form.wpcf7-form .form-group-button .form-button .wpcf7-submit,
	.module_categories .category .btn:hover,
	.module_blogs .content-days,
	.module_blogs .content_list .content-button .btn:hover,
	.module_blogs .module_button .btn:hover,
	.module_blogs .content-name a:hover,
	.module_blogs .content-button a,
	.title-tab .title.active,
	.title-tab .title:hover,
	.lth-section .module_footer .btn:hover,
	.module_categories .category h3 a:hover,
	.back-to-top, .title,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.popup-box.popup-2 .content-box form.wpcf7-form .form-group-button .wpcf7-submit:hover,
	.popup-content form.wpcf7-form .form-group-button .form-button .wpcf7-submit,
	.lists-content .module_button .btn,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	form.wpcf7-form .form-group-button .form-button .wpcf7-submit:hover,
	.module_categories .category .btn,
	.module_blogs .content_list .content-button .btn,
	.module_blogs .module_button .btn,
	.lth-section .module_footer .btn,
	.megamenu li.current-menu-item>a,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.popup-content form.wpcf7-form .form-group-button .form-button .wpcf7-submit,
	.lists-content .module_button .btn,
	.module_categories .category .btn,
	.module_blogs .content_list .content-button .btn,
	.module_blogs .content_list .module_button .btn,
	.lth-section .module_footer .btn,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

	/*.title-tab .title.active,
	.title-tab .title:hover,
	.back-to-top,
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