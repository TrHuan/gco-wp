<?php
/**
 * Page Default
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
            
        </div>
    </div>
</main>

<?php get_footer(); ?>
