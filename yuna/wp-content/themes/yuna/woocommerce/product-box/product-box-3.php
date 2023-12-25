<?php global $product; ?>

<div class="item">
    <article class="sale-item">
        <figure class="text-center sale-item-img">
            <a href="<?php the_permalink(); ?>" title="" class="image" tabindex="0">
    			<img src="<?php echo lth_custom_img('full', 204, 204);?>" alt="<?php the_title(); ?>" width="204" height="204">
    		</a>
            <div class="d-flex align-items-center sale-act">
                <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                        sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
                             class="%s btn buy-btn ajax_add_to_cart">Mua ngay</a>',
                        esc_url( $product->add_to_cart_url() ),
                        esc_attr( $product->id ),
                        esc_attr( $product->get_sku() ),
                        $product->is_purchasable() ? 'add_to_cart_button' : '',
                        esc_attr( $product->product_type ),
                        esc_html( $product->add_to_cart_text() ) ), $product ); ?>

                <a href="javascript:0;" data-toggle="modal" data-target="#qv" title="Xem thêm" tabindex="0" class="btn buy-btn"><?php echo __('Chi tiết'); ?></a>
            </div>
        </figure>
        <figcaption class="sale-item-info">
            <h4 class="t4">
                <?php
    			if ($product->get_price_html()) {
    				echo $product->get_price_html();
    			} else {
    				echo '<span class="amount">';
    				echo __('Giá: Liên hệ');
    				echo '</span>';
    			}
    			?>

                 <?php
                    $regular_price = $product->get_regular_price();
                    $sale_price = $product->get_sale_price();
                ?>

                <?php if ($sale_price) { 
                    $sale = ($regular_price - $sale_price) * 100 / $regular_price;
                ?>
                    <span class="s15 float-right sale-percent"><?php echo round($sale) . '%'; ?></span>
                <?php } ?>
            </h4>
            <h3 class="s15 text-capitalize sale-item-tit">
            	<a href="<?php the_permalink(); ?>" title="" tabindex="0">
    				<?php the_title(); ?>
    			</a>  
            </h3>
            <ul class="list-unstyled d-flex align-items-center flex-wrap rate">
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
            </ul>
        </figcaption>
    </article>
</div>