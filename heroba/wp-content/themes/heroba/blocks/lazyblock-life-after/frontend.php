<?php

/**
 * @block-slug  :   lth-life-after
 * @block-output:   lth_life_after_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-life-after/frontend_callback', 'lth_life_after_output_fe', 10, 2);

if (!function_exists('lth_life_after_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_life_after_output_fe($output, $attributes) {
        ob_start();
?>
    <div class="life-after mb-150s">
        <div class="container">
            <h2 class="fs-48s mb-10s"><?php echo $attributes['title']; ?></h2>
            <p class="mb-80s titles-light__alls "><?php echo $attributes['description']; ?></p>
            <div class="row gutter-100">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="img-life__after">
                        <a href="<?php echo esc_url( $attributes['image']['url'] ); ?>" data-fancybox="images-shows" data-caption="My caption">
                            <img src="<?php echo esc_url( $attributes['image']['url'] ); ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="img-life__after">
                        <a href="<?php echo esc_url( $attributes['image_2']['url'] ); ?>" data-fancybox="images-shows" data-caption="My caption">
                            <img src="<?php echo esc_url( $attributes['image_2']['url'] ); ?>" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
        return ob_get_clean();
    }
endif;
?>