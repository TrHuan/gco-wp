<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-single">
    <section class="lth-blog-single">
         <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="module module_single post-single ptb-80"> 
                        <div class="module_content">
                            <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        get_template_part('template-parts/post/content', 'single');
                                    }
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <aside class="sidebars ptb-80">
                        <?php
                            if (is_active_sidebar('sidebar_single_blog')) {
                                dynamic_sidebar('sidebar_single_blog');
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
