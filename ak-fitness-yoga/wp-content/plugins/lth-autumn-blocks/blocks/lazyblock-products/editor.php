<?php
/**
 * @block-slug  :   lth-products
 * @block-output:   lth__products_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-products/editor_callback', 'lth__products_output', 10, 2);

if (!function_exists('lth__products_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__products_output($output, $attributes) {
        ob_start();
?>
<p style="font-size: 12px; padding-top: 10px; padding-left: 35px; margin: 0;"><strong><?php echo esc_html($attributes['title']); ?></strong></p>
<?php
        return ob_get_clean();
    }
endif;

?>