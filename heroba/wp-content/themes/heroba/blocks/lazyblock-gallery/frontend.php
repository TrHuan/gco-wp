<?php
/**
 * @block-slug  :   lth-gallery
 * @block-output:   lth_gallery_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-gallery/frontend_callback', 'lth_gallery_output_fe', 10, 2);

if (!function_exists('lth_gallery_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_gallery_output_fe($output, $attributes) {
        ob_start();
?>    
    <section class="favorites-mains wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
        <ul class="list-favorites__mains">
            <?php $i = 0;
            foreach( $attributes['gallery'] as $inner ):
                $i++;
                if ($i == 1 || $i % 8 == 0) { ?>
                    <li>
                        <div class="items-favorites__mains">
                            <a href="<?php echo esc_url( $inner['image']['url'] ); ?>" title="" data-fancybox="images-shows" data-caption="My caption">
                                <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Image" width="861" height="861">
                            </a>
                        </div>
                    </li>
                <?php } else {
                    if ($i % 2 == 0) { ?>
                        <li>
                    <?php } ?>
                        <div class="items-favorites__mains">
                            <a href="<?php echo esc_url( $inner['image']['url'] ); ?>" title="" data-fancybox="images-shows" data-caption="My caption">
                                <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Image" width="861" height="861">
                            </a>
                        </div>
                    <?php if ($i % 2 != 0) { ?>
                        </li>
                    <?php }
                } ?>
            <?php endforeach; ?>
        </ul>
        <ul class="bottom-favorite__mains">
            <?php foreach( $attributes['favorite'] as $inner ): ?>
                <li>
                    <a href="<?php echo esc_url( $inner['favorite_url'] ); ?>" title="">
                        <?php echo $inner['favorite_text']; ?>
                        <?php if ($inner['favorite_image']) { ?>
                            <img src="<?php echo esc_url( $inner['favorite_image']['url'] ); ?>" alt="Favorite">
                        <?php }?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php
        return ob_get_clean();
    }
endif;
?>