<?php
/**
 * @block-slug  :   lth-brand
 * @block-output:   lth_brand_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-brand/frontend_callback', 'lth_brand_output_fe', 10, 2);

if (!function_exists('lth_brand_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_brand_output_fe($output, $attributes) {
        ob_start();
?>    
    <section class="lth-brand">
        <div class="container">
            <div class="row">                
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="slick-slider slick-brand">
                        <?php foreach( $attributes['brand'] as $inner ): ?>
                            <div class="item">
                                <div class="brand">
                                    <div class="image">
                                        <a href="<?php echo esc_url( $inner['url'] ); ?>" title="">
                                            <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Brand" width="964" height="586">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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