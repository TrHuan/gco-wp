<?php

/**
 * @block-slug  :   lth-list-text
 * @block-output:   lth_list_text_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-list-text/frontend_callback', 'lth_list_text_output_fe', 10, 2);

if (!function_exists('lth_list_text_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_list_text_output_fe($output, $attributes) {
        ob_start();
?>
    <div class="text-achievements__abouts <?php echo $attributes['class']; ?>" data-wow-duration="1s" data-wow-delay="0.1s">
        <h2 class="title-after__mains text-color__blues mb-25s fs-40s"><?php echo esc_html($attributes['title']); ?> <br> <span class="titles-bold__alls"> <?php echo esc_html($attributes['title_2']); ?></span></h2>
        <?php if ($attributes['description']) { ?>
            <div class="mb-30s"><?php echo wpautop(__($attributes['description'])); ?></div>
        <?php } ?>
        <ul class="list-text__alls list-not__navs">
            <?php foreach( $attributes['lists'] as $inner ) { ?>
                <li>
                    <?php echo wpautop($inner['list']); ?>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php
        return ob_get_clean();
    }
endif;
?>