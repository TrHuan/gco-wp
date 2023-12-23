<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main-site main-page main-single main-single-quote">
    <section class="lth-single lth-single-quote">
         <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_single module_single_quote"> 
                        <?php
                            if (have_posts()) {
                                while (have_posts()) {
                                    the_post();
                                    get_template_part('template-parts/bao-gia/content', 'single');
                                }
                            } else {
                                get_template_part('template-parts/content', 'none');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>

                <section class="lth-products">  
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <?php
                                    $other_bao_gia = get_field('other_bao_gia');
                                    if( $other_bao_gia ): ?>
                                    <div class="module module_products module_other_products">
                                        <div class="module_title">
                                            <?php if ($other_bao_gia['title']) { ?>
                                                <h2 class="title"><?php echo $other_bao_gia['title']; ?></h2>
                                            <?php } ?>
                                            <?php if ($other_bao_gia['description']) { ?>
                                                <p class="infor"><?php echo $other_bao_gia['description']; ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="module_content">
                                            <div class="slick-slider slick-other-products">

                                                <?php echo lth_custom_img_other_bao_gia('full', 330, 250);?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </section>
            <?php } 
        }
    ?>
</main>

<?php get_footer(); ?> 
