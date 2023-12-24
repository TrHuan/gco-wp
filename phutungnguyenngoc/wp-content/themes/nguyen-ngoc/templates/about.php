<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-abouts">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <?php if( have_rows('banner') ): ?> 
        <?php while( have_rows('banner') ): the_row(); ?>
            <div class="about-us-area pt-125 pb-125">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="overview-content">
                                <?php
                                    $title = get_sub_field('title');
                                    $text_1 = $title['text_1'];
                                    $text_2 = $title['text_2'];
                                    $title_2 = get_sub_field('title_2');
                                    $text_3 = get_sub_field('text_3');
                                    $hotline = get_sub_field('hotline');
                                    $image = get_sub_field('image');
                                ?>
                                <h1><span><?php echo $text_1; ?></span> <?php echo $text_2; ?> </h1>
                                <h2><?php echo $title_2; ?></h2>
                                <p><?php echo $text_3; ?></p>
                                <div class="question-area">
                                    <h4><?php echo __('Liên hệ hotline?'); ?></h4>
                                    <div class="question-contact">
                                        <div class="question-icon">
                                            <i class="icofont icofont-phone"></i>
                                        </div>
                                        <div class="question-content-number">
                                            <h6> <a href="tel:<?php echo $hotline; ?>" title=""><?php echo $hotline; ?></a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="overview-img">
                                <img class="tilter" src="<?php echo $image; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if( have_rows('services') ): ?> 
        <div class="services-area pb-100">
            <div class="container">
                <div class="row">
                    <?php while( have_rows('services') ): the_row(); ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-services orange mb-30 text-center">
                                <div class="services-icon">
                                    <img alt="" src="<?php the_sub_field('icon'); ?>">
                                </div>
                                <div class="services-text">
                                    <h5 class="text-uppercase"><?php the_sub_field('title'); ?></h5>
                                    <p><?php the_sub_field('description'); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if( have_rows('testimonials') ): ?>
        <?php while( have_rows('testimonials') ): the_row(); ?>
            <div class="testimonial-area">
                <div class="container">
                    <div class="section-title-2 section-title-position">
                        <h2 class="text-uppercase"><?php the_sub_field('title'); ?></h2>
                    </div>
                    <?php if( have_rows('content') ): ?>
                        <div class="testimonial-active owl-carousel">
                            <?php while( have_rows('content') ): the_row(); ?>
                                <div class="single-testimonial">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="testimonial-img pl-75">
                                                <img alt="image" src="<?php the_sub_field('image'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="testimonial-content">
                                                <div class="testimonial-dec">
                                                    <p><?php the_sub_field('evaluate'); ?></p>
                                                </div>
                                                <div class="name-designation">
                                                    <h4><?php the_sub_field('name'); ?></h4>
                                                    <span><?php the_sub_field('description'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if( have_rows('teams') ): ?>
        <?php while( have_rows('teams') ): the_row(); ?>
            <div class="team-area pt-120 pb-95">
                <div class="container">
                    <div class="section-title text-center mb-60">
                        <h2 class="text-uppercase"><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('description'); ?></p>
                    </div>
                    <div class="row">
                        <?php if( have_rows('team') ): ?>
                            <?php while( have_rows('team') ): the_row(); ?>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <div class="team-wrapper mb-30">
                                        <div class="team-img">
                                            <img src="<?php the_sub_field('image'); ?>" alt="">
                                        </div>
                                        <div class="team-content">
                                            <h4><?php the_sub_field('text_1'); ?></h4>
                                            <span><?php the_sub_field('text_2'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
