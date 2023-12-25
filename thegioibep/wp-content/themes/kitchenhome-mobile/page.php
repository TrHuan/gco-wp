<?php
/**
 * Page Default
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page" style="background: #fff;">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <section class="page lth-page">
        <div class="container">
            <?php if (have_posts()) { ?>
                <?php while (have_posts()) { the_post(); ?>  
                    <div class="module module__header">
                        <div class="module_title">
                            <h1 class="title"><?php the_title(); ?></h1>
                        </div>
                    </div>
                    
                    <div class="module module_page">
                        <div class="module_content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <?php
                    echo wpautop(__('Sory, no posts were found.'));
                    echo __('Sory, no posts were found.');
                ?>
            <?php } ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
