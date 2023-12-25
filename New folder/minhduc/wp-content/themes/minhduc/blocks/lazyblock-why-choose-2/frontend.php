<?php
/**
 * @block-slug  :   lth-why-choose-2
 * @block-output:   lth_why_choose_2_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-why-choose-2/frontend_callback', 'lth_why_choose_2_output_fe', 10, 2);

if (!function_exists('lth_why_choose_2_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_why_choose_2_output_fe($output, $attributes) {
        ob_start();
?>  
 <section class="why-sevice__events mb-70s">
    <div class="container">
        <?php if (isset($attributes['title'])) : ?>
            <h2 class="title-after__mains text-color__blues mb-25s fs-40s">
                <?php if ($attributes['url']) : ?> 
                    <a href="<?php echo esc_url($attributes['url']); ?>" title="">
                <?php endif; ?>
                    <?php echo esc_html($attributes['title']); ?> <br> <span class="titles-bold__alls"><?php echo esc_html($attributes['title_2']); ?></span>
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
        <div class="row">
            <?php $i; foreach( $attributes['features'] as $inner ): $i++; ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="items-why__events fs-18s">
                        <div class="tops-why__events mb-25s">
                            <p class="number-why__events titles-bold__alls"><?php echo $i; ?></p>
                            <div class="titles-medium__alls text-color__blues fs-16s titles-why__events"><?php echo wpautop($inner['feature_title']); ?></div>
                        </div>
                        <div class="intros-why__events">
                            <?php echo wpautop($inner['feature_text']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
        return ob_get_clean();
    }
endif;
?>