<?php
/**
 * @block-slug  :   lth-terms
 * @block-output:   lth__terms_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-terms/editor_callback', 'lth__terms_output', 10, 2);

if (!function_exists('lth__terms_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__terms_output($output, $attributes) {
        ob_start();
?>
<?php if (isset($attributes['title'])) : ?>
    <p style="font-size: 12px; padding-top: 10px; padding-left: 35px; margin: 0;"><strong><?php echo esc_html($attributes['title']); ?></strong></p>
<?php else : ?>
    <p>Title is required to show this block content. (frontend)</p>
<?php endif; ?>
<?php
        return ob_get_clean();
    }
endif;

?>