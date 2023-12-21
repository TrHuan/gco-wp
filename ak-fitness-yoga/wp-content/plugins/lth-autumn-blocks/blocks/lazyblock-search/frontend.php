<?php

/**
 * @block-slug  :   lth-search
 * @block-output:   lth_search_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-search/frontend_callback', 'lth_search_output_fe', 10, 2);

if (!function_exists('lth_search_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_search_output_fe($output, $attributes) {
        ob_start();
?>
<div class="lth-search"> 
    <?php get_search_form(); ?>
</div>
<?php
        return ob_get_clean();
    }
endif;
?>