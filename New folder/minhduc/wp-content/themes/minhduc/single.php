<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header();

$sidebar = get_field('sidebar');
$sidebar_bottom = get_field('sidebar_bottom');
$sidebar_bottom_content = get_field('sidebar_bottom_content'); ?>

<main class="main main-page main-single">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <section class="lth-blog-single">
        <div class="container">
            <div class="row">
                
                <?php 
                    if ($sidebar == 'left') { ?>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 d-none d-lg-block">
                            <aside class="sidebars">
                                <?php if (is_active_sidebar('sidebar_single_blog_left')) {
                                    dynamic_sidebar('sidebar_single_blog_left');
                                } ?>
                            </aside>
                        </div>
                    <?php } 
                ?>

                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
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

                             <?php
                                if ($sidebar_bottom_content == 'yes') { 
                                    if (is_active_sidebar('sidebar_single_blog_bottom_content')) {
                                        dynamic_sidebar('sidebar_single_blog_bottom_content');
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <?php 
                    if ($sidebar == 'left') { ?>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 d-block d-lg-none">
                            <aside class="sidebars">
                                <?php if (is_active_sidebar('sidebar_single_blog_left')) {
                                    dynamic_sidebar('sidebar_single_blog_left');
                                } ?>
                            </aside>
                        </div>
                    <?php } 
                ?>

                <?php 
                    if ($sidebar == 'right') { ?>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <aside class="sidebars">
                                <?php if (is_active_sidebar('sidebar_single_blog_right')) {
                                    dynamic_sidebar('sidebar_single_blog_right');
                                } ?>
                            </aside>
                        </div>
                    <?php } 
                ?>
            </div>
        </div>
    </section>

    <section class="lth-blog">
        <div class="container">
            <?php
                if ($sidebar_bottom == 'yes') { 
                    if (is_active_sidebar('sidebar_single_blog_bottom')) {
                        dynamic_sidebar('sidebar_single_blog_bottom');
                    }
                }
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?> 
