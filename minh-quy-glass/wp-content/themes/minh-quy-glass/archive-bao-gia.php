<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-quotes">
    <section class="lth-products lth-products-list">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <aside class="lth-sidebars sticky-top" style="top: 66px">
                        <?php
                            if (is_active_sidebar('sidebar_quotes')) {
                                dynamic_sidebar('sidebar_quotes');
                            }
                        ?>
                    </aside>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="module module_products module_products_list">
                        <!-- <div class="module_title">
                            <h2 class="title"> -->
                                <?php
                                    // if (is_category()) {
                                    //     single_cat_title();  //Category
                                    // } elseif (is_author()) {
                                    //     the_post();
                                    //     echo ('Archives by author: ' . get_the_author());  //Tác giả
                                    //     rewind_posts();
                                    // } else {
                                    //     echo _('Archives');
                                    // }
                                ?>
                            <!-- </h2>
                        </div> -->

                        <div class="module_content">
                            <?php
                                if (have_posts()) { ?>

                                    <div class="groups-box">

                                        <?php while (have_posts()) {
                                            the_post();
                                            get_template_part('template-parts/bao-gia/content', '');
                                        } ?>

                                    </div>

                                    <?php require_once(LIBS_DIR . '/pagination.php');
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
</main>

<?php get_footer(); ?>
