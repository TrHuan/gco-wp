<?php
/**
 * @block-slug  :   lth-newsletter
 * @block-output:   lth__newsletter_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-newsletter/editor_callback', 'lth__newsletter_output', 10, 2);

if (!function_exists('lth__newsletter_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__newsletter_output($output, $attributes) {
        ob_start();
?>

<?php
        return ob_get_clean();
    }
endif;

?>