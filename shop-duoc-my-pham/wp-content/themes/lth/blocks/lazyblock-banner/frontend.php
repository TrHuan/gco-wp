<?php

/**
 * @block-slug  :   lth-banner
 * @block-output:   lth_banner_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-banner/frontend_callback', 'lth_banner_output_fe', 10, 2);

if (!function_exists('lth_banner_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_banner_output_fe($output, $attributes) {
        ob_start();
?>
    <section class="quocte-mains wow fadeInUp " data-wow-duration="1s" data-wow-delay="0.1s">
        <div class="container">
            <div class="img-quocte__mains mb-50s">
                <img src="<?php echo esc_url( $attributes['image']['url'] ); ?>" alt="" width="w" height="h">
            </div>
            <?php if ($attributes['text_title'] || $attributes['text_title_2'] || $attributes['text_top'] || $attributes['text_bottom']) { ?>
                <div class="intro-quocte__mains fs-28s mb-50s">
                    <h2 class="title-quocte__mains  fs-56s mb-40s"><?php echo $attributes['text_title']; ?> <br> <?php echo $attributes['text_title_2']; ?></h2>
                    <p class="mb-20s"><?php echo $attributes['text_top']; ?></p>
                    <p><?php echo $attributes['text_bottom']; ?></p>
                </div>
            <?php } ?>
        </div>
    </section>

<?php
        return ob_get_clean();
    }
endif;
?>