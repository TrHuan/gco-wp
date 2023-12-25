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
                <?php
                    $sidebar = get_field('page_single_blog', 'option');
                    $select = $sidebar['sidebars'];
                ?>
                <?php if ($select) { ?>
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                <?php } else { ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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

                <?php if ($select) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                        <aside class="sidebars">
                            <?php
                                if (is_active_sidebar('sidebar_blog')) {
                                    dynamic_sidebar('sidebar_blog');
                                }
                            ?>
                        </aside>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 
