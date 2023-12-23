<?php

/**
 * @block-slug  :   lth-ingredients
 * @block-output:   lth_ingredients_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-ingredients/frontend_callback', 'lth_ingredients_output_fe', 10, 2);

if (!function_exists('lth_ingredients_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_ingredients_output_fe($output, $attributes) {
        ob_start();
?>

<div class="ingredients-integrity">
    <div class="container">
        <?php if (isset($attributes['title'])) : ?>
            <h2 class="fs-48s mb-10s"><?php echo esc_html($attributes['title']); ?></h2>
        <?php endif; ?>
        <?php if ($attributes['description']) : ?>
            <p class="titles-light__alls mb-80s"><?php echo esc_html($attributes['description']); ?></p>
        <?php endif; ?>
    </div>
    
    <div class="slide-ingredients">
        <div class="sl-ingredients__pages swiper">
            <div class="swiper-wrapper">                
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
                            <div class="swiper-slide">
                                <?php //load file tương ứng với post format
                                get_template_part('woocommerce/product-box/product-box', '2'); ?>
                            </div>
                        <?php } ?>
                    <?php } else {
                        get_template_part('template-parts/content', 'none');
                    }
                    // reset post data
                    wp_reset_postdata();
                ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="group-btns__showss">
            <div class="showss-button-prev"><i class="fa fa-angle-double-left" aria-hidden="true"></i></i></div>
            <div class="showss-button-next"><i class="fa fa-angle-double-right" aria-hidden="true"></i></i></div>
        </div>
    </div>
</div>
<?php
        return ob_get_clean();
    }
endif;
?>