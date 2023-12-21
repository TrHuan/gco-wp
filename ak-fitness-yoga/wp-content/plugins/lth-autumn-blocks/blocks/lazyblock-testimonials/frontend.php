<?php
/**
 * @block-slug  :   lth-testimonials
 * @block-output:   lth_testimonials_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-testimonials/frontend_callback', 'lth_testimonials_output_fe', 10, 2);

if (!function_exists('lth_testimonials_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_testimonials_output_fe($output, $attributes) {
        ob_start();
?>   
<?php if ($attributes['style'] == 'style-01') { ?>
    <div class="testmonial-bg tesmonial-style-two">
        <div class="container">
            <!-- Testmonial Activation Start Here -->
            <div class="testmonial-active testmonial-Màu-two owl-carousel">
                <?php foreach( $attributes['testimonials'] as $inner ): ?>
                    <!-- Singel Testmonial Start Here -->
                    <div class="single-testmonial text-center">
                        <div class="testmonial-img">
                            <?php if ($inner['image']) { ?>
                                <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Testmonial" width="66" height="66">
                            <?php } ?>
                        </div>
                        <h3><?php echo $inner['testimonial_title']; ?></h3>
                        <p><?php echo $inner['testimonial_description']; ?></p>
                    </div>
                    <!-- Singel Testmonial End Here -->
                <?php endforeach; ?>
            </div>
            <!-- Testmonial Activation End Here -->
        </div>
        <!-- Container End -->
    </div>
<?php } ?>
<?php
        return ob_get_clean();
    }
endif;
?>