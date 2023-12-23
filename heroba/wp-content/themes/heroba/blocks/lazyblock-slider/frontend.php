<?php
/**
 * @block-slug  :   lth-slider
 * @block-output:   lth_slider_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-slider/frontend_callback', 'lth_slider_output_fe', 10, 2);

if (!function_exists('lth_slider_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_slider_output_fe($output, $attributes) {
        ob_start();
?>    
    <section class="intros-about__mains wow fadeIn p-50s mb-80s" data-wow-duration="1s" data-wow-delay="0.1s">
        <div class="content-intros__mains">
            <div class="sl-about__mains swiper">
                <div class="swiper-wrapper">
                    <?php foreach( $attributes['slider'] as $inner ): ?>
                        <div class="swiper-slide">
                            <div class="items-slides__mains">
                                <div class="row gutter-145">
                                    <div class="col-lg-6">
                                        <div class="img-intros__mains">
                                            <a href="<?php echo esc_url( $inner['url'] ); ?>" title="">
                                                <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Slide" width="861" height="861">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-intros__mains">
                                            <h3 class="fs-60s mb-10s"><?php echo $inner['text_title']; ?> </br> <?php echo $inner['text_title_2']; ?></h3>
                                            <p class="fs-32s titles-light__alls mb-50s"><?php echo $inner['text_top']; ?></p>
                                            <?php if (get_locale()=='ja') { ?>
                                                <a href="#about-mains__boxs" class="fs-25s text-after__mains"><?php echo $inner['text_bottom']; ?></a>
                                            <?php } else { ?>
                                                <a href="#about-mains__boxs" class="text-after__mains"><?php echo $inner['text_bottom']; ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php
        return ob_get_clean();
    }
endif;
?>