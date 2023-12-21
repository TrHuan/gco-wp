<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-single">
    <section class="lth-project-single">
         <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="module module_single project-single"> 
                        <div class="module_content">
                            <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        get_template_part('template-parts/project/content', 'single');
                                    }
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <aside class="sidebars">
                        <div class="sticky-top">
                            <?php
                                if (is_active_sidebar('sidebar_single_project')) {
                                    dynamic_sidebar('sidebar_single_project');
                                }
                            ?>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <?php

        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DESC',

        ];
        $wp_query_other = new WP_Query($args);
        if ($wp_query_other->have_posts()) { ?>
        <section class="lth-blogs">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="module module_blogs module_other_blogs"> 
                            <div class="module_title">
                                <h2 class="title"><?php echo __('Tin tức'); ?></h2>
                            </div>

                            <div class="module_content">

                                <div class="slick-slider slick-blogs">

                                    <?php while ($wp_query_other->have_posts()) {
                                        $wp_query_other-> the_post();
                                        //load file tương ứng với post format
                                        get_template_part('template-parts/post/content', '02');
                                    } ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>                     
        <?php } else {
            //get_template_part('template-parts/content', 'none');
        }
        // reset post data
        wp_reset_postdata();
    ?>
</main>

<?php get_footer(); ?> 
