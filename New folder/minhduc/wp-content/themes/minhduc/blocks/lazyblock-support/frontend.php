<?php

/**
 * @block-slug  :   lth-support
 * @block-output:   lth_support_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-support/frontend_callback', 'lth_support_output_fe', 10, 2);

if (!function_exists('lth_support_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_support_output_fe($output, $attributes) {
        ob_start();
?>
    <section class="supports-mains p-70s wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gutter-50">
                <div class="col-lg-7">
                    <div class="intros-supports__mains">
                        <h3 class="fs-24s mb-24s mb-10s titles-medium__alls text-oranges"><?php echo wpautop($attributes['title']); ?></h3>
                        <div class="mb-30s"><?php echo wpautop($attributes['description']); ?></div>

                        <?php echo do_shortcode($attributes['form']); ?>
                    </div>
                </div>
                <div class="col-lg-5">                    
                    <?php echo wpautop($attributes['map']); ?>
                </div>
            </div>
        </div>
    </section>

<?php
        return ob_get_clean();
    }
endif;
?>