<?php
/**
 * Template Name: Trang Liên Hệ
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<style type="text/css">
    .content-tit {
        padding: 10px 0 25px;
    }
    .contact-map iframe {
        width: 100%;
    }
    .contact-frm {
        padding: 35px 0 50px;
    }
    .contact-frm-tit {
        padding-bottom: 35px;
    }
    .contact-frm label {
        padding-bottom: 15px;
    }
    .contact-frm input, .contact-frm textarea {
        border-radius: 3px;
        border:0;
        background: #f1f1f1;
    }
    .contact-frm .row > div[class*='col'] > input, .contact-frm textarea {
        margin-bottom: 20px;
    }
    .contact-frm input {
        height: 40px;
    }
    .contact-add-item {
        padding: 20px 0 0;
    }
    .contact-add-item:not(:last-of-type):after {
        content: '';
        display: inline-block;
        width: 60px;
        height: 4px;
        background: #81429b;
    }
</style>

<main class="main-page main-contacts">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <div class="container">
        <div class="">
            <div class="">
                <div class="contact-map">
                    <?php the_field('google_map', 'option') ?>
                </div>

                <div class="row">
                    <?php if( have_rows('contact_form_7') ): ?>  
                        <?php while( have_rows('contact_form_7') ): the_row(); ?>
                            <div class="col-md-6">
                                <h2 class="s18 medium contact-frm-tit"><?php the_sub_field('title'); ?></h2>
                                <?php echo do_shortcode(get_sub_field('content')); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if( have_rows('contacts') ): ?>  
                        <?php while( have_rows('contacts') ): the_row(); ?>
                            <div class="col-md-6">
                                <div class="text-lg-left text-center pt-4 pb-3"><img src="<?php the_sub_field('image'); ?>" title="" alt=""></div>
                                <h3><?php the_sub_field('title'); ?></h3>

                                <?php if( have_rows('content') ): ?>  
                                <div class="contact-add">
                                    <?php while( have_rows('content') ): the_row(); ?>
                                    <div class="contact-add-item">
                                        <h2 class="medium pb-3"><?php the_sub_field('title'); ?></h2>
                                        <ul class="list-unstyled s15 ft-add">
                                            <li><i class="fas fa-map-marker-alt"></i> <?php the_sub_field('address'); ?></li>
                                            <li><i class="fas fa-phone"></i> <?php echo __('Điện thoại:'); ?> <a href="tel:<?php the_sub_field('phone'); ?>" title=""><?php the_sub_field('phone'); ?></a></li>
                                        </ul>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
