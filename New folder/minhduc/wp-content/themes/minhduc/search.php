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
        <section class="module module_posts searchs-list" style="margin: 50px 0 20px;">

            <div class="module_header title-box">
                <h1 class="title fs-40s title-after__mains titles-bold__alls text-color__blues mb-30s">
                    <?php echo __('Tìm kiếm: ') . get_search_query(); ?>
                </h1>
            </div>            
            
            <div class="module_content">
                <?php
                    if (have_posts()) { ?>
                        <div class="row">

                            <?php while (have_posts()) {
                                the_post(); ?>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-30s">
                                    <?php if ( get_post_type() == 'product' ) {

                                        get_template_part('woocommerce/product-box/product-box', '');

                                    } if ( get_post_type() == 'post' ) {

                                        get_template_part('template-parts/post/content', '');

                                    } ?>
                                </div>
                            <?php } ?>
                            
                        </div>

                        <?php require_once(LIBS_DIR . '/pagination.php');
                    } else {
                        get_template_part('template-parts/content', 'none');
                    }
                ?>                
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
