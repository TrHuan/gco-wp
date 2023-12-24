
<?php if( have_rows('slidershow') ): ?> 
    <section class="slider-area">
        <div class="slider-active owl-carousel">
            <?php while( have_rows('slidershow') ): the_row(); ?>
                <?php                    
                    $backgorund_image = get_sub_field('backgorund_image');
                    $image = get_sub_field('image');
                ?>

                <div class="single-slider slider-1" style="background-image: url(<?php echo $backgorund_image; ?>)">
                    <div class="container">
                        <div class="slider-content slider-animated-1">
                            <div class="slider-img text-center">
                                <img class="animated" src="<?php echo $image; ?>" alt="Slide" width="778" height="585">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="slider-social">
            <ul class="socials-box">
                <?php if( have_rows('socials', 'option') ): ?> 
                    <?php while( have_rows('socials', 'option') ): the_row(); ?>
                        <?php
                            $title = get_sub_field('title', 'option');
                            $url = get_sub_field('url', 'option');
                            $icon_image = get_sub_field('icon_image', 'option');
                            $icon_class = get_sub_field('icon_class', 'option');
                        ?>

                        <li class="<?php echo $title; ?>">
                            <a href="<?php if ($url) {echo $url;} else { echo '#';} ?>" title="Icon" target="_blank" rel="noopener">
                                <?php if ($icon_image || $icon_class) { ?>
                                    <span class="icon">
                                        <?php if ($icon_image) { ?>
                                            <img src="<?php echo $icon_image; ?>" alt="Social"  width="60" height="60">
                                        <?php } else { ?>
                                            <i class="<?php echo $icon_class; ?>"></i>
                                        <?php } ?>
                                    </span>
                                <?php } ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>


<?php if( have_rows('banner') ): ?> 
    <?php while( have_rows('banner') ): the_row(); ?>
        <div class="overview-area pt-135">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="overview-content">
                            <?php
                                $title = get_sub_field('title');
                                $text_1 = $title['text_1'];
                                $text_2 = $title['text_2'];
                                $title_2 = get_sub_field('title_2');
                                $text_3 = get_sub_field('text_3');
                                $hotline = get_sub_field('hotline');
                                $image = get_sub_field('image');
                            ?>
                            <h1><span><?php echo $text_1; ?></span> <?php echo $text_2; ?> </h1>
                            <h2><?php echo $title_2; ?></h2>
                            <p><?php echo $text_3; ?></p>
                            <div class="question-area">
                                <h4><?php echo __('Liên hệ hotline?'); ?></h4>
                                <div class="question-contact">
                                    <div class="question-icon">
                                        <i class="icofont icofont-phone"></i>
                                    </div>
                                    <div class="question-content-number">
                                        <h6> <a href="tel:<?php echo $hotline; ?>" title=""><?php echo $hotline; ?></a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="overview-img">
                            <img class="tilter" src="<?php echo $image; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php if( have_rows('products_categories') ): ?> 
