<?php
/**
 * @block-slug  :   lth-productscattegories
 * @block-output:   lth__productscattegories_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-productscattegories/editor_callback', 'lth__productscattegories_output', 10, 2);

if (!function_exists('lth__productscattegories_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__productscattegories_output($output, $attributes) {
        ob_start();
?>
<p style="font-size: 12px; padding-top: 10px; padding-left: 35px; margin: 0;"><strong><?php echo esc_html($attributes['title']); ?></strong></p>
<?php
        return ob_get_clean();
    }
endif;

?>