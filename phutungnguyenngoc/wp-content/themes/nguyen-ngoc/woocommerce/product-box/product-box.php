<?php global $product; ?>

<div class="product-wrapper-bundle">
    <div class="product-wrapper">
        <div class="product-img">
            <a href="<?php the_permalink(); ?>" title="" class="image">
	            <img src="<?php echo lth_custom_img('full', 367, 458);?>" alt="<?php the_title(); ?>">
	        </a>

            <div class="product-item-dec">                
	            <?php if( have_rows('other') ): ?>
	                <?php while( have_rows('other') ): the_row();
	                	the_sub_field('product_description');
	                endwhile; ?>
	            <?php endif; ?>
            </div>
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

                <?php echo do_shortcode('[yith_quick_view label="Quick View"]'); ?>
            </div>
            <div class="product-content-wrapper">
                <div class="product-title-spreed">
                    <h4>
                    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				    		<?php the_title(); ?>
				    	</a>  
                    </h4>
                    <span><?php echo $product->get_sku(); ?></span>
                </div>
                <div class="product-Giá">
                    <?php
					if ($product->get_price_html()) {
						echo $product->get_price_html();
					} else {
						echo '<span class="amount">';
						echo __('Giá: Liên hệ');
						echo '</span>';
					}
					?>
                </div>
            </div>
        </div>

        <div class="product-list-details">
            <h2>
            	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a> 
            </h2>
            <div class="product-price">
                <?php
				if ($product->get_price_html()) {
					echo $product->get_price_html();
				} else {
					echo '<span class="amount">';
					echo __('Giá: Liên hệ');
					echo '</span>';
				}
				?>
            </div>

            <?php echo $product->get_short_description(); ?>

            <div class="shop-list-cart">
                <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
					sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
					     class="%s btn ajax_add_to_cart"><i class=" ti-shopping-cart"></i> Thêm vào giỏ hàng</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( $product->id ),
					esc_attr( $product->get_sku() ),
					$product->is_purchasable() ? 'add_to_cart_button' : '',
					esc_attr( $product->product_type ),
					esc_html( $product->add_to_cart_text() ) ), $product ); ?>
            </div>
        </div>
    </div>
</div>