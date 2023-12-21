<?php
/**
 * @block-slug  :   lth-brands
 * @block-output:   lth__brands_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-brands/editor_callback', 'lth__brands_output', 10, 2);

if (!function_exists('lth__brands_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__brands_output($output, $attributes) {
        ob_start();
?>
    
<?php
        return ob_get_clean();
    }
endif;

?>