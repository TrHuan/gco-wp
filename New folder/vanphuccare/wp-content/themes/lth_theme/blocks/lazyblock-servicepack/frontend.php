<?php

/**
 * @block-slug  :   lth-servicepack
 * @block-output:   lth_servicepack_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-servicepack/frontend_callback', 'lth_servicepack_output_fe', 10, 2);

if (!function_exists('lth_servicepack_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_servicepack_output_fe($output, $attributes) {
        ob_start();
?>
    <div class="lists-content">
        <div class="header-box">
            <h3><?php echo wpautop(esc_html($attributes['title'])); ?></h3>   
            <?php echo wpautop(esc_html($attributes['description'])); ?> 
        </div>

        <ul>
            <?php $i; foreach( $attributes['items'] as $inner ) { $i++;
                $cat_url = $inner['item_url'];
                $cat_url_2 = explode('/', $cat_url);
                $cat_slug = $cat_url_2[count($cat_url_2) - 2];
                $the_slug = $cat_slug;
                $args = array(
                  'name'        => $the_slug,
                  'post_type'   => 'post',
                  'post_status' => 'publish',
                  'numberposts' => 1
                );
                $post = get_posts($args); ?>
                <li>
                    <?php if ($cat_url) { ?>
                        <a href="<?php echo $cat_url; ?>" title="">
                    <?php } else { ?>
                        <span>
                    <?php } ?>
                        <?php echo $inner['item_text']; ?>  
                    <?php if ($cat_url) { ?>                          
                        </a>
                    <?php } else { ?>
                        </span>
                    <?php } ?>
                </li>
            <?php } ?>

            <?php if ($i > 4) { ?>
                <li class="readmore">
                    <a href="#">
                        <span class="typo-icon typo-icon-down"></span>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <div class="module_button">
            <a href="#" class="btn btn-registration btn-popup" data_popup="popup-1"><?php echo __('Đăng ký'); ?></a>
        </div>
    </div>
<?php
        return ob_get_clean();
    }
endif;
?>