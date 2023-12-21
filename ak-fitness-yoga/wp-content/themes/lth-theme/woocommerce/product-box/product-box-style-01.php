<?php global $product;
    $regular_price = $product->get_regular_price();
    $sale_price = $product->get_sale_price();
    if ($sale_price) { 
        $sale = ($regular_price - $sale_price) * 100 / $regular_price;
    }
?>

<div class="single-aboss-product">
    <div class="pro-img">
        <a href="<?php the_permalink(); ?>" title="" class="image">
            <img src="<?php echo lth_custom_img('full', 355, 355);?>" width="355" height="355" alt="<?php the_title(); ?>">
        </a>
        <span class="sticker-new"><?php echo __('new'); ?></span>
        <span class="sticker-sale">-<?php echo round($sale); ?>%</span>
        <div class="pro-actions">
            <!-- <a data-toggle="modal" data-target="#product-window" class="quick-view" href="#">Xem chi tiết</a> -->
            <?php echo do_shortcode('[yith_quick_view label="Xem chi tiết"]') ?>
            <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
            sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
                 class="%s btn ajax_add_to_cart">Thêm vào giỏ</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( $product->id ),
            esc_attr( $product->get_sku() ),
            $product->is_purchasable() ? 'add_to_cart_button' : '',
            esc_attr( $product->product_type ),
            esc_html( $product->add_to_cart_text() ) ), $product ); ?>
        </div>
    </div>
    <div class="pro-content">
        <h4>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	    		<?php the_title(); ?>
	    	</a>
        </h4>
        <p><?php echo $product->get_price_html(); ?></p>
        <div class="pro-excerpt"><?php the_excerpt(); ?></div>
    </div>
</div>