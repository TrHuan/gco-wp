<?php

/**
 * @block-slug  :   lth-classic
 * @block-output:   lth_classic_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-classic/frontend_callback', 'lth_classic_output_fe', 10, 2);

if (!function_exists('lth_classic_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_classic_output_fe($output, $attributes) {
        ob_start();

    $color_classic = 'color: '.$attributes['color_classic'];
    $color_description = 'color: '.$attributes['color_description'];
?>

    <?php if ($attributes['classic']) : ?>
        <div class="entry-header">
            <?php if (isset($attributes['classic'])) : ?>
                <?php echo $attributes['classic']; ?>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <p>Classic is required to show this block content. (frontend)</p>
    <?php endif; ?>

<?php
        return ob_get_clean();
    }
endif;
?>