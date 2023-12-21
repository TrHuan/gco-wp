<?php
/**
 * Page Default
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if (have_posts()) { ?>
                    <?php while (have_posts()) { the_post(); ?>
                        <?php do_action('submenu_page_children'); ?>
                        
                        <section class="page">
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </section>
                    <?php } ?>
                <?php } else { ?>
                    <?php
                        echo wpautop(__('Sory, no posts were found.'));
                        echo __('Sory, no posts were found.');
                    ?>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
