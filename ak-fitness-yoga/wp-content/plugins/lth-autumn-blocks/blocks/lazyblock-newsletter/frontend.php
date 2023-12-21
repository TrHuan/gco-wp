<?php

/**
 * @block-slug  :   lth-newsletter
 * @block-output:   lth_newsletter_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-newsletter/frontend_callback', 'lth_newsletter_output_fe', 10, 2);

if (!function_exists('lth_newsletter_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_newsletter_output_fe($output, $attributes) {
        ob_start();
?>
<?php if ($attributes['style'] == 'style-01') { ?>
    <div class="subscribe-area body-bg">
        <div class="container">
            <div class="subscribe-content subscribe-content-two offset-lg-6  text-center">
                <?php if (isset($attributes['classic'])) : ?>
                    <?php echo $attributes['classic']; ?>
                <?php endif; ?>
                <div class="newsletter-box">
                    <?php echo do_shortcode($attributes['form']); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
        return ob_get_clean();
    }
endif;
?>