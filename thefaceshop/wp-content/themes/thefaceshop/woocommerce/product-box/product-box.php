<?php global $product; ?>

<!-- Single Product Start -->
<div class="single-aboss-product">
    <div class="pro-img">
        <a href="<?php the_permalink(); ?>" title="" class="image">
            <img src="<?php echo lth_custom_img('full', 232, 232);?>" alt="<?php the_title(); ?>">
        </a>
        <?php
        	if (get_the_date('d/m/Y') > date('d/m/Y', strtotime(' -3 days'))) {
        ?>
        	<span class="sticker-new"><?php echo __('new'); ?></span>
        <?php } ?>
        <?php
			$regular_price = $product->get_regular_price();
			$sale_price = $product->get_sale_price();
		?>

		<?php if ($sale_price) { 
			$sale = ($regular_price - $sale_price) * 100 / $regular_price;
		?>
			<span class="sticker-sale"><?php echo round($sale) . '%'; ?></span>
		<?php } ?>
        <div class="pro-actions">
            <!-- a data-toggle="modal" data-target="#product-window" class="quick-view" href="#">Xem chi tiết</a> -->
            <!-- <a class="btn btn-read-more" href="<?php the_permalink(); ?>">
	            <span><?php // echo __('Xem chi tiết'); ?></span>
	        </a> -->

	        <?php echo do_shortcode('[yith_quick_view product_id=esc_attr( $product->id ) type="button"]'); ?>

            <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
			sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
			     class="%s btn ajax_add_to_cart">Cho vào giỏ hàng</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( $product->id ),
			esc_attr( $product->get_sku() ),
			$product->is_purchasable() ? 'add_to_cart_button' : '',
			esc_attr( $product->product_type ),
			esc_html( $product->add_to_cart_text() ) ), $product ); ?>
        </div>
    </div>
    <div class="pro-content">
        <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
        <p class="pro-price">
        	<?php
			if ($product->get_price_html()) {
				echo $product->get_price_html();
			} else {
				echo '<span class="amount">';
				echo __('Giá: Liên hệ');
				echo '</span>';
			}
			?>
        </p>
    </div>
</div>
<!-- Single Product End -->