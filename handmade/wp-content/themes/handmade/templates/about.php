<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-abouts">
    <section class="lth-abouts">
        <div class="container">
            <div class="row">
                <?php if( have_rows('introduce') ): ?>
                    <?php while( have_rows('introduce') ): the_row(); ?>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="module module_abouts"> 
                                <div class="module_content">
                                    <h1 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h1>
                                    <div class="content">
                                        <?php the_sub_field('content'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="module module_abouts"> 
                                <div class="module_image">
                                    <?php if (get_sub_field('image')) { ?>
                                        <div class="image">
                                            <img src="<?php the_sub_field('image'); ?>" alt="Banner" width="1920" height="1080">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="lth-vision-mission">
        <div class="container">
            <div class="row">
                <?php if( have_rows('vision_mission') ): ?>
                    <?php while( have_rows('vision_mission') ): the_row(); ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module_vision_mission"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <?php if( have_rows('vision') ): ?>
                            <?php while( have_rows('vision') ): the_row(); ?>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="module module_vision"> 
                                        <div class="module_content">
                                            <h2 class="title">
                                                <?php the_sub_field('title'); ?>
                                            </h2>
                                            <div class="content">
                                                <?php the_sub_field('content'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <?php if( have_rows('mission') ): ?>
                            <?php while( have_rows('mission') ): the_row(); ?>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="module module_mission"> 
                                        <div class="module_content">
                                            <h2 class="title">
                                                <?php the_sub_field('title'); ?>
                                            </h2>
                                            <div class="content">
                                                <?php the_sub_field('content'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="lth-achievements">
        <div class="container">
            <div class="row">
                <?php if( have_rows('group_achievements') ): ?>
                    <?php while( have_rows('group_achievements') ): the_row(); ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module_achievements"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <?php if( have_rows('achievements') ): ?>
                                <div class="module_content">
                                    <div class="slick-slider slick-achievements">
                                         <?php $i; while( have_rows('achievements') ): the_row(); ?>

                                            <div class="item item-<?php echo $i; ?>">
                                                <div class="content">
                                                    <?php if (get_sub_field('image')) { ?>
                                                        <div class="content-image">
                                                            <div class="image">
                                                                <img src="<?php the_sub_field('image'); ?>" alt="Achievement" width="291" height="390">
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <?php if (get_sub_field('title')) { ?>
                                                        <div class="content-box">
                                                            <h3><?php the_sub_field('title'); ?></h3>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="lth-teams">
        <div class="container">
            <div class="row">
                <?php if( have_rows('group_teams') ): ?>
                    <?php while( have_rows('group_teams') ): the_row(); ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module_teams"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <?php if( have_rows('teams') ): ?>
                                <div class="module_content">
                                    <div class="slick-slider slick-teams">
                                         <?php $i; while( have_rows('teams') ): the_row(); ?>

                                            <div class="item item-<?php echo $i; ?>">
                                                <div class="content">
                                                    <?php if (get_sub_field('image')) { ?>
                                                        <div class="content-image">
                                                            <div class="image">
                                                                <img src="<?php the_sub_field('image'); ?>" alt="Team" width="300" height="300">
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <?php if (get_sub_field('name') || get_sub_field('job')) { ?>
                                                        <div class="content-box">
                                                            <p><?php the_sub_field('job'); ?></p>
                                                            <h3><?php the_sub_field('name'); ?></h3>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="lth-videos">
        <div class="container">
            <div class="row">
                <?php if( have_rows('group_videos') ): ?>
                    <?php while( have_rows('group_videos') ): the_row(); ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module_videos"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <?php if( have_rows('videos') ): ?>
                                <div class="module_content">
                                    <div class="groups-box">
                                         <?php $i; while( have_rows('videos') ): the_row(); ?>

                                            <div class="item item">
                                                <div class="content">
                                                    <?php if (get_sub_field('image')) { ?>
                                                        <div class="content-image">
                                                            <div class="image">
                                                                <img src="<?php the_sub_field('image'); ?>" alt="Team" width="370" height="255">

                                                                <a class="icon-play" href="#">
                                                                    <i class="icofont-ui-play"></i>
                                                                </a>

                                                                <?php the_sub_field('vd_content'); ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <?php if (get_sub_field('title')) { ?>
                                                        <div class="content-box">
                                                            <h3><?php the_sub_field('title'); ?></h3>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- <div class="module_videos_popup"> -->
                                <div class="slider_videos_popup">
                                    <a href="#" title="" class="video-close">
                                        <i class="icofont-close"></i>
                                    </a>

                                    <?php if( have_rows('videos') ): ?>
                                    <div class="module_content">
                                        <div class="popups-content-f">
                                            <div class="popups-content">
                                                <div class="slick-slider slick-videos-popup">
                                                     <?php $i; while( have_rows('videos') ): the_row(); $i++; ?>

                                                        <div class="item item-<?php echo $i; ?>">
                                                            <div class="content">
                                                                <?php if (get_sub_field('image')) { ?>
                                                                    <div class="content-image">
                                                                        <div class="image" data_src="">
                                                                            <img src="<?php the_sub_field('image'); ?>" alt="Team" width="370" height="255">

                                                                            <!-- <a class="icon-play" href="#">
                                                                                <i class="icofont-ui-play"></i>
                                                                            </a> -->

                                                                            <?php the_sub_field('vd_content'); ?>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>

                                                                <?php if (get_sub_field('title')) { ?>
                                                                    <div class="content-box">
                                                                        <h3><?php the_sub_field('title'); ?></h3>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
