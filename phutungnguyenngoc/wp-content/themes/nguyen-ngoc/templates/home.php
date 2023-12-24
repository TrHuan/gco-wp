<?php
/**
 * Template Name: Trang Chủ
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-home">
    <?php if (have_posts()) { ?>
        <?php while (have_posts()) { the_post(); ?>
                    
            <?php get_template_part('templates/addons/main', ''); ?>                

        <?php } ?>
    <?php } ?>
</main>

<?php get_footer(); ?>
