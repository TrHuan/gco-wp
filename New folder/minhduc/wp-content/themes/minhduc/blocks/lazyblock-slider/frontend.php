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

    <section class="slide-mains wow fadeIn mb-100s" data-wow-duration="1s" data-wow-delay="0.1s">
        <div class="banner-mains swiper">
            <div class="swiper-wrapper">
                <?php foreach( $attributes['slider'] as $inner ): ?>
                <div class="swiper-slide">
                    <div class="items-banner__mains">
                        <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Slide" width="1920" height="990">
                        <div class="intros-banner__mains">
                            <div class="container">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="group-btns__showss">
            <div class="showss-button-prev"><img src="<?php echo ASSETS_URI; ?>/images/btn-grow-sl-mains.png" alt=""></div>
            <div class="showss-button-next"><img src="<?php echo ASSETS_URI; ?>/images/btn-grow-sl-mains.png" alt=""></div>
        </div>
    </section>
<?php
        return ob_get_clean();
    }
endif;
?>