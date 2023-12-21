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

<?php $term_id = get_queried_object_id();
// $term = get_term_by('id', $term_id, 'product_cat');
$thumbnail_id = get_woocommerce_term_meta($term_id, 'thumbnail_id', true);
$image = wp_get_attachment_url($thumbnail_id); ?>

<!-- Blog & Sidebar Section -->
<section id="woocommerce-product" class="page-wrapper">
	<?php if(is_archive()) :?>
	<section id="banner-featured_page" class="fadeIn wow" data-wow-delay="0.2s">
	    <img src="<?php echo $image;?>" alt="Banner">
	  	<div class="background-overlay">
	  		<div class="container">
	  			<div class="page-breadcrumb">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p>','</p>' );
                }
                ?>
            </div>	
	    		<h2 class="title-page"><?php woocommerce_page_title(); ?></h2>
	  		</div>
	  	</div>
	</section>
	<section id="woocommerce_archive">
		<div class="background-overlay">
			<div class="container">
	        	<div class="row woocommerce-archive">
	        		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 woocommerce-sidebar">
						<!--<div class="woo-sidebar">
							<h3 class="tit-woo-sidebar">Danh mục</h3>
							<?php 
							wp_nav_menu( array(
							    'theme_location'    => 'menu_categories', 
							    'menu_id'           => 'menu_category_product', 
							    'menu_class'        => 'menu',
							) );
							?> 
						</div> -->
						<div class="woo-sidebar">
							<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>
						</div>
					</div>
	        		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
	        			<h2 class="title-archive-woo"><?php woocommerce_page_title(); ?></h2>
	        			<?php woocommerce_content(); ?>
	        		</div>
	        	</div>
		        <?php get_template_part('sections/specia','partner');?>
			</div>
		</div>
	</section>
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
 
<div class="clearfix"></div>

<?php get_footer(); ?>

