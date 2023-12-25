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
            <div class="blog-area pt-90 pb-90">
                <div class="container">
                    <div class="section-title text-center">
                        <h1 class="h2">
                            <?php if (get_post_type() == 'page') {
                                the_title();
                            }

                            if (get_post_type() == 'post') {
                                if (is_category()) {
                                    single_cat_title();
                                }
                            } ?>
                        </h1>

                        <?php if (get_post_type() == 'page') {
                            the_content();
                        }

                        if (get_post_type() == 'post') {
                            if (is_category()) {
                                $archive_page = get_pages(
                                    array(
                                        'meta_key' => '_wp_page_template',
                                        'meta_value' => 'templates/blogs.php'
                                    )
                                );
                                $archive_id = $archive_page[0]->ID;
                                the_content($archive_id);
                            }
                        } ?>
                    </div>

                    <div class="row">                    
                        <?php while ($wp_query->have_posts()) {
                            $wp_query-> the_post(); ?>
                            <div class="col-lg-4 col-md-6 mb-40">
                                <?php get_template_part('template-parts/post/content', ''); ?>
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
