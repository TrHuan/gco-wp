<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php //get_template_part('template-parts/breadcrumbs', ''); ?>

<main class="main main-page main-single">
    <section class="lth-recruitment-single">
         <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="module module_single recruitment-single"> 
                        <div class="module_content">
                            <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        get_template_part('template-parts/tuyen-dung/content', 'single');
                                    }
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <aside class="sidebars">
                        <?php
                            if (is_active_sidebar('sidebar_recruitment')) {
                                dynamic_sidebar('sidebar_recruitment');
                            }
                        ?>
                    </aside>
                </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 