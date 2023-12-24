<?php
/**
 * Template Name: Trang Tin Tức
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <section class="blog-area pt-120 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="product-sidebar-area pr-30">
                        <?php
                            if (is_active_sidebar('sidebar_blog')) {
                                dynamic_sidebar('sidebar_blog');
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
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

                                <?php while ($wp_query->have_posts()) {
                                    $wp_query-> the_post(); ?>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="blog-hm-wrapper mb-40">
                                            <div class="blog-img">
                                                <a href="<?php the_permalink(); ?>" title="" class="image">
                                                    <img src="<?php echo lth_custom_img('full', 775, 525);?>" alt="<?php the_title(); ?>">
                                                </a>
                                                <div class="blog-date">
                                                    <h4><?php the_time('d/m/Y'); ?></h4>
                                                </div>
                                                <div class="blog-hm-social">
                                                    <?php if( have_rows('other') ): ?>
                                                        <?php while( have_rows('other') ): the_row(); ?>
                                                            <?php
                                                                $socials = get_sub_field('socials');
                                                                $link_facebook = $socials['link_facebook'];
                                                                if( $link_facebook ) {
                                                                    $facebook_url = $link_facebook['url'];
                                                                    $facebook_title = $link_facebook['title'];
                                                                    $facebook_target = $link_facebook['target'] ? $link_facebook['target'] : '_self';
                                                                }
                                                                $link_twitter = $socials['link_twitter'];
                                                                if( $link_twitter ) {
                                                                    $twitter_url = $link_twitter['url'];
                                                                    $twitter_title = $link_twitter['title'];
                                                                    $twitter_target = $link_twitter['target'] ? $link_twitter['target'] : '_self';
                                                                }
                                                                $link_google_plus = $socials['link_google_plus'];
                                                                if( $link_google_plus ) {
                                                                    $google_plus_url = $link_google_plus['url'];
                                                                    $google_plus_title = $link_google_plus['title'];
                                                                    $google_plus_target = $link_google_plus['target'] ? $link_google_plus['target'] : '_self';
                                                                }
                                                            ?>
                                                            <ul>
                                                                <li><a href="<?php echo $facebook_url; ?>" target="<?php echo $facebook_target; ?>" title=""><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="<?php echo $twitter_url; ?>" target="<?php echo $twitter_target; ?>" title=""><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="<?php echo $google_plus_url; ?>" target="<?php echo $google_plus_target; ?>" title=""><i class="fa fa-google-plus"></i></a></li>
                                                            </ul>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="blog-hm-content">
                                                <h3>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
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
    </section>
</main>

<?php get_footer(); ?>
