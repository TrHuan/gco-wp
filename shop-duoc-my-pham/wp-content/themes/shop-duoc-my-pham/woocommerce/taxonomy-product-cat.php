<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' ); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-categories.php'); ?>

<main class="main-site main-page main-products">
    <div class="main-container">
        <div class="main-content">

        	<!-- <article class="lth-featured-image" style="padding: 0 0 20px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="featured-image-box">
                                <?php
                                    $page_shop = get_field('page_shop', 'option');
                                    $img = $page_shop['featured_image'];
                                ?>
                                <img src="<?php echo $img; ?>" alt="Featured image" style= "width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>   
            </article> -->

            <article class="lth-products products-list">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="products-box">
                            	<?php
	                            	$term_id = get_queried_object()->term_id;
									$taxonomy_name = 'product_cat';
									$termchildren = get_term_children( $term_id, $taxonomy_name );
									 
									foreach ( $termchildren as $child ) {
									    $term = get_term_by( 'id', $child, $taxonomy_name ); ?>
									    <!-- echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>'; -->

									    <section class="products">
				                            <div class="container">
				                                <div class="product-title flex-center-between">
				                                    <h1 class="title"><?php echo $term->name ?></h1>
				                                    <a href=" <?php echo get_term_link($child, 'product_cat') ?>"><?php echo __('XEM TẤT CẢ'); ?></a>
				                                </div>
				                                <div class="row">
				                                    <?php
				                                    $args = array(
				                                        'post_type' => 'product',
				                                        'post_status' => 'publish',
				                                        'posts_per_page' => 4,
				                                        'product_cat' => $term->id,
				                                        'orderby' => $orderby,
				                                    );

				                                    $getposts = new WP_query( $args);
				                                    if ($getposts->have_posts()) { ?>

				                                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				                                            <?php global $product; ?>
				                                            
				                                            <div class="col-md-3 mgb-20">
				                                                <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
				                                            </div>
				                                            
				                                        <?php endwhile; wp_reset_postdata(); ?>

				                                    <?php } else { ?> 
				                                        <?php get_template_part('template-parts/content', 'none'); ?>
				                                    <?php } ?>                                          
				                                </div>
				                            </div>
				                        </section>
									<?php }
								?> 

                                <?php
	                                if ( !$termchildren ) { 
	                                	$category = get_term($term_id);
	                            ?>
	                                    <section class="products">
				                            <div class="container">
				                                <div class="product-title flex-center-between">
				                                    <h1 class="title"><?php echo $category->name; ?></h1>
				                                </div>
				                                <p class="desc mgb-20"><?php echo $category->description; ?></p>
				                                <div class="row">
				                                    <?php
                            						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				                                    $args = array(
				                                        'post_type' => 'product',
				                                        'post_status' => 'publish',
				                                        'posts_per_page' => 12,
				                                        'product_cat' => $category->name,
				                                        'orderby' => $orderby,
				                                        'paged' => $paged,
				                                    );

				                                    $getposts = new WP_query( $args);
				                                    if ($getposts->have_posts()) { ?>

				                                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				                                            <?php global $product; ?>
				                                            
				                                            <div class="col-md-3 mgb-20">
				                                                <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
				                                            </div>
				                                            
				                                        <?php endwhile; wp_reset_postdata(); ?>

				                                    <?php } else { ?> 
				                                        <?php get_template_part('template-parts/content', 'none'); ?>
				                                    <?php } ?>                                          
				                                </div>

				                                <?php require_once(LIBS_DIR . '/paginations/pagination.php'); ?>
				                            </div>
				                        </section>
									<?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>   
            </article>

        </div>     
    </div>
</main>

<?php get_footer( 'shop' );
