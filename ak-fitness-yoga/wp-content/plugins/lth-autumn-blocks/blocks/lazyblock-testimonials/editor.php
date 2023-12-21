<?php
/**
 * @block-slug  :   lth-testimonials
 * @block-output:   lth__testimonials_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-testimonials/editor_callback', 'lth__testimonials_output', 10, 2);

if (!function_exists('lth__testimonials_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__testimonials_output($output, $attributes) {
        ob_start();
?>

<?php
        return ob_get_clean();
    }
endif;

?>