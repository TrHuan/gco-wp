<?php
/**
 * Template Name: Liên hệ
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-page main-contact">
    <?php //require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <h1 class="title d-none"><?php the_title(); ?></h1>
    
    <?php the_content(); ?>
</main>

<?php get_footer(); ?>
