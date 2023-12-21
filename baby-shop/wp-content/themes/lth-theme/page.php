<?php
/**
 * Page Default
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <div class="container">
        <div class="vk-shop__box vk-shop__box--style-1">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="vk-page__title"><?php the_title(); ?></h1>

                    <div class="vk-blog-detail__content">
                        <?php the_content(); ?>
                    </div>
                </div> <!--./col-->
            </div>
        </div> <!--./box-->
    </div>    
</main>

<?php get_footer(); ?>