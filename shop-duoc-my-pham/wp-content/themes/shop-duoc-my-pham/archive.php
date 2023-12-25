<?php
/**
 * The template for displaying archive pages
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
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="posts-box">
                                <div class="content-box">                                    
                                    <?php
                                    if (have_posts()) { ?>

                                        <div class="news-group">
                                            <?php while (have_posts()) {
                                                the_post(); ?>

                                                <div class="news-item mgt-20">
                                                    <?php
                                                        //load file tương ứng với post format
                                                        get_template_part('template-parts/post/content', get_post_format());
                                                    ?>
                                                </div>
                                                
                                            <?php } ?>
                                        </div>

                                        <?php require_once(LIBS_DIR . '/paginations/pagination.php');
                                        
                                    } else {
                                        get_template_part('template-parts/post/content', 'none');
                                    }
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

        </div>
    </div>
</main>

<?php get_footer(); ?>
