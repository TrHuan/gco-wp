<?php
/**
 * Template Name: Page Cart / Checkout / Account
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

            <article class="lth-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="posts-box">
                                <?php do_action('submenu_page_children'); ?>
                                
                                <?php if (have_posts()) { ?>
                                    <?php while (have_posts()) { the_post(); ?>
                                        <div class="title-site">
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <?php 
                                                $description = get_field('description'); 
                                                if ($description) { 
                                            ?>
                                                <p><?php echo $description; ?></p>
                                            <?php }?>
                                        </div>

                                        <div class="content-box">
                                            <?php the_content(); ?>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php
                                        get_template_part('template-parts/content', 'none');
                                    ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

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
