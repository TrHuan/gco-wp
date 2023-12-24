<?php
/**
 * Template Name: Trang Liên Hệ
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-contacts">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

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

    <section class="all-info ptb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info-wrapper">
                        <?php if( have_rows('contacts') ): ?>
                            <?php while( have_rows('contacts') ): the_row(); ?>
                                <h4 class="text-uppercase contact-title"><?php the_sub_field('title'); ?></h4>
                                <?php if( have_rows('content') ): ?>
                                    <?php while( have_rows('content') ): the_row(); ?>
                                        <?php if (get_sub_field('title')) { ?>
                                            <h5 class="text-uppercase contact-title"><?php the_sub_field('title'); ?></h5>
                                        <?php } ?>   
                                        <div class="communication-info">
                                            <?php if (get_sub_field('address')) { ?>
                                                <div class="single-communication">
                                                    <div class="communication-icon">
                                                        <i class="ti-home" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="communication-text">
                                                        <h4><?php echo __('Địa chỉ:'); ?></h4>
                                                        <p><?php the_sub_field('address'); ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (get_sub_field('phone') || get_sub_field('phone_2')) { ?>
                                                <div class="single-communication">
                                                    <div class="communication-icon">
                                                        <i class="ti-mobile" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="communication-text">
                                                        <h4><?php echo __('Điện thoại:'); ?></h4>
                                                        <p><a href="tel:<?php the_sub_field('phone'); ?>" title=""><?php the_sub_field('phone'); ?></a> - <a href="tel:<?php the_sub_field('phone_2'); ?>" title=""><?php the_sub_field('phone_2'); ?></a></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (get_sub_field('email')) { ?>
                                                <div class="single-communication">
                                                    <div class="communication-icon">
                                                        <i class="ti-email" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="communication-text">
                                                        <h4><?php echo __('Email:'); ?></h4>
                                                        <p><a href="mailto:<?php the_sub_field('email'); ?>" title=""><?php the_sub_field('email'); ?></a></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if( have_rows('contact_form_7') ): ?>
                        <?php while( have_rows('contact_form_7') ): the_row(); ?>
                            <div class="contact-message-wrapper">
                                <h4 class="text-uppercase contact-title"><?php the_sub_field('title'); ?></h4>
                                <div class="contact-message">
                                    <?php echo do_shortcode(get_sub_field('content')); ?> 
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
