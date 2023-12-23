<?php
/**
 * Template Name: Trang Liên Hệ
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-contact">
    <article class="lth-contacts">
        <div class="container">
            <div class="row">
                <?php if (get_field('google_map_contact', 'option')) { ?>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="module module_map">
                            <div class="google-maps">
                                <?php the_field('google_map_contact', 'option'); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <?php $contact_form_7 = get_field('contact_form_7', 'option');
                        if ($contact_form_7) :
                    ?>
                        <div class="module module_contacts">
                            <div class="module_title">
                                <h2 class="title"><?php echo $contact_form_7['title']; ?></h2>
                                <p class="infor"><?php echo $contact_form_7['description']; ?></p>
                            </div>

                            <?php echo do_shortcode($contact_form_7['content']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="module module_address"> 
                        <?php if( have_rows('contacts', 'option') ): ?>
                            <?php while( have_rows('contacts', 'option') ): the_row(); ?>
                                <?php if (get_sub_field('title') || get_sub_field('description')) { ?>
                                <div class="module_title" style="text-align: left;">
                                    <h2 class="title"><?php the_sub_field('title'); ?></h2>
                                    <p class="infor"><?php the_sub_field('description'); ?></p>
                                </div>    
                                <?php } ?>                    
                                <div class="module_content">
                                    <?php if( have_rows('content') ): ?>
                                        <?php while( have_rows('content') ): the_row(); ?>
                                        <h3><?php the_sub_field('title'); ?></h3>

                                        <div class="content">
                                            <ul>
                                                <li>
                                                    <i class="icofont-google-map icon"></i>
                                                    <?php echo __('Địa chỉ: '); ?><?php the_sub_field('address'); ?>
                                                </li>
                                                <li>
                                                    <a href="tel: <?php the_sub_field('phone'); ?>" title="<?php the_sub_field('phone'); ?>">
                                                        <i class="icofont-ui-call icon"></i>
                                                        <?php echo __('Hotline: '); ?><?php the_sub_field('phone'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="mailto: <?php the_sub_field('email'); ?>" title="<?php the_sub_field('email'); ?>">
                                                        <i class="icofont-envelope icon"></i>
                                                        <?php echo __('Email: '); ?><?php the_sub_field('email'); ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>                      
                </div>
            </div>
        </div>
    </article>
</main>

<?php get_footer(); ?>
