<?php
/**
 * Template Name: Trang Báo Giá
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-quotes">
    <section class="lth-products lth-products-list">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <aside class="lth-sidebars sticky-top" style="top: 66px">
                        <?php
                            if (is_active_sidebar('sidebar_quotes')) {
                                dynamic_sidebar('sidebar_quotes');
                            }
                        ?>
                    </aside>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="module module_products module_products_list"> 
                        <div class="module_content">
                            <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $args = [
                                    'post_type' => 'bao-gia',
                                    'post_status' => 'publish',
                                    'posts_per_page' => $posts_per_page,
                                    'paged' => $paged,
                                ];
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>

                                    <div class="groups-box">

                                        <?php while ($wp_query->have_posts()) {
                                            $wp_query-> the_post();
                                            //load file tương ứng với post format
                                            get_template_part('template-parts/bao-gia/content', '');
                                        } ?>

                                    </div>
                                    
                                    <?php require_once(LIBS_DIR . '/pagination.php');
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
