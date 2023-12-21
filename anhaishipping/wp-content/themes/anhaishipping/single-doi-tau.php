<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-single">
    <section class="lth-fleet-single">
         <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <aside class="sidebars">
                        <div class="sticky-top">
                            <?php
                                if (is_active_sidebar('sidebar_single_doi_tau')) {
                                    dynamic_sidebar('sidebar_single_doi_tau');
                                }
                            ?>
                        </div>
                    </aside>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="module module_single fleet-single"> 
                        <div class="module_content">
                            <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        get_template_part('template-parts/doi-tau/content', 'single');
                                    }
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popup-album-image-fleet">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="popup-bg"></div>

                    <div class="popup-close">
                        <a href="#" class="close" data_popup="album-image-fleet">
                            <i class="icofont-close"></i>
                        </a>
                    </div>

                    <div class="module module_album_image_fleet">
                        <div class="module_content">
                            <div class="slick-slider slick-album-image-fleet">
                                <?php 
                                $images = get_field('album_image_fleet');
                                if( $images ):
                                    foreach( $images as $image ): ?>
                                        <div class="item">
                                            <img src="<?php echo $image; ?>" alt="Image">
                                        </div>
                                    <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 
