<?php
/**
 * Template Name: Trang Tin Tức
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'paged' => $paged,
        ];
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) { ?>
            <div class="container">
                <div class="vk-shop__box vk-shop__box--style-1 pt-5 pb-5">
                    <h1 class="vk-page__title mb-4">
                        <?php if (get_post_type() == 'page') {
                            the_title();
                        }

                        if (get_post_type() == 'post') {
                            if (is_category()) {
                                single_cat_title();
                            }
                        } ?>
                    </h1>
                    <div class="row vk-blog__list">
                        <?php while ($wp_query->have_posts()) {
                            $wp_query-> the_post(); ?>
                            <div class="col-sm-6  col-lg-4 _item">
                                <?php get_template_part('template-parts/post/content', 'list'); ?>
                            </div>
                        <?php } ?>                            
                    </div>
                
                    <?php require_once(LIBS_DIR . '/pagination.php'); ?>
                </div>
            </div>            
        <?php } else {
            get_template_part('template-parts/content', 'none');
        }
        // reset post data
        wp_reset_postdata();
    ?>
</main>

<?php get_footer(); ?>
