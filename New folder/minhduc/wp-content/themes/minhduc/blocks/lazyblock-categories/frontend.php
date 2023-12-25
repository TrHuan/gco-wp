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
    <section class="sevice-mains wow fadeIn p-100s mb-100s" data-wow-duration="1s" data-wow-delay="0.1s">
        <div class="container">
            <?php if ($attributes['title'] || $attributes['description'] || $attributes['categories']) : ?>
                <div class="module_header title-box">
                    <?php if (isset($attributes['title'])) : ?>
                        <h2 class="fs-40s title-after__mains titles-bold__alls mb-80s">
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

            <div class="slide-sevice__mains mb-100s">
                <div class="sl-sevice__mains swiper">
                    <div class="swiper-wrapper">

                        <?php foreach( $attributes['categories'] as $inner ) {
                            $cat_url = $inner['category'];
                            $cat_url_2 = explode('/', $cat_url);
                            $cat_slug = $cat_url_2[count($cat_url_2) - 2];
                            $cat = get_term_by( 'slug', $cat_slug, 'category');

                            $cat_url_2 = $inner['category_2'];
                            $cat_url_2_2 = explode('/', $cat_url_2);
                            $cat_slug_2 = $cat_url_2_2[count($cat_url_2_2) - 2];
                            $cat_2 = get_term_by( 'slug', $cat_slug_2, 'category');

                            $cat_url_3 = $inner['category_3'];
                            $cat_url_3_2 = explode('/', $cat_url_3);
                            $cat_slug_3 = $cat_url_3_2[count($cat_url_3_2) - 2];
                            $cat_3 = get_term_by( 'slug', $cat_slug_3, 'category');

                            $cat_url_4 = $inner['category_4'];
                            $cat_url_4_2 = explode('/', $cat_url_4);
                            $cat_slug_4 = $cat_url_4_2[count($cat_url_4_2) - 2];
                            $cat_4 = get_term_by( 'slug', $cat_slug_4, 'category'); ?>

                            <div class="swiper-slide">                            
                                <div class="groups-sevice__mains">
                                    <div class="mains-col__sevices">
                                        <div class="items-sevice__mains ">
                                            <a href="<?php echo $cat_url; ?>" title="" class="img-sevice__mains">
                                                <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" width="" height="" alt="<?php echo $cat->name; ?>">
                                            </a>
                                            <a href="<?php echo $cat_url; ?>" title="" class="names-sevice__mains fs-17s titles-medium__alls">
                                                <?php echo $inner['title_cat']; ?>
                                            </a> 
                                        </div>
                                    </div>    
                                    <div class="mains-col__sevices">
                                        <div class="items-sevice__mains ">
                                            <a href="<?php echo $cat_url_2; ?>" title="" class="img-sevice__mains">
                                                <img src="<?php echo esc_url( $inner['image_2']['url'] ); ?>" width="" height="" alt="<?php echo $cat_2->name; ?>">
                                            </a>
                                            <a href="<?php echo $cat_url_2; ?>" title="" class="names-sevice__mains fs-17s titles-medium__alls">
                                                <?php echo $inner['title_cat_2']; ?>
                                            </a> 
                                        </div>
                                    </div>  
                                    <div class="mains-col__sevices">
                                        <div class="items-sevice__mains ">
                                            <a href="<?php echo $cat_url_3; ?>" title="" class="img-sevice__mains">
                                                <img src="<?php echo esc_url( $inner['image_3']['url'] ); ?>" width="" height="" alt="<?php echo $cat_3->name; ?>">
                                            </a>
                                            <a href="<?php echo $cat_url_3; ?>" title="" class="names-sevice__mains fs-17s titles-medium__alls">
                                                <?php echo $inner['title_cat_3']; ?>
                                            </a> 
                                        </div>
                                    </div>  
                                    <div class="mains-col__sevices">
                                        <div class="items-sevice__mains ">
                                            <a href="<?php echo $cat_url_4; ?>" title="" class="img-sevice__mains">
                                                <img src="<?php echo esc_url( $inner['image_4']['url'] ); ?>" width="" height="" alt="<?php echo $cat_4->name; ?>">
                                            </a>
                                            <a href="<?php echo $cat_url_4; ?>" title="" class="names-sevice__mains fs-17s titles-medium__alls">
                                                <?php echo $inner['title_cat_4']; ?>
                                            </a> 
                                        </div>
                                    </div>                    
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="group-btns__showss">
                    <div class="showss-button-prev"><img src="<?php echo ASSETS_URI; ?>/images/next-sevice-mains.png" alt=""></div>
                    <div class="showss-button-next"><img src="<?php echo ASSETS_URI; ?>/images/next-sevice-mains.png" alt=""></div>
                </div>
            </div>
        </div>
    </section>
<?php
        return ob_get_clean();
    }
endif;
?>