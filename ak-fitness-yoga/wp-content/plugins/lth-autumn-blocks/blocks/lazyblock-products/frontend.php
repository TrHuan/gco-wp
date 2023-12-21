<?php

/**
 * @block-slug  :   lth-products
 * @block-output:   lth_products_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-products/frontend_callback', 'lth_products_output_fe', 10, 2);

if (!function_exists('lth_products_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_products_output_fe($output, $attributes) {
        ob_start();
?>
<?php
    if ($attributes['products'] == 'featured') {
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN',
        );

        $args = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'category_name' => $attributes['categories'],
            'posts_per_page' => $attributes['post_number'],
            'orderby' => $attributes['orderby'],
            'order' => $attributes['order'],
            'tax_query' => $tax_query,
        ];
    } elseif ($attributes['products'] == 'bestseller') {
        $args = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'category_name' => $attributes['categories'],
            'posts_per_page' => $attributes['post_number'],
            'order' => $attributes['order'],
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
        ];
    } else {
        $args = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'category_name' => $attributes['categories'],
            'posts_per_page' => $attributes['post_number'],
            'orderby' => $attributes['orderby'],
            'order' => $attributes['order'],
        ];
    }
    $wp_query = new WP_Query($args);
    if ($wp_query->have_posts()) { ?>
        <?php if ($attributes['style'] == 'style-01') { ?>
            <div class="second-featured-area border-hover-effect border-red-effect ptb-80">
                <div class="container">
                    <!-- Section Title Start -->
                    <div class="section-title text-center mb-50">
                        <h2><?php echo esc_html($attributes['title']); ?></h2>
                        <p><?php echo esc_html($attributes['description']); ?></p>
                    </div>
                    <!-- Section Title End -->
                    <!-- Second Featured Product Activation Start -->
                    <div class="second-featured-pro-active featured-pro-Màu-style-two owl-carousel">
                        <?php $i = 0; while ($wp_query->have_posts()) {
                            $wp_query-> the_post(); $i++; ?>
                            <!-- Double Product Start -->
                            <?php if ($i % 2 != 0) { ?>
                            <div class="double-product">
                            <?php } ?>
                                <?php get_template_part('woocommerce/product-box/product-box', $attributes['style']); ?>
                            <?php if ($i % 2 == 0) { ?>
                            </div>
                            <?php } ?>
                            <!-- Double Product End -->
                        <?php } ?>
                    </div>
                    <!-- Second Featured Product Activation End -->
                </div>
                <!-- Container End -->
            </div>
        <?php } ?>
    <?php } else {
        get_template_part('template-parts/content', 'none');
    }
    // reset post data
    wp_reset_postdata();
?>    
<?php
        return ob_get_clean();
    }
endif;
?>