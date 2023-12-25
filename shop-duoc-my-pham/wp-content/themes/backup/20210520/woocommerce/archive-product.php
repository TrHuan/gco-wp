<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-categories.php'); ?>

<main class="main-site main-page main-products">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-featured-image" style="padding: 0 0 20px;">
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
            </article>

            <?php 
                $terms = get_terms( array( 'taxonomy' => 'product_cat', 'parent' => 0 ) );

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){

                    foreach ( $terms as $term ) { ?>

                       <section class="products">
                            <div class="container">
                                <div class="product-title flex-center-between">
                                    <h1 class="title"><?php echo $term->name ?></h1>
                                    <a href=" <?php echo get_term_link($term->slug, 'product_cat') ?>"><?php echo __('XEM TẤT CẢ'); ?></a>
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

                }
            ?>

        </div>     
    </div>
</main>

<?php get_footer( 'shop' );
