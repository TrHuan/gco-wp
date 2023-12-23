<?php

/**
 * @block-slug  :   lth-faq
 * @block-output:   lth_faq_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-faq/frontend_callback', 'lth_faq_output_fe', 10, 2);

if (!function_exists('lth_faq_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_faq_output_fe($output, $attributes) {
        ob_start();
?>

<section class="content-faq__pages mt-70s mb-150s">
    <div class="container">
        <h2 class="fs-60s mb-80s titles-center__alls "><?php echo esc_html($attributes['title']); ?></h2>
        <div class="list-faqs__pages">
             <?php foreach( $attributes['faq'] as $inner ): ?>
                <?php if ($inner['faq_title']) { ?>
                    <div class="items-faqs__pages wow fadeInLeft mb-50s" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h3 class="fs-32s mb-30s titles-faq__pages">- <?php echo $inner['faq_title']; ?></h3>
                        <div class="text-faq__details">
                            <?php echo wpautop($inner['faq_content']); ?>
                            <?php if ($inner['faq_url_text']) { ?>
                                <a href="<?php echo esc_url($attributes['faq_url']); ?>" class="btn-see__faqs fs-28s"><?php echo $inner['faq_url_text']; ?> -></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
        return ob_get_clean();
    }
endif;
?>