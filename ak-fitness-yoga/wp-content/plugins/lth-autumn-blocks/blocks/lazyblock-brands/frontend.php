<?php

/**
 * @block-slug  :   lth-brands
 * @block-output:   lth_brands_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-brands/frontend_callback', 'lth_brands_output_fe', 10, 2);

if (!function_exists('lth_brands_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_brands_output_fe($output, $attributes) {
        ob_start();
?>

<?php if ($attributes['style'] == 'style-01') { ?>
    <div class="brand ptb-80">
        <div class="container">
            <!-- Brand Logo Active Start Here -->
            <div class="brand-logo-active brand-red-Màu owl-carousel">
                <?php foreach( $attributes['brands'] as $inner ): ?>
                    <div class="single-brand">
                        <a href="<?php echo $inner['url']; ?>" title="">
                            <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Brand" width="" height="">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Brand Logo Active End Here -->
        </div>
    </div>
<?php } ?>

<?php
        return ob_get_clean();
    }
endif;
?>