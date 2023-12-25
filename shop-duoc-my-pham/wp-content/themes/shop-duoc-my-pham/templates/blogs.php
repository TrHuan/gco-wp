<?php
/**
 * Template Name: Page Blogs
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-categories.php'); ?>

<main class="main-site main-page main-posts news-page">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                            <h3 class="title-page">Tin tức</h3>

                            <div class="posts-box">
                                <div class="content-box">
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
                                            <div class="news-group">
                                                <?php while ($wp_query->have_posts()) {
                                                    $wp_query-> the_post(); ?>
                                                    <div class="news-item mgt-20">
                                                        <?php get_template_part('template-parts/post/content', get_post_format()); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <?php require_once(LIBS_DIR . '/paginations/pagination.php');
                                        } else {
                                            get_template_part('template-parts/post/content', 'none');
                                        }
                                        // reset post data
                                        wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 visible-desktop d-none d-md-block">
                             <div class="sidebars sticky-top">
                                <!-- Sidebar -->
                                <?php if (is_active_sidebar('sidebar_blogs')) { ?>

                                    <aside class="lth-sidebars">
                                        <?php dynamic_sidebar('sidebar_blogs'); ?>
                                    </aside>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>   
            </article>

            <?php
                $page__blogs = get_field('page__blogs', 'option');
                if( $page__blogs ):
                    $select = $page__blogs['show_blogs'];

                    if ($select) {
                        if( have_rows('page__blogs', 'option') ):
                            while( have_rows('page__blogs', 'option') ): the_row();
                                if( have_rows('blogs', 'option') ):
                                    while( have_rows('blogs', 'option') ): the_row();
                                        get_template_part('templates/blogs/related-posts', '');
                                    endwhile;
                                endif;
                            endwhile;
                        endif;
                    }
                endif;
            ?>

            <?php
                $page__blogs = get_field('page__blogs', 'option');
                if( $page__blogs ):
                    $select = $page__blogs['show_products'];

                    if ($select) {
                        if( have_rows('page__blogs', 'option') ):
                            while( have_rows('page__blogs', 'option') ): the_row();
                                if( have_rows('products', 'option') ):
                                    while( have_rows('products', 'option') ): the_row();
                                        get_template_part('woocommerce/product-box/related-products', '');
                                    endwhile;
                                endif;
                            endwhile;
                        endif;
                    }
                endif;
            ?>

        </div>     
    </div>
</main>

<?php get_footer(); ?>
