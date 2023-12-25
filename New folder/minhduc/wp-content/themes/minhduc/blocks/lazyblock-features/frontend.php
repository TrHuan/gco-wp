<?php
/**
 * @block-slug  :   lth-features
 * @block-output:   lth_features_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-features/frontend_callback', 'lth_features_output_fe', 10, 2);

if (!function_exists('lth_features_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_features_output_fe($output, $attributes) {
        ob_start();
?>  
<article class="lth-features">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="module module_features">
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
                    
                    <div class="slick-slider slick-features">
                        <?php foreach( $attributes['features'] as $inner ): ?>
                            <div class="item">
                                <div class="content">
                                    <div class="content-image">
                                        <div class="image">
                                            <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Icon" width="28" height="25">
                                        </div>
                                    </div>

                                    <div class="content-box">
                                        <h4 class="content-name">
                                            <?php echo wpautop($inner['feature_title']); ?>
                                        </h4>
                                        <div class="content-excerpt">
                                            <?php echo wpautop($inner['feature_text']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<?php
        return ob_get_clean();
    }
endif;
?>