<?php

/**
 * @block-slug  :   lth-blogs
 * @block-output:   lth_blogs_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-blogs/frontend_callback', 'lth_blogs_output_fe', 10, 2);

if (!function_exists('lth_blogs_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_blogs_output_fe($output, $attributes) {
        ob_start();
?>
<section class="lth-blogs">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if ($attributes['title'] || $attributes['description'] || $attributes['categories']) : ?>
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
                                <?php echo esc_html($attributes['description']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                        $args = [
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            // 'category_name' => $attributes['categories'],
                            'posts_per_page' => $attributes['post_number'],
                            'orderby' => $attributes['orderby'],
                            'order' => $attributes['order'],
                        ];
                        $wp_query = new WP_Query($args);
                        if ($wp_query->have_posts()) { ?>

                            <div class="slick-slider slick-blogs blogs">

                                <?php while ($wp_query->have_posts()) {
                                    $wp_query-> the_post();
                                    //load file tương ứng với post format
                                    get_template_part('template-parts/post/content', '');
                                } ?>

                            </div>
                            
                            <?php if ($attributes['button']) : ?>
                                <div class="posts-button">
                                    <a href="<?php echo esc_url($attributes['url']); ?>" class="btn">
                                        <?php echo esc_html($attributes['button']); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php } else {
                            get_template_part('template-parts/content', 'none');
                        }
                        // reset post data
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
        return ob_get_clean();
    }
endif;
?>