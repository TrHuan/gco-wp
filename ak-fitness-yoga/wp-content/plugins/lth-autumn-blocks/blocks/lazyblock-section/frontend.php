<?php

/**
 * @block-slug  :   lth-section
 * @block-output:   lth_section_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-section/frontend_callback', 'lth_section_output_fe', 10, 2);

if (!function_exists('lth_section_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_section_output_fe($output, $attributes) {
        ob_start();

    if ($attributes['image_background']) {
        $background = 'background: url('.$attributes['image_background']['url'].') no-repeat center';
    } elseif ($attributes['color_background']) {
        $background = 'background-color: '.$attributes['color_background'];
    }
    if ($attributes['number_margin_top']) {
        $margin_top = 'margin-top: '.$attributes['number_margin_top'].'px;';
    }
    if ($attributes['number_margin_bottom']) {
        $margin_bottom = 'margin-bottom: '.$attributes['number_margin_bottom'].'px;';
    }
    if ($attributes['number_padding_top']) {
        $padding_top = 'padding-top: '.$attributes['number_padding_top'].'px;';
    }
    if ($attributes['number_padding_bottom']) {
        $padding_bottom = 'padding-bottom: '.$attributes['number_padding_bottom'].'px;';
    }
?>

    <section class="lth-section" style="<?php echo $margin_top; ?> <?php echo $margin_bottom; ?> <?php echo $padding_top; ?> <?php echo $padding_bottom; ?> <?php echo $background; ?>">
        <?php if ( $attributes['full_width'] ) : ?>
            <div class="container-fluid">
        <?php else: ?>
            <div class="container">
        <?php endif; ?>
            <?php echo $attributes['section']; ?>
        </div>
    </section>

<?php
        return ob_get_clean();
    }
endif;
?>