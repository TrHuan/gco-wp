<?php
/**
 * Template Name: Trang Liên Hệ
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-contact">
    <!-- Google Map Start -->
    <div class="goole-map">
        <?php echo get_field('google_map', 'options') ?>
    </div>
    <!-- Google Map End -->

    <!-- Regester Page Start Here -->
    <?php if( have_rows('contact_form_7') ): ?>
        <?php while( have_rows('contact_form_7') ): the_row(); ?>
            <div class="register-area white-bg ptb-80">
                <div class="container">
                <h3 class="login-header"><?php the_sub_field('title'); ?></h3>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="register-contact  clearfix contact-form">
                                <?php echo do_shortcode(get_sub_field('content')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <!-- Register Page End Here -->

    <?php if( have_rows('contacts', 'options') ): ?>
        <section class="lth-contacts">
            <div class="container">                   
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php get_template_part('templates/addons/contact', ''); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( have_rows('features', 'options') ): ?>
        <section class="lth-features">
            <div class="container">                   
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php get_template_part('templates/addons/features', ''); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
