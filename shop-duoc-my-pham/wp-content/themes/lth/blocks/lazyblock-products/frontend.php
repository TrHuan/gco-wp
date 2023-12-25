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
<section class="prds-mains wow fadeInUp mb-50s" data-wow-duration="1s" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gutter-60">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if ($attributes['title'] || $attributes['description']) : ?>
                    <div class="entry-header">
                        <?php if (isset($attributes['title'])) : ?>
                            <h2 class="title">
                                <?php if ($attributes['url']) : ?> 
                                    <a href="<?php echo esc_url($attributes['url']); ?>" title="">
                                <?php else : ?>
                                    <span>
                                <?php endif; ?>
                                    <?php echo esc_html($attributes['title']); ?>
                                <?php if ($attributes['url']) : ?> 
                                    </a>
                                <?php else : ?>
                                    </span>
                                <?php endif; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($attributes['description']) : ?>
                            <div class="infor">
                                <?php echo esc_html($attributes['description']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php
                $i = 0;
                foreach( $attributes['categories'] as $inner ) {
                    $i++;
                    if ($i == '1') {
                        // $cat_url = $inner['category'];
                        // $cat_url_2 = explode('/', $cat_url);
                        // $cat_slug = $cat_url_2[count($cat_url_2) - 2];
                        $cat = $inner['category'];
                    }
                }

                if ($cat) {
                    $args = [
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'name',
                                'terms'    => $cat,
                            ),
                        ),
                        'posts_per_page' => $attributes['post_number'],
                        'orderby' => $attributes['orderby'],
                        'order' => $attributes['order'],
                    ];
                } else {
                    $args = [
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'posts_per_page' => $attributes['post_number'],
                        'orderby' => $attributes['orderby'],
                        'order' => $attributes['order'],
                    ];
                }
                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()) { ?>

                    <?php while ($wp_query->have_posts()) {
                        $wp_query-> the_post(); ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <?php //load file tương ứng với post format
                            get_template_part('woocommerce/product-box/product-box', ''); ?>
                        </div>
                    <?php } ?>
                <?php } else {
                    get_template_part('template-parts/content', 'none');
                }
                // reset post data
                wp_reset_postdata();
            ?>
        </div>
                    
        <?php if ($attributes['url_text']) : ?>
            <a href="<?php echo esc_url($attributes['url']); ?>" class="btn-see__alls fs-24s">
                <?php echo $attributes['url_text']; ?>
            </a>
        <?php endif; ?>
    </div>
</section>
<?php
        return ob_get_clean();
    }
endif;
?>