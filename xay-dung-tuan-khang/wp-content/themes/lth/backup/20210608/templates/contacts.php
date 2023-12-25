<?php
/**
 * Template Name: Page Contacts
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>
<main class="main main-page main-contacts">
    <section class="lth-contacts">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_contacts"> 
                        <?php
                            $thong_tin_lien_he = get_field('thong_tin_lien_he', 'option');

                            if ($thong_tin_lien_he) { 
                        ?>
                            <div class="sec-title text-center">
                                <h2><?php echo $thong_tin_lien_he['title']; ?></h2>
                                <p><?php echo $thong_tin_lien_he['description']; ?></p>
                            </div>
                        <?php } ?>

                        <div class="module_content">
                            <article class="address-box">
                                <?php if( have_rows('thong_tin_lien_he', 'option') ): ?>
                                    <?php while( have_rows('thong_tin_lien_he', 'option') ): the_row(); ?>

                                        <div class="content">
                                            <div class="img-holder">
                                                <img src="<?php the_sub_field('image'); ?>" alt="Awesome Image">
                                            </div>
                                            <?php if( have_rows('content') ): ?>
                                                <?php while( have_rows('content') ): the_row(); ?>
                                                    <div class="contact-info">
                                                        <div class="row">
                                                            <!--Start single item-->
                                                            <div class="col-sm-6">
                                                                <div class="single-item">
                                                                    <div class="icon-holder">
                                                                        <span class="flaticon-building"></span>
                                                                    </div>
                                                                    <div class="text-holder">
                                                                        <h5><?php echo __('Địa chỉ:'); ?></h5>
                                                                        <p><?php the_sub_field('address'); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--End single item-->
                                                            <!--Start single item-->
                                                            <div class="col-sm-6">
                                                                <div class="single-item">
                                                                    <div class="icon-holder">
                                                                        <span class="flaticon-technology"></span>
                                                                    </div>
                                                                    <div class="text-holder">
                                                                        <h5><?php echo __('Số điện thoại:'); ?></h5>
                                                                        <p><?php the_sub_field('phone'); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--End single item-->
                                                            <!--Start single item-->
                                                            <div class="col-sm-6">
                                                                <div class="single-item">
                                                                    <div class="icon-holder">
                                                                        <span class="flaticon-new-email-outline"></span>
                                                                    </div>
                                                                    <div class="text-holder">
                                                                        <h5><?php echo __('Email:'); ?></h5>
                                                                        <p><?php the_sub_field('email'); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--End single item-->
                                                            <!--Start single item-->
                                                            <div class="col-sm-6">
                                                                <div class="single-item">
                                                                    <div class="icon-holder">
                                                                        <span class="flaticon-clock"></span>
                                                                    </div>
                                                                    <div class="text-holder">
                                                                        <h5><?php echo __('Giờ làm việc:'); ?></h5>
                                                                        <p><?php the_sub_field('working_hours'); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--End single item-->
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>

                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </article>

                            <article class="contacts-box">
                                <div class="content">
                                    <?php if( have_rows('contact_form_7', 'option') ): ?>
                                        <?php while( have_rows('contact_form_7', 'option') ): the_row(); ?>

                                            <?php echo do_shortcode(get_sub_field('content')); ?>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lth-maps">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_maps">
                        <?php
                            $map = get_field('googlemap', 'option');
                            if ($map == 'yes') {
                                the_field('google_map', 'option');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>