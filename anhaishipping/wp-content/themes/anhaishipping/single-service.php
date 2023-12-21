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
    <section class="lth-service-single">
         <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="module module_single service-single"> 
                        <div class="module_content">
                            <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        get_template_part('template-parts/service/content', 'single');
                                    }
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 col-12">
                    <aside class="sidebars">
                        <div class="sticky-top">
                            <?php
                                if (is_active_sidebar('sidebar_single_service')) {
                                    dynamic_sidebar('sidebar_single_service');
                                }
                            ?>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 
