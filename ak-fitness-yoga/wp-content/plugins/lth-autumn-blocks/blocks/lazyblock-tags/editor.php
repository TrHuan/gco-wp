<?php
/**
 * @block-slug  :   lth-tags
 * @block-output:   lth__tags_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-tags/editor_callback', 'lth__tags_output', 10, 2);

if (!function_exists('lth__tags_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__tags_output($output, $attributes) {
        ob_start();
?>
    
    <?php if (isset($attributes['tags'])) : ?>
        <p style="font-size: 12px; padding-top: 10px; padding-left: 35px; margin: 0;"><strong><?php echo esc_html($attributes['tags']); ?></strong></p>
    <?php else : ?>
        <p>tags is required to show this block content. (frontend)</p>
    <?php endif; ?>

<?php
        return ob_get_clean();
    }
endif;

?>