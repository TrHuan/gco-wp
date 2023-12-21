<?php

/**
 * @block-slug  :   lth-productscattegories
 * @block-output:   lth_productscattegories_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-productscattegories/frontend_callback', 'lth_productscattegories_output_fe', 10, 2);

if (!function_exists('lth_productscattegories_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_productscattegories_output_fe($output, $attributes) {
        ob_start();
?>
    <?php if ($attributes['style'] == 'style-01') { ?>
        <div class="out-categorie pt-80">
            <div class="container">
                <div class="main-categorie">
                    <!-- Section Title Start -->
                    <div class="section-title text-center mb-50">
                        <h2><?php echo esc_html($attributes['title']); ?></h2>
                        <p><?php echo esc_html($attributes['description']); ?></p>
                    </div>
                    <!-- Section Title End -->
                    <!-- Categorie Activation Start -->
                    <div class="categorie-acitve owl-carousel text-center pb-80">
                        <?php foreach( $attributes['categories'] as $inner ): ?>
                            <!-- Single Categorie Start -->
                            <div class="single-categorie">
                                <div class="cat-img">
                                    <a href="<?php echo esc_url($inner['url']); ?>">
                                        <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="<?php echo $inner['cat_title']; ?>" width="121" height="121">
                                    </a>
                                </div>
                                <div class="cat-name">
                                    <a href="<?php echo esc_url($inner['url']); ?>" title=""><?php echo $inner['cat_title']; ?> <!-- <span class="cat-number">(13)</span> --></a>
                                </div>
                            </div>
                            <!-- Single Categorie End -->
                        <?php endforeach; ?>
                    </div>
                    <!-- Categorie Activation End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
    <?php } ?>
<?php
        return ob_get_clean();
    }
endif;
?>