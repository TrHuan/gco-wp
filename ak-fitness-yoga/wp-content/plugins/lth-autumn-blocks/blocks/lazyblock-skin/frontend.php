<?php

/**
 * @block-slug  :   lth-skin
 * @block-output:   lth_skin_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-skin/frontend_callback', 'lth_skin_output_fe', 10, 2);

if (!function_exists('lth_skin_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_skin_output_fe($output, $attributes) {
        ob_start();
?>

    <?php if ($attributes['style'] == 'style-01') { ?>
        <div class="skill-area white-bg ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-content mb-all-40">
                           <!-- Section Title Start -->
                            <div class="section-title section-heading">
                                <h1><span><?php echo esc_html($attributes['title']); ?></span></h1>
                            </div>
                            <!-- Section Title End -->
                            <p><?php echo esc_html($attributes['description']); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="skill-content">
                            <div class="skill">
                                <?php foreach( $attributes['skin'] as $inner ): ?>
                                <div class="progress">
                                    <div class="lead"><?php echo $inner['skin_title']; ?></div>
                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?php echo $inner['skin_content']; ?>%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="90%" class="progress-bar wow fadeInLeft animated"><span><?php echo $inner['skin_content']; ?>%</span></div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<?php
        return ob_get_clean();
    }
endif;
?>