<?php
/**
 * Template Name: Page Dich Vu SEO
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */

get_header();

global $post;
$page_slug = $post->post_name;

?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb.php'); ?>

<main class="main-site main-page main-<?php echo $page_slug; ?>">
    <div class="main-container">
        <div class="main-content">

            <?php if (have_posts()) { ?>
                <?php while (have_posts()) { the_post(); ?>

                    <?php if( have_rows('main') ): ?>
                        <?php while( have_rows('main') ): the_row(); ?>
                            
                            <?php get_template_part('templates/addons/main', ''); ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php } ?>
            <?php } ?>

			
			
            <!-- <article class="lth-wpdiscuz-comments">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <?php //echo do_shortcode('[wpdiscuz_comments]') ?>
                        </div>
                    </div>
                </div>
            </article> -->

            <!-- <div class="lth-popups-reviews">
                <div class="popups-box">          
                    <div class="popups-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="popup-content">
                                        <div class="popup-box popups-reviews">
                                            <div class="title-box">
                                                <h3 class="title"><?php //echo __('Bình luận'); ?></h3>
                                                <p></p>
                                            </div>

                                            <div class="content-box">   
                                                <?php //the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div> -->
            
        </div>
    </div>
</main>

<?php get_footer(); ?>
