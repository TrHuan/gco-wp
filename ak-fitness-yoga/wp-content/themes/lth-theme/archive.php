<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <section class="lth-blogs">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center mb-50">
                        <h1>
                            <?php
                                if (is_category()) {
                                    single_cat_title();  //Category
                                } elseif (is_author()) {
                                    the_post();
                                    echo ('Archives by author: ' . get_the_author());  //Tác giả
                                    rewind_posts();
                                } else {
                                    echo _('Archives');
                                }
                            ?>
                        </h1>
                    </div>

                    <div class="module module_posts posts-list">
                        <div class="module_content">
                            <?php
                                if (have_posts()) { ?>

                                    <div class="groups-box">

                                        <?php while ($wp_query->have_posts()) {
                                            $wp_query-> the_post(); ?>
                                            <div class="item">
                                                <?php //load file tương ứng với post format
                                                get_template_part('template-parts/post/content', 'style-01'); ?>
                                            </div>
                                        <?php } ?>  

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
