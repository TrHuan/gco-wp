<?php
/**
 * @block-slug  :   lth-slider
 * @block-output:   lth_slider_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-slider/frontend_callback', 'lth_slider_output_fe', 10, 2);

if (!function_exists('lth_slider_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_slider_output_fe($output, $attributes) {
        ob_start();
?>    
    <div class="slider-activation slider-style-two owl-carousel">
        <?php foreach( $attributes['slider'] as $inner ): ?>
            <!-- Start Single Slide -->
            <div class="slide align-center-left fullscreen animation-style-01 bg-image-3 ">
               <div class="slider-progress"></div>
               <a href="#" title="">
                    <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Slider" width="1582" height="790">
               </a>
            </div>
            <!-- End Single Slide -->
        <?php endforeach; ?>
    </div>
<?php
        return ob_get_clean();
    }
endif;
?>