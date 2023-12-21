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

<?php if ($attributes['style'] == 'style-01') { ?>
    <div class="online-support support-styel-two">
        <div class="container">
            <div class="row">
                <?php foreach( $attributes['features'] as $inner ): ?>
                    <!-- Single Support Start -->
                    <div class="col-lg-4">
                        <div class="single-support mb-all-30">
                            <div class="support-img">
                                <?php if ($inner['image']) { ?>
                                    <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Feature" width="60" height="60">
                                <?php } else { ?>
                                    <i class="<?php echo $inner['feature_class_icon']; ?> icon"></i>
                                <?php } ?>
                            </div>
                            <div class="support-desc">
                                <h4><?php echo $inner['feature_title']; ?></h4>
                                <p><?php echo $inner['feature_description']; ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Support End -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php
        return ob_get_clean();
    }
endif;
?>