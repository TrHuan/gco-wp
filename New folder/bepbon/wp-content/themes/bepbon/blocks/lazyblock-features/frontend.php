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
<section class="lth-features">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if ($attributes['title'] || $attributes['description']) : ?>
                    <div class="entry-header">
                        <?php if ($attributes['title']) : ?>
                            <h2 class="title">
                                <?php if ($attributes['url']) : ?> 
                                    <a href="<?php echo esc_url($attributes['url']); ?>" title="">
                                <?php else : ?>
                                    <span>
                                <?php endif; ?>
                                    <?php echo esc_html($attributes['title']); ?>
                                <?php if ($attributes['url']) : ?> 
                                    </a>
                                <?php else : ?>
                                    </span>
                                <?php endif; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($attributes['description']) : ?>
                            <div class="infor">
                                <p><?php echo esc_html($attributes['description']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <div class="slick-slider slick-features">
                        <?php foreach( $attributes['features'] as $inner ): ?>
                            <div class="item">                
                                <div class="feature">
                                    <div class="image">
                                        <?php if ($inner['image']) { ?>
                                            <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Feature" width="" height="">
                                        <?php } else { ?>
                                            <i class="<?php echo $inner['feature_class_icon']; ?> icon"></i>
                                        <?php } ?>
                                    </div>
                                    <div class="content">
                                        <h4 class="text-1"><?php echo $inner['feature_title']; ?></h4>
                                        <p class="text-2"><?php echo $inner['feature_description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
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