<?php
/**
 * The template for displaying woocommerce pages
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amazica 
 */
get_header();?>
<?php global $vz_options;?>
<style type="text/css" media="screen">
.shopping_cart {
	display:block;
}
</style>
<!-- Blog & Sidebar Section -->
<section id="woocommerce-product" class="page-wrapper">
	<?php if(is_archive()) :?>
	<?php get_template_part('sections/specia','breadcrumb');?>
	<section id="woocommerce_archive">
		<div class="background-overlay">
			<div class="container">
				<div class="nav-menu_categories">
					<?php 
						wp_nav_menu( array(
						    'theme_location'    => 'menu_categories', 
						    'menu_id'           => 'menu_category_product', 
						    'menu_class'        => 'menu',
						) );
					?> 
				</div>
	        	<div class="row woocommerce-archive">
	        		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
	        			<h2 class="title-archive-woo"><?php woocommerce_page_title(); ?></h2>
	        			<?php woocommerce_content(); ?>
	        		</div>
	        		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 woocommerce-sidebar">
						<div class="woo-sidebar">
							<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>
						</div>
					</div>
	        	</div>
			</div>
		</div>
	</section>

	<?php get_template_part('sections/specia','blog');?>
	<?php else : ?>
	<?php get_template_part('sections/specia','breadcrumb');?>
	<div class="background-overlay">
		<div class="container">
			<h2 class="page-title"><?php the_title(); ?></h2>
			<?php woocommerce_content(); ?>
		</div>
	</div>
	<?php endif; ?>
</section>
<!-- End of Blog & Sidebar Section -->
 <?php get_template_part('sections/specia','partner'); ?>
<div class="clearfix"></div>

<?php get_footer(); ?>

