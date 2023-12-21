<?php

/**
 * @block-slug  :   lth-social
 * @block-output:   lth_social_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-social/frontend_callback', 'lth_social_output_fe', 10, 2);

if (!function_exists('lth_social_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_social_output_fe($output, $attributes) {
        ob_start();
?>

    <?php if ($attributes['title'] || $attributes['description']) : ?>
        <div class="entry-header">
            <?php if (isset($attributes['title'])) : ?>
                <h2 class="title">
                    <?php if ($attributes['url']) : ?> 
                        <a href="<?php echo esc_url($attributes['url']); ?>" social="">
                    <?php else : ?>
                        <span>
                    <?php endif; ?>
                        <?php echo esc_html($attributes['social']); ?>
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

    <ul class="social-footer d-flex mb-40">
        <?php while( have_rows('socials', 'option') ): the_row(); ?>
            <?php
                $title = get_sub_field('title', 'option');
                $url = get_sub_field('url', 'option');
                $icon_image = get_sub_field('icon_image', 'option');
                $icon_class = get_sub_field('icon_class', 'option');
            ?>

            <li>
                <a href="<?php if ($url) {echo $url;} else { echo '#';} ?>" title="Icon" target="_blank" rel="noopener">
                    <?php if ($icon_image || $icon_class) { ?>
                        <span class="icon">
                            <?php if ($icon_image) { ?>
                                <img src="<?php echo $icon_image; ?>" alt="Social"  width="60" height="60">
                            <?php } else { ?>
                                <i class="<?php echo $icon_class; ?>"></i>
                            <?php } ?>
                        </span>
                    <?php } ?>

                    <?php if ($title) { ?>
                        <span class="icon-title"><?php echo $title; ?></span>
                    <?php } ?>
                </a>
            </li>
          <?php endwhile; ?>
    </ul>

<?php
        return ob_get_clean();
    }
endif;
?>