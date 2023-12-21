<?php
/**
 * @block-slug  :   lth-advancedsearch
 * @block-output:   lth__advancedsearch_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-advancedsearch/editor_callback', 'lth__advancedsearch_output', 10, 2);

if (!function_exists('lth__advancedsearch_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__advancedsearch_output($output, $attributes) {
        ob_start();
?>
    
    

<?php
        return ob_get_clean();
    }
endif;

?>