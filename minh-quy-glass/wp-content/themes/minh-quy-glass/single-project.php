<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main-site main-page main-single main-single-project">
    <section class="lth-single lth-single-project">
         <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_single module_single_project"> 
                        <?php
                            if (have_posts()) {
                                while (have_posts()) {
                                    the_post();
                                    get_template_part('template-parts/project/content', 'single');
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

                <section class="lth-products lth-other-projects">  
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <?php
                                    $other_projects = get_field('other_projects');
                                    if( $other_projects ): ?>
                                    <div class="module module_products module_other_projects">
                                        <div class="module_title">
                                            <?php if ($other_projects['title']) { ?>
                                                <h2 class="title"><?php echo $other_projects['title']; ?></h2>
                                            <?php } ?>
                                            <?php if ($other_projects['description']) { ?>
                                                <p class="infor"><?php echo $other_projects['description']; ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="module_content">
                                            <div class="slick-slider slick-other-products">

                                                <?php echo lth_custom_img_other_projects('full', 330, 250);?>
                                                
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
