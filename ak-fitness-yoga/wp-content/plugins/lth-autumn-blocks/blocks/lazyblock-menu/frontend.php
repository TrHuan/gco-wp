<?php

/**
 * @block-slug  :   lth-menu
 * @block-output:   lth_menu_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-menu/frontend_callback', 'lth_menu_output_fe', 10, 2);

if (!function_exists('lth_menu_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_menu_output_fe($output, $attributes) {
        ob_start();

    $nav_menu    = get_term_by( 'slug', $attributes['menu_name'], 'nav_menu' );
?>
<div class="lth-megamenu">
    <?php if ( ! is_wp_error( $nav_menu ) && is_object( $nav_menu ) && ! empty( $nav_menu ) ): ?>
        <?php
        wp_nav_menu( array(
                'menu'            => $nav_menu->slug,
                'theme_location'  => $nav_menu->slug,
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'menu',
            )
        );
        ?>
    <?php endif; ?>
</div>
<?php
        return ob_get_clean();
    }
endif;
?>