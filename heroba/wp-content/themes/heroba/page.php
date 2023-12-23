<?php
/**
 * Page Default
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page">
    <?php //require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <?php the_content(); ?>
</main>

<?php get_footer(); ?>
