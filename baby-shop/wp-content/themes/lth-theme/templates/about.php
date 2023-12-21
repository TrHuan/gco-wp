<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

     <div class="container">
        <div class="vk-shop__box vk-shop__box--style-1">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="vk-page__title"><?php the_title(); ?></h1>

                    <div class="vk-blog-detail__content">
                        <?php the_content(); ?>
                    </div>
                </div> <!--./col-->

                <div class="col-lg-3 pt-5 pt-lg-0">
                    <?php if (is_active_sidebar('sidebar_about')) {
                        dynamic_sidebar('sidebar_about');
                    } ?>
                </div>
            </div>
        </div> <!--./box-->

        <?php if (is_active_sidebar('sidebar_blocks_categories')) {
            dynamic_sidebar('sidebar_blocks_categories');
        } ?>
    </div>    
</main>

<?php get_footer(); ?>
