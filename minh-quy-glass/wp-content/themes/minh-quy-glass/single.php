<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main-site main-page main-single main-single-blog">
    <section class="lth-single lth-single-blog">
         <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="module module_single module_single_blog"> 
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

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <aside class="lth-sidebars sticky-top" style="top: 66px">
                        <?php
                            if (is_active_sidebar('sidebar_blog')) {
                                dynamic_sidebar('sidebar_blog');
                            }
                        ?>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>

                <section class="lth-blogs">  
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <?php
                                    $other_blogs = get_field('other_blogs');
                                    if( $other_blogs ): ?>
                                    <div class="module module_blogs module_other_blogs">
                                        <div class="module_title">
                                            <?php if ($other_blogs['title']) { ?>
                                                <h2 class="title"><?php echo $other_blogs['title']; ?></h2>
                                            <?php } ?>
                                            <?php if ($other_blogs['description']) { ?>
                                                <p class="infor"><?php echo $other_blogs['description']; ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="module_content">
                                            <div class="slick-slider slick-blogs">

                                                <?php echo lth_custom_img_other_blogs('full', 330, 250);?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </section>
            <?php } 
        }
    ?>
</main>

<?php get_footer(); ?> 
