<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <div class="container">
        <div class="vk-shop__box vk-shop__box--style-1 pt-5 pb-5">
            <h1 class="vk-page__title mb-4">
                <?php
                    if (is_category()) {
                        single_cat_title();  //Category
                    } elseif (is_author()) {
                        the_post();
                        echo ('Archives by author: ' . get_the_author());  //Tác giả
                        rewind_posts();
                    } else {
                        echo _('Archives');
                    }
                ?>
            </h1>
            <?php if (have_posts()) { ?>
                <div class="row vk-blog__list">
                    <?php while ($wp_query->have_posts()) {
                        $wp_query-> the_post(); ?>
                        <div class="col-sm-6  col-lg-4 _item">
                            <?php get_template_part('template-parts/post/content', 'list'); ?>
                        </div>
                    <?php } ?>                   
                </div>
        
                <?php require_once(LIBS_DIR . '/pagination.php'); ?>
            <?php } ?>
        </div>
    </div>            
</main>

<?php get_footer(); ?>
