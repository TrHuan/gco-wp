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
<div class="testemonials-pages">
    <div class="container">
        <div class="row gutter-145 mb-50s">
            <?php foreach( $attributes['features'] as $inner ): ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="items-testemonials__pages">
                    <p class="numbers-items__testemonials titles-light__alls fs-72s"><?php echo $inner['feature_number']; ?></p>
                    <p class="fs-24s titles-thin__alls"><?php echo $inner['feature_text']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <a href="<?php echo esc_url($attributes['url']); ?>" class="btn-more__testemonials fs-24s">
            <?php echo $attributes['url_text']; ?> ->
        </a>
    </div>
</div>
<?php
        return ob_get_clean();
    }
endif;
?>