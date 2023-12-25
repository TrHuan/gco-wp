<?php

/**
 * @block-slug  :   lth-toggle-2-2
 * @block-output:   lth_toggle_2_2_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-toggle-2/frontend_callback', 'lth_toggle_2_output_fe', 10, 2);

if (!function_exists('lth_toggle_2_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_toggle_2_output_fe($output, $attributes) {
        ob_start();
?>

<section class="lth-toggle">   
    <div class="entry-header">
        <?php if (isset($attributes['title'])) : ?>
            <h2 class="title">
                <?php if ($attributes['url']) : ?> 
                    <a href="<?php echo esc_url($attributes['url']); ?>" title="">
                <?php else : ?>
                    <span>
                <?php endif; ?>
                    <?php echo esc_html($attributes['title']); ?>
                <?php if ($attributes['url']) : ?> 
                    </a>
                <?php else : ?>
                    </span>
                <?php endif; ?>
            </h2>
        <?php endif; ?>

        <?php if ($attributes['description']) : ?>
            <div class="infor">
                <p><?php echo esc_html($attributes['description']); ?></p>
            </div>
        <?php endif; ?>

        <ul>     
            <?php foreach( $attributes['toggle'] as $inner ): ?>
                <li>
                    <a href="#"><?php echo $inner['toggle_title']; ?></a>
                    <div class="content">
                        <?php echo $inner['toggle_content']; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php
        return ob_get_clean();
    }
endif;
?>