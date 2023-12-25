<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-single.php'); ?>

<main class="main-site main-page main-single">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-post-single">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <div class="sidebars sticky-top">
                                <!-- Sidebar -->
                                <?php if (is_active_sidebar('sidebar_blogs_detail')) { ?>

                                    <aside class="lth-sidebars">
                                        <?php dynamic_sidebar('sidebar_blogs_detail'); ?>
                                    </aside>

                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="post-single-box news-detail">
                                <div class="content-box">
                                    <?php
                                        if (have_posts()) {
                                            while (have_posts()) {
                                                the_post();
                                                get_template_part('template-parts/post/content', get_post_format());
                                            }
                                        } else {
                                            get_template_part('template-parts/content', 'none');
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="lth-reviews">
                                <div class="reviews-box">
                                    <div class="comments-facebook-box">
                                        <?php get_template_part('templates/addons/comment-facebook', ''); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <?php
                $posts = get_field('posts');
                if( $posts ):
            ?>
                <article class="lth-posts lth-related-posts">
                    <div class="container">             
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="posts-box">
                                    <div class="title-box">
                                        <h3 class="title"><?php echo __('Bài viết liên quan'); ?></h3>
                                    </div>
                                        <div class="content-box">
                                            <div class="slick-slider slick-related-posts">
                                                <?php foreach( $posts as $post ): 
                                                    setup_postdata($post); ?>

                                                    <div class="item">
                                                        <?php get_template_part('template-parts/post/content', get_post_format()); ?>
                                                    </div>

                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endif; ?>

        </div>
    </div>
</main>

<?php get_footer(); ?> 
