<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<style type="text/css">
    .about-content p {
        padding-bottom: 25px;
    }
    .about-content img {
        margin: 15px auto;
    }
    .about-sum {
        padding-bottom: 30px;
    }
    .about-item h2 {
        padding: 15px 0px 10px;
    }
    .about-sum p, .about-item-content p {
        text-align: center;
    }
</style>

<main class="main main-page main-abouts">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <section class="">
        <div class=" container">
            <?php if( have_rows('vision') ): ?>  
                <?php while( have_rows('vision') ): the_row(); ?>
                    <h3 class="lg-w-60 m-auto pt-3 pb-4 text-center"><?php the_sub_field('content'); ?></h3>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if( have_rows('value') ): ?>  
                <?php while( have_rows('value') ): the_row(); ?>
                    <h1 class="s18 text-center pb-3 medium"><?php the_sub_field('title'); ?><</h1>
                    <div class="about-sum">
                        <?php the_sub_field('content'); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

            <div class="row">
                <?php if( have_rows('unite') ): ?>  
                    <?php while( have_rows('unite') ): the_row(); ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="text-center about-item">
                                <div class="about-item-img">
                                    <img src="<?php the_sub_field('image'); ?>" title="" alt="">
                                </div>
                                
                                <h2 class="medium"><?php the_sub_field('title'); ?></h2>
                                <div class="about-item-content">
                                    <?php the_sub_field('content'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if( have_rows('spirit') ): ?>  
                    <?php while( have_rows('spirit') ): the_row(); ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="text-center about-item">
                                <div class="about-item-img">
                                    <img src="<?php the_sub_field('image'); ?>" title="" alt="">
                                </div>
                                
                                <h2 class="medium"><?php the_sub_field('title'); ?></h2>
                                <div class="about-item-content">
                                    <?php the_sub_field('content'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if( have_rows('enthusiasm') ): ?>  
                    <?php while( have_rows('enthusiasm') ): the_row(); ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="text-center about-item">
                                <div class="about-item-img">
                                    <img src="<?php the_sub_field('image'); ?>" title="" alt="">
                                </div>
                                
                                <h2 class="medium"><?php the_sub_field('title'); ?></h2>
                                <div class="about-item-content">
                                    <?php the_sub_field('content'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <?php if( have_rows('introduce') ): ?>  
                <?php while( have_rows('introduce') ): the_row(); ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="about-content">
                                <div class="text-center">
                                    <img src="<?php the_sub_field('image'); ?>" title="" alt="">
                                </div>

                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
