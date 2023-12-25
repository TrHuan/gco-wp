<?php
/**
 * Template Name: Trang Tin Tức
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-blogs">
    <section class="lth-blogs ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_posts blogs-list"> 
                        <div class="section-title default-title">
                            <h1><?php the_title(); ?></h1>
                        </div>

                        <div class="module_content">
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

                                    <div class="groups-box">

                                        <?php while ($wp_query->have_posts()) {
                                            $wp_query-> the_post();
                                            //load file tương ứng với post format
                                            get_template_part('template-parts/post/content', '');
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

    <?php if( have_rows('contacts', 'options') ): ?>
        <section class="lth-contacts">
            <div class="container">                   
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php get_template_part('templates/addons/contact', ''); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( have_rows('features', 'options') ): ?>
        <section class="lth-features">
            <div class="container">                   
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php get_template_part('templates/addons/features', ''); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
