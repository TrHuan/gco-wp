<?php
/**
 * Template Name: Trang Liên Hệ
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-contacts">
    <section class="lth-page-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_banner"> 
                        <div class="module_content">
                            <?php if( have_rows('contact_banner') ): ?>
                                <?php while( have_rows('contact_banner') ): the_row(); ?>
                                    <div class="banner-image">
                                        <div class="image">
                                            <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">

                                            <h1><?php the_sub_field('title'); ?></h1>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lth-contacts">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_contacts"> 
                        <div class="module_content">
                            <?php if( have_rows('contact_form_7') ): ?>
                            <?php while( have_rows('contact_form_7') ): the_row(); ?>
                                <div class="module_title">
                                    <h2 class="title"><?php the_sub_field('title'); ?></h2>
                                </div>

                                <div class="module_content">
                                    <?php echo do_shortcode(get_sub_field('content')); ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
