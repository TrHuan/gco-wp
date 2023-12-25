<?php
/**
 * Template Name: Trang Giỏ Hàng - Thanh Toán
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-page" style="background: #fff;">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <section class="page lth-page-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <?php if (have_posts()) { ?>
                        <?php while (have_posts()) { the_post(); ?> 
                            <div class="module module_page">
                                <div class="module_content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <?php
                            echo wpautop(__('Sory, no posts were found.'));
                            echo __('Sory, no posts were found.');
                        ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>    

    <?php if( have_rows('products_like','option') ): ?>  
        <?php while( have_rows('products_like','option') ): the_row(); ?>
            <div class="b3 pdetail-re">
                <div class="container">
                    <div class="pwrap">
                        <h2 class="f1 s18 t2 text-center"><?php the_sub_field('title'); ?></h2>
                        <h3 class="bold s24 t1 text-uppercase text-center tit"><?php the_sub_field('title_2'); ?></h3>
                        
                        <?php
                            $cates = [];
                            $i = 0;

                            $featured_posts = get_sub_field('products');
                            if( $featured_posts ){
                                foreach( $featured_posts as $featured_post ):
                                    $cates[$i] = $featured_post;
                                    $i++;
                                endforeach;
                            }

                            $args = array(
                                'post_type'           => 'product',
                                'post_status'         => 'publish',
                                // 'orderby' => $orderby,
                                // 'order' => 'DESC',
                                // 'posts_per_page' => 6,
                                // 'tax_query' => array(
                                //     array(
                                //         'taxonomy' => 'product_cat',
                                //         'field'    => 'term_id',
                                //         'terms'    => $term,
                                //     ),
                                // ),
                                'post__in' => $cates,
                            );
                            $tets = new WP_Query($args);
                            if ($tets->have_posts()) { ?>

                                <div class="pdetail-reslider">
                                    <?php while ($tets->have_posts()) {
                                        $tets-> the_post(); ?>
                                        
                                        <?php get_template_part('woocommerce/product-box/product-box', '3'); ?>
                                    <?php } ?>
                                </div>
                                
                            <?php }
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
