<?php
/**
 * @block-slug  :   lth-why-choose
 * @block-output:   lth_why_choose_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-why-choose/frontend_callback', 'lth_why_choose_output_fe', 10, 2);

if (!function_exists('lth_why_choose_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_why_choose_output_fe($output, $attributes) {
        ob_start();
?>  
<section class="why-choose__about mb-80s">
    <div class="container">
        <?php if ($attributes['title'] || $attributes['description']) : ?>
            <div class="module_header title-box">
                <?php if (isset($attributes['title'])) : ?>
                    <h2 class="titles-choose__about titles-medium__alls text-color__blues mb-70s fs-30s">
                        <?php if ($attributes['url']) : ?> 
                            <a href="<?php echo esc_url($attributes['url']); ?>" title="">
                        <?php endif; ?>
                            <?php echo wpautop(esc_html($attributes['title'])); ?>
                        <?php if ($attributes['url']) : ?> 
                            </a>
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

        <div class="list-why__choose mb-55s wow fadeInTop" data-wow-duration="1s" data-wow-delay="0.1s">
            <div class="row gutter-70">
                <?php foreach( $attributes['features'] as $inner ): ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="items-why__chooes">
                            <div class="tops-why__choose mb-15s">
                                <?php if ($inner['image']) { ?>
                                    <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Icon" width="28" height="25">
                                <?php } else { ?>
                                    <i class="<?php echo $inner['feature_class_icon']; ?>" aria-hidden="true"></i>
                                <?php } ?>
                                <div class="fs-24s titles-medium__alls"><?php echo wpautop($inner['feature_title']); ?></div>
                            </div>
                            <?php echo wpautop($inner['feature_text']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="img-why__chooses mb-50s wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
            <img src="<?php echo esc_url( $attributes['image_banner']['url'] ); ?>" alt="">
        </div>
    </div>
</section>
<?php
        return ob_get_clean();
    }
endif;
?>