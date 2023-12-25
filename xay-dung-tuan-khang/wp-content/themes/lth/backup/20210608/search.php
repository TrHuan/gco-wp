<?php
/**
 * The template for displaying search results pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page page-searchs">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <section class="module module_posts searchs-list">
                    
                    <div class="module_title">
                        <h1 class="title">
                            <?php echo __('Search results: ') . get_search_query(); ?>
                        </h1>
                    </div>

                    <div class="module_content">
                        <?php
                            if (have_posts()) { ?>
                                <div class="groups-box">

                                    <?php while (have_posts()) {
                                        the_post();

                                        echo get_post_type();

                                        if ( get_post_type() == 'product' ) {

                                            get_template_part('woocommerce/product-box/product-box', '');

                                        } if ( get_post_type() == 'post' ) {

                                            get_template_part('template-parts/post/content', '');

                                        } if ( get_post_type() == 'service' ) {
                                            // Dịch vụ
                                            get_template_part('template-parts/service/content', '');

                                        } if ( get_post_type() == 'project' ) {
                                            // Dự án
                                            get_template_part('template-parts/project/content', '');

                                        }
                                    } ?>
                                    
                                </div>

                                <?php require_once(LIBS_DIR . '/pagination.php');
                            } else {
                                get_template_part('template-parts/content', 'none');
                            }
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
