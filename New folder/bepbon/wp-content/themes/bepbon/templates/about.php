<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-page-about">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <?php the_content(); ?>
</main>

<?php get_footer(); ?>
