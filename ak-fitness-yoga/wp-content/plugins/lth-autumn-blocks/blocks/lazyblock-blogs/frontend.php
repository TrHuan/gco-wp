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

<?php
    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => $attributes['categories'],
        'posts_per_page' => $attributes['post_number'],
        'orderby' => $attributes['orderby'],
        'order' => $attributes['order'],
    ];
    $wp_query = new WP_Query($args);
    if ($wp_query->have_posts()) { ?>
        <?php if ($attributes['style'] == 'style-01') { ?>
            <div class="blog-area">
                <div class="container">
                    <div class="main-blog-area pb-80">
                        <!-- Section Title Start -->
                        <div class="section-title text-center mb-50">
                            <h2><?php echo esc_html($attributes['title']); ?></h2>
                            <p><?php echo esc_html($attributes['description']); ?></p>
                        </div>
                        <!-- Section Title End -->
                        <!-- Blog Activation Start -->
                        <div class="blog-activation blog-entry-meta-two owl-carousel">
                            <?php while ($wp_query->have_posts()) {
                                $wp_query-> the_post();
                                //load file tương ứng với post format
                                get_template_part('template-parts/post/content', $attributes['style']);
                            } ?>
                        </div>
                        <!-- Blog Activation End -->
                    </div>
                </div>
                <!-- Container End -->
            </div>
        <?php } elseif ($attributes['style'] == 'style-02') { ?>
            <div class="recent-post mb-60">
                <h3 class="sidebar-header"><?php echo esc_html($attributes['title']); ?></h3>
                <div class="all-recent-post">
                    <?php while ($wp_query->have_posts()) {
                        $wp_query-> the_post();
                        //load file tương ứng với post format
                        get_template_part('template-parts/post/content', $attributes['style']);
                    } ?>
                </div>
            </div>
        <?php } ?>
    <?php } else {
        get_template_part('template-parts/content', 'none');
    }
    // reset post data
    wp_reset_postdata();
?>

<?php
        return ob_get_clean();
    }
endif;
?>