<?php global $product; ?>


    <div class="product">
    	<?php if (has_post_thumbnail()) { ?>
        	<div class="relative product-relative">        	
	            <a class="product-link" href="<?php the_permalink(); ?>">
					<img src="<?php echo lth_custom_img('full', 160, 160); ?>" alt="<?php the_title(); ?>" width="160" height="160">
				</a>
            
	            <div class="product-action">
	                <?php if ( $product->is_type( 'variable' ) ) { ?>
				        <a href="<?php the_permalink(); ?>" title="Chi tiết"><i class="fa fa-eye"></i></a>
				    <?php } else { ?>
				        <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
						     class="%s ajax_add_to_cart"><i class="fa fa-shopping-bag"></i></a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						$product->is_purchasable() ? 'add_to_cart_button' : '',
						esc_attr( $product->product_type ),
						esc_html( $product->add_to_cart_text() ) ), $product ); ?>

				        <a href="<?php the_permalink(); ?>" title="Chi tiết"><i class="fa fa-eye"></i></a>
					<?php } ?>
	            </div>
	        </div>
	    <?php } ?>

        <div class="product-text">
            <p><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a> </p>
            <p class="price"><?php echo $product->get_price_html(); ?></p>
        </div>
    </div>