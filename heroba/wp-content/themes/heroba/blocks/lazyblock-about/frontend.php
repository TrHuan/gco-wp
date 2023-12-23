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

    <section class="about-mains wow fadeInUp mb-50s" data-wow-duration="1s" data-wow-delay="0.1s" id="about-mains__boxs">
        <div class="container">
            <h2 class="fs-32s mb-40s text-about__mains"><?php echo esc_html($attributes['title']); ?> <br>
                <?php echo esc_html($attributes['title_2']); ?>
            </h2>
            <div class="row gutter-60 mb-20s">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <ul class="list-about__mains">
                        <?php foreach( $attributes['banner_left'] as $inner_left ): ?>
                            <li>
                                <div class="items-about__mains">
                                    <p class="number-about__mains fs-70s"><?php echo $inner_left['text_number']; ?></p>
                                    <div class="intros-about__mains">
                                        <h3 class="names-about__mains fs-24s"><?php echo $inner_left['text_top']; ?></h3>
                                        <p><?php echo $inner_left['text_bottom']; ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class=" col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="img-about__mains">
                        <img src="<?php echo esc_url( $attributes['image']['url'] ); ?>" alt="" width="w" height="h">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <ul class="list-about__mains">
                        <?php foreach( $attributes['banner_right'] as $inner_right ): ?>
                            <li>
                                <div class="items-about__mains">
                                    <p class="number-about__mains fs-70s"><?php echo $inner_right['text_number']; ?></p>
                                    <div class="intros-about__mains">
                                        <h3 class="names-about__mains fs-24s"><?php echo $inner_right['text_top']; ?></h3>
                                        <p><?php echo $inner_right['text_bottom']; ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <?php if ($attributes['url_text']) : ?>
                <a href="<?php echo esc_url($attributes['url']); ?>" class="btn-see__next fs-25s">
                    <?php echo $attributes['url_text']; ?> &rarr;
                </a>
            <?php endif; ?>
        </div>
    </section>

<?php
        return ob_get_clean();
    }
endif;
?>