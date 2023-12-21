<?php

/**
 * @block-slug  :   lth-banner
 * @block-output:   lth_banner_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-banner/frontend_callback', 'lth_banner_output_fe', 10, 2);

if (!function_exists('lth_banner_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_banner_output_fe($output, $attributes) {
        ob_start();
?>

    <div class="entry-content lth-banner <?php echo $attributes['style']; ?>">
        <div class="image">
            <img src="<?php echo esc_url( $attributes['image']['url'] ); ?>" alt="" width="" height="">
        </div>
        <?php if ($attributes['text_top'] || $attributes['text_title'] || $attributes['text_bottom']) { ?>
            <div class="content">
                <?php if ($attributes['text_top']) { ?>
                    <p class="text-1"><?php echo $attributes['text_top']; ?></p>
                <?php } ?>
                <?php if ($attributes['text_title']) { ?>
                    <p class="text-2"><?php echo $attributes['text_title']; ?></p>
                <?php } ?>
                <?php if ($attributes['text_bottom']) { ?>
                    <p class="text-3"><?php echo $attributes['text_bottom']; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

<?php
        return ob_get_clean();
    }
endif;
?>