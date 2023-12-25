<?php global $product;

    $regular_price = $product->get_regular_price();
    $sale_price = $product->get_sale_price();

    $sale = ($regular_price - $sale_price) * 100 / $regular_price;

    $date_ceart =  get_the_date('Ymd');
    $date = date('Ymd');
    $new = $date - $date_ceart;
?>

<div class="single-makal-product">    
    <div class="pro-img">
        <a href="<?php the_permalink(); ?>" title="" class="">
            <img src="<?php echo lth_custom_img('full', 350, 424);?>" width="350" height="424" alt="<?php the_title(); ?>">
        </a>
        <?php if ($new <= 3) { ?>
            <span class="sticker-new">new</span>
        <?php } ?>
        <span class="sticker-sale">-<?php echo round($sale); ?>%</span>
        <div class="quick-view-pro">
            <a data-toggle="modal" data-target="#product-window" class="quick-view" href="#"></a>
            
            <?php echo do_shortcode('[yith_quick_view label="Xem chi tiết"]') ?>
        </div>
    </div>

    <div class="pro-content">
        <h4 class="pro-title">
            <a href="<?php the_permalink(); ?>" title="">
                <?php the_title(); ?>
            </a>
        </h4>
        <div class="price"><?php echo $product->get_price_html(); ?></div>
        <div class="excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="pro-actions">
            <div class="actions-primary">
                <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
                         class="%s btn ajax_add_to_cart add-to-cart">Thêm vào giỏ</a>',
                    esc_url( $product->add_to_cart_url() ),
                    esc_attr( $product->id ),
                    esc_attr( $product->get_sku() ),
                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                    esc_attr( $product->product_type ),
                    esc_html( $product->add_to_cart_text() ) ), $product ); ?>
            </div>
            <div class="actions-secondary">
                <?php get_template_part('woocommerce/loop/rating', ''); ?>
            </div>
        </div>
    </div>
</div>