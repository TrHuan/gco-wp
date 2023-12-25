<?php

/**
 * @block-slug  :   lth-project
 * @block-output:   lth_project_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-project/frontend_callback', 'lth_project_output_fe', 10, 2);

if (!function_exists('lth_project_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_project_output_fe($output, $attributes) {
        ob_start();
?>
 <section class="project-mains mb-100s wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
    <div class="container">
        <?php if ($attributes['title'] || $attributes['description'] || $attributes['categories']) : ?>
            <div class="module_header title-box">
                <?php if (isset($attributes['title'])) : ?>
                    <h2 class="title fs-40s title-after__mains titles-bold__alls text-color__blues mb-80s">
                        <?php if ($attributes['url']) : ?> 
                            <a href="<?php echo esc_url($attributes['url']); ?>" title="">
                        <?php else : ?>
                            <span>
                        <?php endif; ?>
                            <?php echo wpautop(esc_html($attributes['title'])); ?>
                        <?php if ($attributes['url']) : ?> 
                            </a>
                        <?php else : ?>
                            </span>
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

        <?php
            $i = 0;
            foreach( $attributes['categories'] as $inner ) {
                $i++;
                if ($i == '1') {
                    $cat = $inner['category'];
                }
            }

            $args = [
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => $cat,
                'posts_per_page' => $attributes['post_number'],
                'orderby' => $attributes['orderby'],
                'order' => $attributes['order'],
            ];
            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) { ?>

                <div class="row gutter-12 mb-55s">

                    <?php while ($wp_query->have_posts()) {
                        $wp_query-> the_post(); ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <?php //load file tương ứng với post format
                                get_template_part('template-parts/project/content', '');
                            ?>
                        </div>
                    <?php } ?>

                </div>
                
                <?php if ($attributes['button']) : ?>
                    <a href="<?php echo esc_url($attributes['url_button']); ?>" class="btn-greys__trans">
                        <?php echo esc_html($attributes['button']); ?> <img src="<?php echo ASSETS_URI; ?>/images/arrow-black-1.png" alt="">
                    </a>
                <?php endif; ?>
            <?php } else {
                get_template_part('template-parts/content', 'none');
            }
            // reset post data
            wp_reset_postdata();
        ?>   
    </div>
</section>
<?php
        return ob_get_clean();
    }
endif;
?>