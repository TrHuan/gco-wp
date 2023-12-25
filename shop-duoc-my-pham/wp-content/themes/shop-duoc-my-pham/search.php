<?php
/**
 * The template for displaying search results pages
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php
    $breadcrumb_all = get_field('breadcrumb', 'option');
    $img_url = $breadcrumb_all;
?>

<div class="lth-breadcrumbs">
    <?php if ($img_url) { ?>
        <?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-box/breadcrumb-image-box.php'); ?>
    <?php } ?>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="breadcrumbs-content">
                    <div class="title-box breadcrumb-title">
                        <h1 class="title"><?php echo __('Tìm kiếm'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="main-site main-page main-searchs">
    <div class="main-container">
        <div class="main-content">
            <article class="lth-searchs">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="searchs-box">
                                <div class="title-box">
                                    <h3 class="title"><?php echo __('Tìm kiếm cho: [ ') . get_search_query() . (' ]'); ?></h3>
                                </div>

                                <div class="content-box">
                                    <div class="groups-box">
                                        <?php
                                            if (have_posts()) {
                                                while (have_posts()) {
                                                    the_post();

                                                    if ( get_post_type() == 'post' ) { ?>

                                                        <div class="item">
                                                            <?php 
                                                            //load file tương ứng với post format
                                                            get_template_part('template-parts/post/content', get_post_format()); ?>
                                                        </div>

                                                    <?php }

                                                        if ( get_post_type() == 'product' ) {
                                                        get_template_part('woocommerce/product-box/product-box', '');
                                                    }
                                                }

                                                require_once(LIBS_DIR . '/paginations/pagination.php');
                                            } else {
                                                get_template_part('template-parts/content', 'none');
                                            }
                                        ?>
                                    </div>
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
