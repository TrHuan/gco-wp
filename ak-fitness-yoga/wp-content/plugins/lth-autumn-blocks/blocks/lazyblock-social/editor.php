<?php
/**
 * @block-slug  :   lth-social
 * @block-output:   lth__social_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-social/editor_callback', 'lth__social_output', 10, 2);

if (!function_exists('lth__social_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__social_output($output, $attributes) {
        ob_start();
?>
    
    <?php if (isset($attributes['social'])) : ?>
        <p style="font-size: 12px; padding-top: 10px; padding-left: 35px; margin: 0;"><strong><?php echo esc_html($attributes['social']); ?></strong></p>
    <?php else : ?>
        <p>social is required to show this block content. (frontend)</p>
    <?php endif; ?>

<?php
        return ob_get_clean();
    }
endif;

?>