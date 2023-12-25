<?php
    $header_top = get_field('header_top', 'option');

	$color = $header_top['color'];
	$bg_color = $header_top['background_color'];

?>
<style type="text/css">
	.header-top {
		background-color: <?php echo $bg_color; ?>;
		color:  <?php echo $color; ?>;
	}

	.header-top a {
		color:  <?php echo $color; ?>;
	}
</style>

<section class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-10 col flex-center">
                <div class="social">
                    <?php get_template_part('templates/addons/socials', 'box'); ?>

                    <a href="mailto:<?php the_field('hotline', 'option'); ?>" title="<?php the_field('hotline', 'option'); ?>"><?php echo __('Email: '); ?> <?php the_field('hotline', 'option'); ?></a>
                </div>
            </div>
            <div class="col-md-6 col-2 flex-center-end">
            	<?php get_search_form(); ?>

                <?php get_template_part('templates/addons/shopcart-box', ''); ?>
            </div>
        </div>
    </div>
</section>