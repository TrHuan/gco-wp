<?php
/**
 * Template Name: All Addons (Main)
 * 
 * @author LTH
 * @since 2020
 */
?>


<?php if( get_row_layout() == 'slidershow' ): ?>      
    <?php get_template_part('templates/addons/slidershow', ''); ?>
<?php endif; ?>



<?php if( get_row_layout() == 'banners' ): ?>
	<?php get_template_part('templates/addons/banners', ''); ?>
<?php endif; ?>



<?php if( get_row_layout() == 'blogs' ): ?>
	<?php get_template_part('templates/addons/blogs', ''); ?>
<?php endif; ?>



<?php if( get_row_layout() == 'features' ): ?>
	<?php get_template_part('templates/addons/features', ''); ?>
<?php endif; ?>



<?php if( get_row_layout() == 'testimonials' ): ?>
	<?php get_template_part('templates/addons/testimonials', ''); ?>
<?php endif; ?>



<?php if( get_row_layout() == 'google_map' ): ?>
	<?php get_template_part('templates/addons/map', ''); ?>
<?php endif; ?> 



<?php if( get_row_layout() == 'brands' ): ?>
	<?php get_template_part('templates/addons/brands', ''); ?>
<?php endif; ?> 



<?php if( get_row_layout() == 'contact' ): ?>
	<?php get_template_part('templates/addons/contact', ''); ?>
<?php endif; ?>    



<?php if( get_row_layout() == 'customs_menus' ): ?>
    <?php get_template_part('templates/addons/customs-menus', ''); ?>
<?php endif; ?>    



<?php if( get_row_layout() == 'service_categories' ): ?>
	<?php get_template_part('templates/addons/categories', ''); ?>
<?php endif; ?>



<?php if( get_row_layout() == 'tables' ): ?>
	<?php get_template_part('templates/addons/tables', ''); ?>
<?php endif; ?>



<?php if( get_row_layout() == 'tabs' ): ?>
	<?php get_template_part('templates/addons/tabs', ''); ?>
<?php endif; ?> 


<?php if ( class_exists( 'WooCommerce' ) ) { ?>

	<?php if( get_row_layout() == 'products' ): ?>
		<?php get_template_part('templates/addons/products', ''); ?>
	<?php endif; ?>



	<?php if( get_row_layout() == 'product_categories' ): ?>
		<?php get_template_part('templates/addons/categories', ''); ?>
	<?php endif; ?>
	
<?php } else { ?>

	<?php if( get_row_layout() == 'products' ): ?>
		<?php get_template_part('template-parts/woocommerce', 'none'); ?>
	<?php endif; ?>



	<?php if( get_row_layout() == 'product_categories' ): ?>
		<?php get_template_part('template-parts/woocommerce', 'none'); ?>
	<?php endif; ?>

<?php } ?>