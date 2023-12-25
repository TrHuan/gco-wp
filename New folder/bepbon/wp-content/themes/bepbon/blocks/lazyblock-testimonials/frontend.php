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
<div class="entry-content lth-testimonials <?php echo $attributes['style']; ?>">
    <div class="slick-slider slick-testimonials-<?php echo $attributes['style_slider']; ?>">
        <?php foreach( $attributes['testimonials'] as $inner ): ?>
            <div class="item">
                <div class="feature">
                    <div class="image">
                        <?php if ($inner['image']) { ?>
                            <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="" width="" height="">
                        <?php } ?>
                    </div>
                    <div class="content">
                        <h4 class="text-1"><?php echo $inner['testimonial_title']; ?></h4>
                        <p class="text-2"><?php echo $inner['testimonial_description']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
        return ob_get_clean();
    }
endif;
?>