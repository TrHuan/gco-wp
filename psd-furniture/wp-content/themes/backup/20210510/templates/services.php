<?php
/**
 * Template Name: Page Services
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-categories.php'); ?>

<main class="main-site main-page main-services">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-projects">
                <div class="container-fuild">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module__projects module__projects__list module__banners">
                                <div class="module__content">
                                    <?php 
                                        $terms = get_terms( array(
                                            'taxonomy' => 'service_cat',
                                            'hide_empty' => false,
                                        ) );

                                        $i;

                                        foreach($terms as $cat) { $i++; ?>

                                            <div class="item lth-banners <?php if ($i%2!=0) { ?>style-06<?php } else { ?>style-07<?php } ?>">
                                                <div class="content-box groups-box">
                                                    <?php
                                                        $image = get_field('image', $cat);
                                                        if ($image) {
                                                    ?>
                                                        <div class="content-image">
                                                            <div class="image">
                                                                <a href="<?php echo get_category_link( $cat->term_id ) ?>" title="">
                                                                    <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="792" height="530">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="content">
                                                        <h4 class="content-name"> 
                                                            <a href="<?php echo get_category_link( $cat->term_id ) ?>" title="<?php echo $cat->name; ?>">
                                                                <?php echo $cat->name; ?>
                                                            </a>  
                                                        </h4>
                                                        <div class="content-excerpt">
                                                            <?php echo $cat->description; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module__content">
                                <?php require_once(LIBS_DIR . '/paginations/pagination.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>   
            </article>

            <article class="lth-contacts">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module__contacts">
                                <div class="module__header title-box">
                                    <h3 class="title"><?php echo __('Liên hệ với chúng tôi'); ?></h3>
                                </div>
                                <div class="module__content">
                                    <?php echo do_shortcode('[contact-form-7 id="656" title="Liên hệ với chúng tôi"]') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>     
    </div>
</main>

<?php get_footer(); ?>
