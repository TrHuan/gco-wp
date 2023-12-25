<?php

/**
 * @block-slug  :   lth-favorite
 * @block-output:   lth_favorite_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-favorite/frontend_callback', 'lth_favorite_output_fe', 10, 2);

if (!function_exists('lth_favorite_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_favorite_output_fe($output, $attributes) {
        ob_start();
?>
    <section class="favorite-pages mb-100s">
        <div class="container">
            <?php if ($attributes['title'] || $attributes['description']) : ?>
                <div class="module_header title-box">
                    <?php if (isset($attributes['title'])) : ?>
                        <h2 class="fs-40s title-after__mains titles-bold__alls mb-80s">
                            <?php if ($attributes['url']) : ?> 
                                <a href="<?php echo esc_url($attributes['url']); ?>" title="">
                            <?php endif; ?>
                                <?php echo wpautop(esc_html($attributes['title'])); ?>
                            <?php if ($attributes['url']) : ?> 
                                </a>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($attributes['description']) : ?>
                        <div class="infor">
                            <?php echo wpautop(esc_html($attributes['description'])); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="angry-grid mb-70s">
                <?php $i = 0; foreach( $attributes['categories'] as $inner ) {
                    $cat_url = $inner['category'];
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
                    <div class="item-<?php echo $i; ?>">
                        <div class="items-favorite__page pd-horizontal__rectangle">
                            <div class="intros-favorite__pages">
                                <h3><a class="titles-medium__alls fs-16s names-favorite__page" href="<?php echo $cat_url; ?>" tille=""><?php echo $post[0]->post_title; ?></a></h3>
                            </div>

                            <a href="<?php echo $cat_url; ?>" title="" class="img-sevice__mains">
                                <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" width="" height="" alt="<?php echo $post[0]->post_title; ?>">
                            </a>
                        </div>
                    </div>
                    <?php $i++;
                } ?>
            </div>
        </div>
    </section>
<?php
        return ob_get_clean();
    }
endif;
?>