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

<main class="main-site main-page main-products">
    <section class="lth-page-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_banner"> 
                        <div class="module_content">
                            <?php if( have_rows('contact_banner', woocommerce_get_page_id('shop')) ): ?>
                                <?php while( have_rows('contact_banner', woocommerce_get_page_id('shop')) ): the_row(); ?>
                                    <div class="banner-image">
                                        <div class="image">
                                            <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">

                                            <h1><?php the_sub_field('title'); ?></h1>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <section class="lth-products">
        <div class="container-fluid">
            <div class="row">           
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <!-- <div class="module module_products module_categories">
                        <ul>
                            <?php
                            $taxonomyName = "product_cat";
                            $parent = get_queried_object_id();
                            $terms = get_terms([
                                'taxonomy' => get_queried_object()->taxonomy,
                                'parent'   => 0,
                                'order_by' => 'ID',
                                'order' => 'DESC',
                            ]);
                            foreach ( $terms as $term ) {                            
                                $slug = $term->slug;
                                if ($slug != 'menu-nha-hang' && $slug != 'menu-giao-hang') { ?>
                                    <li>
                                        <a href="<?php echo get_term_link( $term, $taxonomy_name ); ?>" title="" class="<?php echo $slug; ?>">
                                            <span><?php echo $term->name; ?></span>              
                                        </a>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                        
                        <?php
                        $taxonomyName = "product_cat";
                        $parent = get_queried_object_id();
                        $terms = get_terms([
                            'taxonomy' => get_queried_object()->taxonomy,
                            'parent'   => 0,
                            'order_by' => 'ID',
                            'order' => 'DESC',
                        ]);
                        foreach ( $terms as $term ) {                            
                            $slug = $term->slug;
                            if ($slug != 'menu-nha-hang' && $slug != 'menu-giao-hang') { ?>
                                    
                                <?php 
                                $child_id = $term->term_id;
                                $child_terms = get_terms([
                                    'taxonomy' => get_queried_object()->taxonomy,
                                    'parent'   => $term->term_id,
                                ]);
                                if ($child_terms) { ?>
                                    <ul class="categories-sub <?php echo $slug; ?>">
                                        <?php foreach ( $child_terms as $child_term ) { ?>
                                            <li>
                                                <a href="<?php echo get_term_link( $child_term, $taxonomy_name ); ?>">
                                                    <span><?php echo $child_term->name; ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>

                            <?php }
                        } ?>
                    </div> -->

                    <aside class="sidebars">                 
                        <?php
                            if (is_active_sidebar('sidebar_shop')) {
                                dynamic_sidebar('sidebar_shop');
                            }
                        ?>

                        <?php echo do_shortcode('[toc]') ?>
                    </aside>

                    <div class="module module_products posts-list products-list">
                        <?php
                            if ( woocommerce_product_loop() ) {
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action( 'woocommerce_before_shop_loop' );

                                woocommerce_product_loop_start();

                                if ( wc_get_loop_prop( 'total' ) ) {
                                    while ( have_posts() ) {
                                        the_post();

                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         */
                                        do_action( 'woocommerce_shop_loop' );

                                        wc_get_template_part( 'content', 'product' );
                                    }
                                }

                                woocommerce_product_loop_end();

                                /**
                                 * Hook: woocommerce_after_shop_loop.
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop' );
                            } else {
                                /**
                                 * Hook: woocommerce_no_products_found.
                                 *
                                 * @hooked wc_no_products_found - 10
                                 */
                                do_action( 'woocommerce_no_products_found' );
                            }
                        ?>
                    </div>
                </div>

            </div>
        </div>   
    </section>
</main>

<?php get_footer( 'shop' );