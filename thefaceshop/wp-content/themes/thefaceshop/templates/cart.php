<?php
/**
 * Template Name: Trang Giỏ Hàng
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-cart">
    <section class="lth-cart ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_posts module_cart">
                        <div class="module_content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
