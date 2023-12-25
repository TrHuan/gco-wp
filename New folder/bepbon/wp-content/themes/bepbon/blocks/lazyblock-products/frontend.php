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
<section class="lth-products">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if ($attributes['title'] || $attributes['description'] || $attributes['categories']) : ?>
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
                
                        <?php if ($attributes['categories']) { ?>
                            <ul class="categories-list tab-title">
                                <?php $i;
                                    foreach( $attributes['categories'] as $inner ) {
                                        $i++;
                                        $cat_url = $inner['category'];
                                        $cat_url_2 = explode('/', $cat_url);
                                        $cat_slug = $cat_url_2[count($cat_url_2) - 2];
                                        $cat = get_term_by( 'slug', $cat_slug, 'product_cat');
                                    ?>

                                        <li>
                                            <a href="<?php echo $cat_url; ?>" class="<?php if ($i == 1) {echo __('active');} ?>" title="" data_tab="tab-<?php echo $i; ?>">
                                                <?php echo $cat->name; ?>                            
                                            </a>
                                        </li>
                                    <?php }
                                ?>
                            </ul>
                        <?php } ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content tab-products tab-content">
                    <?php if ($attributes['categories']) { ?>
                        <?php
                            $j;
                            foreach( $attributes['categories'] as $inner ) {
                                $j++;
                                $cat_url = $inner['category'];
                                $cat_url_2 = explode('/', $cat_url);
                                $cat_slug = $cat_url_2[count($cat_url_2) - 2];

                                $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'slug',
                                            'terms'    => $cat_slug,
                                        ),
                                    ),
                                    'posts_per_page' => $attributes['post_number'],
                                    'orderby' => $attributes['orderby'],
                                    'order' => $attributes['order'],
                                ];
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>
                                    <div class="tab-panel tab-<?php echo $j; ?> <?php if ($j == 1) { ?>active<?php } ?>">
                                        <?php if ($inner['image']) { ?>
                                            <div class="banner">
                                                <div class="image">
                                                    <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="" width="" height="">
                                                </div>

                                                <div class="content">
                                                    <?php if ($inner['text_top']) { ?>
                                                        <p class="text-1"><?php echo $inner['text_top']; ?></p>
                                                    <?php } ?>
                                                    <?php if ($inner['text_title']) { ?>
                                                        <p class="text-2"><?php echo $inner['text_title']; ?></p>
                                                    <?php } ?>
                                                    <?php if ($inner['text_bottom']) { ?>
                                                        <p class="text-3"><?php echo $inner['text_bottom']; ?></p>
                                                    <?php } ?>
                                                    <a href="<?php echo $cat_url; ?>" title="">
                                                        <?php echo __('Đến của hàng'); ?> <i class="fal fa-long-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="products">
                                            <div class="slick-slider slick-products">

                                                <?php while ($wp_query->have_posts()) {
                                                    $wp_query-> the_post();
                                                    //load file tương ứng với post format
                                                    get_template_part('woocommerce/product-box/product-box', '');
                                                } ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }
                        ?>
                    <?php } ?> 
                                    
                    <?php if ($attributes['button']) : ?>
                        <div class="posts-button">
                            <a href="<?php echo esc_url($attributes['url']); ?>" class="btn">
                                <?php echo esc_html($attributes['button']); ?>
                            </a>
                        </div>
                    <?php endif; ?>       
                </div>
            </div>
        </div>
    </div>
</section>
<?php
        return ob_get_clean();
    }
endif;
?>