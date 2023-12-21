<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-abouts">
    <?php if( have_rows('shareholder') ): ?>
        <section class="lth-shareholder">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php while( have_rows('shareholder') ): the_row(); ?>
                            <div class="module module_shareholder"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <div class="module_content">
                                    <div class="slick-slider slick-shareholder">

                                        <?php
                                            if( have_rows('content') ): $i;
                                                while( have_rows('content') ) : the_row(); $i++;
                                                    $name = get_sub_field('name');
                                                    $position = get_sub_field('position');
                                                    $describe = get_sub_field('describe');
                                                    $avata = get_sub_field('avata');
                                                ?>

                                                <div class="item item-<?php echo $i; ?>">
                                                    <div class="content">
                                                        <?php if ($name || $position || $describe) { ?>
                                                            <div class="content-box">
                                                                <?php if ($name) { ?>
                                                                    <h4 class="name"><?php echo $name; ?></h4>
                                                                <?php } ?>

                                                                <?php if ($position) { ?>
                                                                    <p class="position"><?php echo $position; ?></p>
                                                                <?php } ?>

                                                                <?php if ($describe) { ?>
                                                                    <p class="describe"><?php echo $describe; ?></p>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>

                                                        <div class="content-image">
                                                            <div class="image">
                                                                <img src="<?php echo $avata; ?>" alt="<?php echo $name; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php endwhile;
                                            endif;
                                        ?>

                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( have_rows('formation_process') ): ?>
        <section class="lth-formation-process">
            <div class="container">
                <div class="row">
                    <?php while( have_rows('formation_process') ): the_row(); ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module_title">
                                <h2 class="title">
                                    <?php the_sub_field('title'); ?>
                                </h2>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                            <?php if( have_rows('process') ): ?>
                                <div class="module module_formation_process"> 
                                    <div class="module_content">
                                        <ul>
                                            <?php while( have_rows('process') ): the_row(); ?>
                                            <li>
                                                <div class="content">
                                                    <p class="nam">
                                                        <?php the_sub_field('nam'); ?>
                                                    </p>

                                                    <h3 class="title">
                                                        <?php the_sub_field('title'); ?>
                                                    </h3>

                                                    <p class="describe">
                                                        <?php the_sub_field('describe'); ?>
                                                    </p>
                                                </div>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                            <?php 
                                $images = get_sub_field('formation_process_image'); $j;
                                if( $images ): ?>
                                    <div class="module module_formation_process_image">
                                        <ul class="slick-slider slick-formation-process-image">
                                            <?php foreach( $images as $image ): $j++ ?>
                                                <li>
                                                    <img src="<?php echo $image; ?>" alt="Image"/>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( have_rows('achievements') ): ?>
        <section class="lth-achievements">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php while( have_rows('achievements') ): the_row(); ?>
                            <div class="module module_achievements"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <div class="module_content">
                                    <div class="slick-slider slick-achievements">

                                        <?php
                                            if( have_rows('content') ): $i;
                                                while( have_rows('content') ) : the_row(); $i++;
                                                    $icon_image = get_sub_field('icon_image');
                                                    $numbers = get_sub_field('numbers');
                                                    $title = get_sub_field('title');
                                                ?>

                                                <div class="item item-<?php echo $i; ?>">
                                                    <div class="content">
                                                        <div class="content-image">
                                                            <div class="image">
                                                                <img src="<?php echo $icon_image; ?>" alt="Image">
                                                            </div>
                                                        </div>

                                                        <?php if ($numbers || $position) { ?>
                                                            <div class="content-box">
                                                                <?php if ($numbers) { ?>
                                                                    <p class="numbers"><?php echo $numbers; ?></p>
                                                                <?php } ?>

                                                                <?php if ($title) { ?>
                                                                    <p class="title"><?php echo $title; ?></p>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                <?php endwhile;
                                            endif;
                                        ?>

                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( have_rows('vision_and_mission') ): ?>
        <section class="lth-vision-mission">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php while( have_rows('vision_and_mission') ): the_row(); ?>
                            <div class="module module_vision_mission"> 
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <div class="module_content">
                                    <?php if( have_rows('contents') ): ?>
                                        <?php while( have_rows('contents') ): the_row(); ?>
                                            <h3><?php the_sub_field('title'); ?></h3>

                                            <?php the_sub_field('content'); ?>
                                        <?php endwhile; ?> 
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
