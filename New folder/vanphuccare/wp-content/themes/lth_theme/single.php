<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header();

$sidebar = get_field('sidebar');

$style = get_field('style'); ?>

<main class="main main-page main-single">
    <?php //require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <?php if ($style == 'style_01') { ?>
        <section class="lth-blog-single">
            <div class="container">
                <div class="row">
                    
                    <?php if ($sidebar == 'left') { ?>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 d-none d-lg-block">
                            <aside class="sidebars">
                                <?php if (is_active_sidebar('sidebar_single_blog')) {
                                    dynamic_sidebar('sidebar_single_blog');
                                } ?>
                            </aside>
                        </div>
                    <?php } ?>

                    <?php  if ($sidebar == 'no') { ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <?php } else { ?>
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <?php } ?>
                        <div class="module module_single post-single"> 
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

                    <?php if ($sidebar == 'left') { ?>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 d-block d-lg-none">
                            <aside class="sidebars">
                                <?php if (is_active_sidebar('sidebar_single_blog')) {
                                    dynamic_sidebar('sidebar_single_blog');
                                } ?>
                            </aside>
                        </div>
                    <?php } ?>

                    <?php if ($sidebar == 'right') { ?>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <aside class="sidebars">
                                <?php if (is_active_sidebar('sidebar_single_blog')) {
                                    dynamic_sidebar('sidebar_single_blog');
                                } ?>
                            </aside>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>    
    <?php } else { ?>
        <div class="container">
            <div class="module_header title-box title-page">
                <h1 class="title">
                    <?php the_title(); ?>
                </h1> 

                <div class="content-excerpt">
                    <?php wpautop(the_excerpt()); ?>
                </div>
            </div>
        </div>

        <?php the_content(); ?>
    <?php } ?>
</main>

<?php get_footer(); ?> 
