<?php

/**
 * @block-slug  :   lth-tags
 * @block-output:   lth_tags_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-tags/frontend_callback', 'lth_tags_output_fe', 10, 2);

if (!function_exists('lth_tags_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_tags_output_fe($output, $attributes) {
        ob_start();
?>
<div class="tags">
    <?php if ($attributes['title'] || $attributes['description']) : ?>
        <div class="entry-header">
            <?php if (isset($attributes['title'])) : ?>
                <h2 class="title">
                    <?php if ($attributes['url']) : ?> 
                        <a href="<?php echo esc_url($attributes['url']); ?>" tags="">
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
        </div>
    <?php endif; ?>

    <div class="categorie recent-post">
        <ul class="tag-list d-flex flex-wrap">
            <?php
                $posttags = get_the_tags();
            if ($posttags) {
                foreach($posttags as $tag) { ?>                     
                    <li><a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name;  ?></a></li>
                <?php }
            }
            ?>
        </ul>
    </div>
</div>
<?php
        return ob_get_clean();
    }
endif;
?>