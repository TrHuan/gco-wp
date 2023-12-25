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

                    <?php if (!empty(get_search_query())) { ?>
                    
                        <div class="module_title">
                            <h1 class="title">
                                <?php echo __('Kết quả tìm kiếm: ') . get_search_query(); ?>
                            </h1>
                        </div>

                        <div class="module_content">
                            <?php
                                $s = get_search_query();

                                $args = [
                                    'post_type' => 'product',
                                    'posts_per_page' => 12,
                                    'orderby' => 'post_date',
                                    's' => $s,
                                ];
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>
                                    <div class="module__content">
                                        <h3 style="margin-bottom: 15px;">
                                            <?php echo __('Sản phẩm'); ?>
                                        </h3>

                                        <div class="groups-box">                         
                                            <?php //get_template_part('template-parts/post/content', ''); ?>

                                            <?php while ($wp_query->have_posts()) {
                                                $wp_query-> the_post();

                                                get_template_part('woocommerce/product-box/product-box', '');
                                            } ?>
                                        </div>
                                    </div>                                            
                                <?php } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata();
                            ?>

                            <?php
                                $s = get_search_query();

                                $args = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 12,
                                    'orderby' => 'post_date',
                                    's' => $s,
                                ];
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>
                                    <div class="module__content">
                                        <h3 style="margin-bottom: 15px;">
                                            <?php echo __('Tin tức'); ?>
                                        </h3>

                                        <div class="groups-box">  
                                            <?php while ($wp_query->have_posts()) {
                                                $wp_query-> the_post();

                                                get_template_part('template-parts/post/content', ''); 
                                            } ?>
                                        </div>
                                    </div>                                            
                                <?php } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata();
                            ?>
                        </div>

                    <?php } else {
                        get_template_part('template-parts/content', 'none');
                    } ?>
                </section>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
