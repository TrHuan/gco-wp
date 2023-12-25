<?php

/**
 * @block-slug  :   lth-about
 * @block-output:   lth_about_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-about/frontend_callback', 'lth_about_output_fe', 10, 2);

if (!function_exists('lth_about_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_about_output_fe($output, $attributes) {
        ob_start();
?>
    <section class="about-mains wow fadeIn mb-200s">
        <div class="container">
            <div class="row gutter-50">
                <div class="col-lg-6">
                    <div class="img-about__mains wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
                        <img src="<?php echo esc_url( $attributes['image']['url'] ); ?>" alt="Image" width="547" height="547">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="intros-about__mains wow fadeInright" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="text-oranges fs-18s mb-10s"> <?php echo wpautop($attributes['text_top']); ?> </div>
                        <h2 class="fs-40s title-after__mains mb-55s"><span class="titles-bold__alls text-color__blues"><?php echo $attributes['title']; ?></span> <?php echo $attributes['title_2']; ?></h2>
                        <div class="mb-30s"><?php echo wpautop($attributes['text_bottom']); ?></div>
                        <ul class="number-mains">
                            <?php foreach( $attributes['numbers'] as $inner ): ?>
                            <li>
                                <div class="items-about__mains">
                                    <p class="fs-40s text-color__blues titles-medium__alls mb-10s"><span class="number-ups"><?php echo  $inner['number']; ?></span> +</p>
                                    <p class="fs-15s titles-medium__alls"><?php echo  $inner['text']; ?></p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
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