<?php
/**
 * @block-slug  :   lth-slider
 * @block-output:   lth_slider_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-slider/frontend_callback', 'lth_slider_output_fe', 10, 2);

if (!function_exists('lth_slider_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_slider_output_fe($output, $attributes) {
        ob_start();
?>    
    <section class="entry-content lth-slider">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 item-col-1">
                    <div class="menu-categories">
                        <div class="menu-title">                            
                            <img src="<?php echo ASSETS_URI . '/images/icon-03.png'; ?>" alt="Icon">
                            <h2><?php echo $attributes['menu']; ?></h2>
                        </div>

                        <nav>
                            <?php
                                wp_nav_menu( array(
                                        'menu'            => $attributes['menu'],
                                        'container'       => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => 'menu',
                                    )
                                );
                            ?>
                        </nav>
                    </div>
                </div>
                
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 item-col-2">
                    <div class="slick-slider slick-slidershow">
                        <?php foreach( $attributes['slider'] as $inner ): ?>
                            <div class="item">
                                <div class="slider">
                                    <div class="image">
                                        <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Slide" width="964" height="586">

                                        <?php if ($inner['video']) { ?>
                                            <a class="icon-play" href="javascript:0" title="">
                                                <i class="icon"></i>
                                            </a>

                                            <div class="video">
                                                <a class="icon-stop" href="javascript:0" title="">
                                                    <i class="fal fa-times icon"></i>
                                                </a>

                                                <?php echo $inner['video']; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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