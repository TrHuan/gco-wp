<?php
/**
 * @block-slug  :   lth-banner
 * @block-output:   lth__banner_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-banner/editor_callback', 'lth__banner_output', 10, 2);

if (!function_exists('lth__banner_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__banner_output($output, $attributes) {
        ob_start();
?>
    
<?php
        return ob_get_clean();
    }
endif;

?>