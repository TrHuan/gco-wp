<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-abouts">
    <?php if( have_rows('introduce') ): ?>
        <?php while( have_rows('introduce') ): the_row(); ?>
            <section class="lth-abouts skill-area white-bg ptb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-content mb-all-40">
                               <!-- Section Title Start -->
                                <div class="section-title section-heading">
                                    <h1><?php the_sub_field('title'); ?></h1>
                                </div>
                                <!-- Section Title End -->
                                <?php the_sub_field('describe'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="skill-content">
                                <div class="skill">
                                    <?php if( have_rows('content') ): ?>
                                        <?php while( have_rows('content') ): the_row(); ?>
                                            <div class="progress">
                                                <div class="lead"><?php the_sub_field('title'); ?></div>
                                                <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?php the_sub_field('evaluate'); ?>; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="<?php the_sub_field('evaluate'); ?>" class="progress-bar wow fadeInLeft animated"><span><?php the_sub_field('evaluate'); ?></span></div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if( have_rows('member') ): ?>
        <?php while( have_rows('member') ): the_row(); ?>
            <!-- Our Team Star Here -->
            <div class="our-team ptb-80">
                <div class="container">
                  <div class="section-title default-title">
                      <h2><?php the_sub_field('title'); ?></h2>
                  </div>
                    <div class="row text-center">
                        <?php if( have_rows('content') ): ?>
                            <?php while( have_rows('content') ): the_row(); ?>
                                <!-- Single Team Start Here -->
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="single-team mb-all-30">
                                        <div class="team-img sidebar-img sidebar-banner">
                                            <a href="#"><img src="<?php the_sub_field('avata'); ?>" alt="team-image"></a>
                                            <div class="team-link">
                                                <ul>
                                                    <li><a href="<?php the_sub_field('facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="<?php the_sub_field('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="<?php the_sub_field('google_plus'); ?>"><i class="fa fa-google-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="team-info">
                                            <h4><?php the_sub_field('name'); ?></h4>
                                            <p><?php the_sub_field('skill'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Team End Here -->
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Our Team End Here -->
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if( have_rows('brands', 'options') ): ?>
        <section class="lth-brands">
            <div class="container">                   
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php get_template_part('templates/addons/brands', ''); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

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
