<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">
	
	.module_projects .content-name a:hover,
	.module_products .content-name a:hover,
	.sidebar-quotes ul a:hover,
	.module_blogs .content-name a:hover,
	.module_blogs .content-button a:hover,
	.nav-breadcrumbs a:hover,
	.megamenu-destop .sub-menu .sub-menu a:hover,
	.megamenu-destop li:hover > a,
	.megamenu-destop a:hover,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.module_contacts form .wpcf7-submit:hover,
	/*.back-to-top:hover,*/
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	/*.back-to-top:hover,*/
	.module_contacts form .wpcf7-submit:hover,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

</style>