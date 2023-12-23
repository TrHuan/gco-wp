<?php

/**
 * @block-slug  :   lth-categories
 * @block-output:   lth_categories_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-categories/frontend_callback', 'lth_categories_output_fe', 10, 2);

if (!function_exists('lth_categories_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_categories_output_fe($output, $attributes) {
        ob_start();
?>
    <section class="entry-content lth-categories">
        <div class="container">
            <div class="row">                
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="slick-slider slick-categories">
                        <?php
                            foreach( $attributes['categories'] as $inner ) {
                                    $cat_url = $inner['category'];
                                    $cat_url_2 = explode('/', $cat_url);
                                    $cat_slug = $cat_url_2[count($cat_url_2) - 2];
                                    $cat = get_term_by( 'slug', $cat_slug, 'product_cat');
                                ?>

                                <div class="item">
                                    <article class="category">
                                        <div class="image">
                                            <a href="<?php echo $cat_url; ?>" title="">
                                                <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" width="299" height="234" alt="<?php echo $cat->name; ?>">
                                            </a>
                                        </div>

                                        <div class="content">
                                            <h3 class="name">
                                                <a href="<?php echo $cat_url; ?>" title="">
                                                    <?php echo $cat->name; ?>
                                                </a>            
                                            </h3>

                                            <div class="excerpt">
                                                <?php echo $inner['excerpt']; ?>
                                                <p><?php echo $inner['excerpt_2']; ?> <span><?php echo $inner['price']; ?></span></p>          
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php }
                        ?>
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