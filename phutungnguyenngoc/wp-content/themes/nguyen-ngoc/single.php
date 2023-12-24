
<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-single">
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
                    <div class="blog-details-wrapper res-mrg-top">
                        <?php
                            if (have_posts()) {
                                while (have_posts()) {
                                    the_post(); ?>
                                    <div class="blog-img mb-30">
                                        <img src="<?php echo lth_custom_img('full', 775, 525);?>" alt="<?php the_title(); ?>">
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
                                    <h1><?php the_title(); ?></h1>

                                    <?php the_content(); ?>
                                    
                                    <div class="blog-dec-tags-social">
                                        <div class="blog-dec-tags">
                                            <span><?php echo __('tags :'); ?></span>
                                            <ul>
                                                <?php
                                                    $posttags = get_the_tags();
                                                    if ($posttags) {
                                                        foreach($posttags as $tag) { ?>
                                                            <li><a href="#"><?php echo $tag->name; ?></a></li> 
                                                        <?php }
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="blog-dec-social">
                                            <span><?php echo __('Chia sẻ:'); ?></span>
                                            <ul>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="icofont icofont-social-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/share?text=&url=<?php the_permalink(); ?>"><i class="icofont icofont-social-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="https://www.pinterest.com/pin/create/button/?url=&media=&description=<?php the_permalink(); ?>"><i class="icofont icofont-social-pinterest"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php }
                            }
                        ?>
                        <div class="pt-5 blog-comment-wrapper">
                            <h4 class="blog-dec-title"><?php echo __('Bình luận'); ?></h4>
                        </div>
                        <div class="blog-reply-wrapper comment-wrapper mt-50">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="cvXmN2Q2"></script>
                            
                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="770" data-numposts="5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 
