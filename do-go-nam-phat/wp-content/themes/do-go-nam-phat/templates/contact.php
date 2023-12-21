<?php
/**
 * Template Name: Trang Liên Hệ
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-contacts">
    <section class="lth-address">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_address"> 
                        <?php if( have_rows('contacts') ): ?>
                            <?php while( have_rows('contacts') ): the_row(); ?>
                                <div class="module_title">
                                    <h1 class="title"><?php the_sub_field('title'); ?></h1>
                                </div>

                                <div class="module_content">
                                    <?php if( have_rows('content') ): ?>
                                        <?php while( have_rows('content') ): the_row(); ?>
                                            <ul class="groups-box">
                                                <?php if (get_sub_field('address')) { ?>
                                                    <li>
                                                        <div class="image">
                                                            <img src="<?php echo ASSETS_URI; ?>/images/icon-01.png" alt="Icon">
                                                        </div>
                                                        <?php the_sub_field('address'); ?>
                                                    </li>
                                                <?php } ?>
                                                <?php if (get_sub_field('email')) { ?>
                                                    <li>
                                                        <div class="image">
                                                            <img src="<?php echo ASSETS_URI; ?>/images/icon-02.png" alt="Icon">
                                                        </div>
                                                        <a href="mailto:<?php the_sub_field('email'); ?>" title=""><?php the_sub_field('email'); ?></a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (get_sub_field('phone')) { ?>
                                                    <li>
                                                        <div class="image">
                                                            <img src="<?php echo ASSETS_URI; ?>/images/icon-03.png" alt="Icon">
                                                        </div>
                                                        <a href="tel:<?php the_sub_field('phone'); ?>" title=""><?php the_sub_field('phone'); ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lth-map">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_map"> 
                        <div class="module_content">
                            <?php the_field('google_map', 'option'); ?>
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
