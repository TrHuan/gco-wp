<?php
/**
 * @block-slug  :   lth-brand
 * @block-output:   lth_brand_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-brand/frontend_callback', 'lth_brand_output_fe', 10, 2);

if (!function_exists('lth_brand_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_brand_output_fe($output, $attributes) {
        ob_start();
?>  
    <section class="partner-mains mb-80s wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
        <div class="container">
            <?php if ($attributes['title'] || $attributes['description'] || $attributes['categories']) : ?>
                <div class="module_header title-box">
                    <?php if (isset($attributes['title'])) : ?>
                        <h2 class="title">
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
            <div class="swiper sl-partner__mains">
                <div class="swiper-wrapper">
                    <?php foreach( $attributes['brand'] as $inner ): ?>
                        <div class="swiper-slide">
                            <div class="items-partner__mains">
                                <a href="<?php echo esc_url( $inner['url'] ); ?>" title="">
                                    <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Brand" width="120" height="50">
                                </a>
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