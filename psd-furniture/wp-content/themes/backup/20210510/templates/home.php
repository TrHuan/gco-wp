<?php
/**
 * Template Name: Page Home
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>
<?php get_header(); ?>

<div class="lth-breadcrumbs d-none">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="breadcrumbs-content">
                    <div class="title-box">
                        <h1 class="title">
                            <?php the_title(); ?>  
                        </h1>
                        <h2 class="title">
                            <?php the_title(); ?>  
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="main-site main-home">
    <div class="main-container">
        <div class="main-content">

            <?php if (have_posts()) { ?>
                <?php while (have_posts()) { the_post(); ?>

                    <?php if( have_rows('main') ): ?>
                        <?php $i = 0; ?>

                        <?php while( have_rows('main') ): the_row(); ?>

                            <?php $i++; ?>
                            
                            <?php get_template_part('templates/addons/main', ''); ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php } ?>
            <?php } ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>