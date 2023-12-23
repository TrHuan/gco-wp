<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.btn-abouts__prds,
	.navs-footers li a:hover, .navs-footers li a:focus,
	.text-intros__footers a:hover, .text-intros__footers a:focus,
	.btn-see__alls:hover, .btn-see__alls:focus,
	.btn-see__alls,
	.item-prds__mains .intros-prds__mains .names-prds__mains:hover,
	.item-prds__mains .intros-prds__mains .names-prds__mains:focus,
	.bottom-favorite__mains li a:hover,
	.bottom-favorite__mains li a:focus,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.btn-see__alls:after,
	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.btn-abouts__prds,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

	.btn-abouts__prds {
		color: <?php echo $color; ?> !important;
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