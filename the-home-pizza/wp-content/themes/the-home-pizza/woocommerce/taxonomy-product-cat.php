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
                    <div class="module module_products module_categories">
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
                                        <a href="javascript:0" data_href="<?php echo '#'.$slug; ?>" title="" class="<?php echo $slug; ?>">
                                            <span><?php echo $term->name; ?></span>             
                                        </a>

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
                                                        <a href="javascript:0" data_href="<?php echo '#'.$child_term->slug; ?>">
                                                            <span><?php echo $child_term->name; ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                    </div>

                    <div class="module module_products posts-list">
                        <?php
                        $taxonomyName = "product_cat";
                        $parent = get_queried_object_id();
                        $terms = get_terms([
                            'taxonomy' => get_queried_object()->taxonomy,
                            'parent'   => 0,
                            'order_by' => 'ID',
                            'order' => 'DESC',
                        ]); $i;
                        foreach ( $terms as $term ) { $i++;                           
                            $slug = $term->slug;
                            if ($slug != 'menu-nha-hang' && $slug != 'menu-giao-hang') { ?>
                                <?php 
                                $child_id = $term->term_id;
                                $child_terms = get_terms([
                                    'taxonomy' => get_queried_object()->taxonomy,
                                    'parent'   => $term->term_id,
                                ]);
                                if ($child_terms) { $j; ?>
                                    <?php foreach ( $child_terms as $child_term ) { $j++; ?>
                                        <div data_id="<?php echo $child_term->slug;?>" class="products-list" data_sub="<?php echo $term->slug;?>">
                                            <?php
                                                $args = [
                                                    'post_type' => 'product',
                                                    'post_status' => 'publish',
                                                    'order' => 'DESC',
                                                    'posts_per_page' => $number,
                                                    'orderby' => $orderby,
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'product_cat',
                                                            'field'    => 'term_id',
                                                            'terms'    => $child_term->term_id,
                                                        ),
                                                    ),
                                                ];
                                                $tets = new WP_Query($args);
                                                if ($tets->have_posts()) { ?>

                                                    <div class="groups-box">
                                                        <?php while ($tets->have_posts()) {
                                                            $tets-> the_post(); ?>
                                                            
                                                            <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                                                        <?php } ?>
                                                    </div>
                                                    
                                                <?php } else {
                                                    get_template_part('template-parts/content', 'none');
                                                }
                                                // reset post data
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div data_id="<?php echo $term->slug;?>" class="products-list">
                                        <?php
                                            $args = [
                                                'post_type' => 'product',
                                                'post_status' => 'publish',
                                                'order' => 'DESC',
                                                'posts_per_page' => $number,
                                                'orderby' => $orderby,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'product_cat',
                                                        'field'    => 'term_id',
                                                        'terms'    => $term->term_id,
                                                    ),
                                                ),
                                            ];
                                            $tets = new WP_Query($args);
                                            if ($tets->have_posts()) { ?>

                                                <div class="groups-box">
                                                    <?php while ($tets->have_posts()) {
                                                        $tets-> the_post(); ?>
                                                        
                                                        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                                                    <?php } ?>
                                                </div>
                                                
                                            <?php } else {
                                                get_template_part('template-parts/content', 'none');
                                            }
                                            // reset post data
                                            wp_reset_postdata();
                                        ?>
                                    </div>
                                <?php } ?>
                            <?php }
                        } ?>
                    </div>
                </div>

            </div>
        </div>   
    </section>
</main>

<?php get_footer( 'shop' );