<div class="banner-area pt-135 pb-120">
    <div class="container text-uppercase">
        <div class="row">
            <?php while( have_rows('products_categories') ): the_row(); ?>
                <?php
                    $category = get_sub_field('category');
                    $thumbnail_id = get_woocommerce_term_meta( $category, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                ?>
                <div class="col-md-4 col-lg-4">
                    <div class="banner-wrapper mb-30">
                        <a href="<?php echo esc_url( get_term_link( $category ) ); ?>">
                            <img src="<?php echo $image; ?>" alt="image">
                        </a>
                        <div class="banner-content">
                            <h2><?php the_sub_field('title'); ?></h2>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if( have_rows('products') ): ?>
    <?php while( have_rows('products') ): the_row(); ?>
        <?php  $terms = get_sub_field('pr_categories'); ?>

        <div class="product-area pb-190">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <h2 class="text-uppercase"><?php the_sub_field('title'); ?></h2>
                    <p><?php the_sub_field('description'); ?></p>
                </div>
                
                <div class="product-tab-list text-uppercase text-center mb-80 nav product-menu-mrg" role="tablist">
                    <?php $i = 0;
                    if( $terms ):
                        foreach( $terms as $term ): $i++; ?>
                            <a class="<?php if ($i == 1) {echo 'active';} ?>" href="#home<?php echo $i; ?>" data-toggle="tab" >
                                <h4>
                                    <?php
                                        $term_name = get_term_by( 'id', $term, 'product_cat' );

                                        if ($term_name->name == 'Xe máy') {
                                            echo __('Xe máy mới');
                                        } else {
                                            echo $term_name->name;
                                        }
                                    ?>
                                </h4>
                            </a>
                        <?php endforeach;
                    endif; ?>
                </div>

                <div class="tab-content jump">
                    <?php $j = 0;
                    if( $terms ):
                        foreach( $terms as $term_2 ): $j++; ?>
                            <div class="tab-pane <?php if ($j == 1) {echo 'active';} ?>" id="home<?php echo $j; ?>">                       

                                <?php
                                    $args = [
                                        'post_type' => 'product',
                                        'post_status' => 'publish',
                                        'order' => 'DESC',
                                        'posts_per_page' => 12,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field'    => 'term_id',
                                                'terms'    => $term_2,
                                            ),
                                        ),
                                    ];
                                    $tets = new WP_Query($args);
                                    if ($tets->have_posts()) { ?>

                                        <div class="slick-slider slick-products">
                                            <?php while ($tets->have_posts()) {
                                                $tets-> the_post(); ?>
                                                
                                                <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                                            <?php } ?>
                                        </div>
                                        
                                    <?php } 
                                    wp_reset_postdata();
                                ?>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php if( have_rows('products_new') ): ?>
    <?php while( have_rows('products_new') ): the_row(); ?>
        <div class="latest-product-area bg-img">
            <div class="container-flush">
                <div class="section-title text-center mb-50">
                    <h2 class="text-uppercase"><?php the_sub_field('title'); ?></h2>
                    <p><?php the_sub_field('description'); ?></p>
                </div>
                
                <?php if( have_rows('products') ): ?>
                    <div class="latest-product-slider owl-carousel">
                        <?php while( have_rows('products') ): the_row(); ?>
                            <?php $link = get_sub_field('link'); ?>
                            <div class="single-latest-product slider-animated-2">
                                <a href="<?php echo get_permalink($link->ID) ?>" title=""><img src="<?php the_sub_field('image'); ?>" title="" alt=""></a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php if( have_rows('products_category') ): ?>
    <?php while( have_rows('products_category') ): the_row(); ?>
        <?php  $terms = get_sub_field('pr_categories'); var_dump($terms) ?>

        <div class="accessories-area">
            <div class="container-fluid">
                <div class="section-title section-fluid text-center mb-60">
                    <h2 class="text-uppercase"><?php the_sub_field('title'); ?></h2>
                    <p><?php the_sub_field('description'); ?></p>
                </div>

                <?php if( $terms ): ?>
                    <div class="accessories-wrapper">
                        <?php
                            $args = [
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'order' => 'DESC',
                                'posts_per_page' => 12,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field'    => 'term_id',
                                        'terms'    => $terms,
                                    ),
                                ),
                            ];
                            $tets = new WP_Query($args);
                            if ($tets->have_posts()) { ?>
                                <div class="product-accessories-active owl-carousel">
                                    <?php while ($tets->have_posts()) {
                                        $tets-> the_post(); ?>
                                        <?php global $product; ?>
                                        
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="<?php the_permalink(); ?>" title="" class="image">
                                                    <img src="<?php echo lth_custom_img('full', 367, 458);?>" alt="<?php the_title(); ?>">
                                                </a>
                                                <div class="product-action">
                                                    <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
                                                         class="%s btn ajax_add_to_cart"><i class=" ti-shopping-cart"></i></a>',
                                                    esc_url( $product->add_to_cart_url() ),
                                                    esc_attr( $product->id ),
                                                    esc_attr( $product->get_sku() ),
                                                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                                                    esc_attr( $product->product_type ),
                                                    esc_html( $product->add_to_cart_text() ) ), $product ); ?>
                                                    <a class="action-reload" title="Xem chi tiết" data-toggle="modal" data-target="#exampleModal" href="#">
                                                        <i class=" ti-zoom-in"></i>
                                                    </a>
                                                </div>
                                                <div class="product-content-wrapper-2">
                                                    <div class="product-title-Giá-2 text-center">
                                                        <?php
                                                        if ($product->get_price_html()) {
                                                            echo $product->get_price_html();
                                                        } else {
                                                            echo '<span class="amount">';
                                                            echo __('Giá: Liên hệ');
                                                            echo '</span>';
                                                        }
                                                        ?>
                                                        <h4>
                                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>  
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } 
                            wp_reset_postdata();
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php if( have_rows('testimonials') ): ?>
    <?php while( have_rows('testimonials') ): the_row(); ?>
        <div class="testimonial-area">
            <div class="container">
                <div class="section-title-2 section-title-position">
                    <h2 class="text-uppercase"><?php the_sub_field('title'); ?></h2>
                </div>
                <?php if( have_rows('content') ): ?>
                    <div class="testimonial-active owl-carousel">
                        <?php while( have_rows('content') ): the_row(); ?>
                            <div class="single-testimonial">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="testimonial-img pl-75">
                                            <img alt="image" src="<?php the_sub_field('image'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="testimonial-content">
                                            <div class="testimonial-dec">
                                                <p><?php the_sub_field('evaluate'); ?></p>
                                            </div>
                                            <div class="name-designation">
                                                <h4><?php the_sub_field('name'); ?></h4>
                                                <span><?php the_sub_field('description'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php if( have_rows('blogs') ): ?>
    <?php while( have_rows('blogs') ): the_row(); ?>
        <div class="blog-area pt-150 pb-110">
            <div class="container">
                <div class="section-title text-center mb-60">
                    <h2><?php the_sub_field('title'); ?></h2>
                    <p><?php the_sub_field('description'); ?></p>
                </div>
                <?php
                    $args = [
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        // 'order_by' => 'rand',
                        'order' => 'DESC',
                        'posts_per_page' => 3,
                    ];
                    $tets = new WP_Query($args);
                    if ($tets->have_posts()) { ?>
                        <div class="row">
                            <?php while ($tets->have_posts()) {
                                $tets-> the_post(); ?>
                                
                                <div class="col-lg-4 col-md-6">
                                    <div class="blog-hm-wrapper mb-40">
                                        <div class="blog-img">
                                            <a href="<?php the_permalink(); ?>" title="" class="image">
                                                <img src="<?php echo lth_custom_img('full', 370, 250);?>" alt="<?php the_title(); ?>">
                                            </a>
                                            <div class="blog-date">
                                                <h4><?php the_time('d/m/Y'); ?></h4>
                                            </div>
                                            <div class="blog-hm-social">
                                                <?php if( have_rows('other') ): ?>
                                                    <?php while( have_rows('other') ): the_row(); ?>
                                                        <?php
                                                            $socials = get_sub_field('socials');
                                                            $link_facebook = $socials['link_facebook'];
                                                            if( $link_facebook ) {
                                                                $facebook_url = $link_facebook['url'];
                                                                $facebook_title = $link_facebook['title'];
                                                                $facebook_target = $link_facebook['target'] ? $link_facebook['target'] : '_self';
                                                            }
                                                            $link_twitter = $socials['link_twitter'];
                                                            if( $link_twitter ) {
                                                                $twitter_url = $link_twitter['url'];
                                                                $twitter_title = $link_twitter['title'];
                                                                $twitter_target = $link_twitter['target'] ? $link_twitter['target'] : '_self';
                                                            }
                                                            $link_google_plus = $socials['link_google_plus'];
                                                            if( $link_google_plus ) {
                                                                $google_plus_url = $link_google_plus['url'];
                                                                $google_plus_title = $link_google_plus['title'];
                                                                $google_plus_target = $link_google_plus['target'] ? $link_google_plus['target'] : '_self';
                                                            }
                                                        ?>
                                                        <ul>
                                                            <li><a href="<?php echo $facebook_url; ?>" target="<?php echo $facebook_target; ?>" title=""><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="<?php echo $twitter_url; ?>" target="<?php echo $twitter_target; ?>" title=""><i class="fa fa-twitter"></i></a></li>
                                                            <li><a href="<?php echo $google_plus_url; ?>" target="<?php echo $google_plus_target; ?>" title=""><i class="fa fa-google-plus"></i></a></li>
                                                        </ul>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="blog-hm-content">
                                            <h3>
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>                            
                        </div>
                    <?php }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>