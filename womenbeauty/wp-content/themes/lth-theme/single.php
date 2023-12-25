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

    <div class="blog-details-area white-bg ptb-90">
        <div class="container">
            <div class="row">
                <!-- Blog Details Start -->
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-details mb-all-40">
                        <div class="blog-hero-img mb-40">
                            <img src="<?php echo lth_custom_img('full', 890, 350);?>" width="890" height="350" alt="<?php the_title(); ?>">
                            <div class="entry-meta">
                                <div class="date">
                                    <p><?php the_time('d'); ?></p>
                                    <span><?php the_time('m'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="text-upper-portion">
                            <h3 class="blog-dtl-header portfolio-header"><?php the_title(); ?></h3>
                            <ul class="meta-box meta-blog d-flex">
                                <li class="meta-date"><span><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('m d, Y'); ?></span></li>
                                <li><i class="fa fa-user" aria-hidden="true"></i>By <a href="#"> makali</a></li>
                            </ul>
                        </div>

                        <?php the_content(); ?>

                        <div class="comments-area ptb-90">
                           <h3 class="sidebar-header">Bình luận</h3>

                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=636475073366509&autoLogAppEvents=1';
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="2" data-width="100%"></div>
                        </div>
                        <!-- Comment Area End -->

                    </div>
                </div>
                <!-- Blog Details End -->
                <!-- Blog Sidebar Start -->
                <div class="col-xl-3 col-lg-4">
                    <div class="blog-sidebar right-sidebar mt-all-80">
                        <?php
                            if (is_active_sidebar('sidebar_single_blog')) {
                                dynamic_sidebar('sidebar_single_blog');
                            }
                        ?>
                    </div>
                </div>
                <!-- Blog Sidebar End -->
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?> 
