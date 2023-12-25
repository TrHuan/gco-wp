<div class="item">
	<?php $product = wc_get_product( $post ); ?>

	<div class="single-shop-item">
        <div class="img-holder">
        	<?php if (has_post_thumbnail()) { ?>
				<div class="post-image">
		        	<a href="<?php the_permalink(); ?>" title="">
			            <img src="<?php echo lth_custom_img('full', 300, 300);?>" alt="<?php the_title(); ?>">
			        </a>

			        <?php
						$regular_price = $product->get_regular_price();
						$sale_price = $product->get_sale_price();
					?>

					<?php if ($sale_price) { 
						$sale = ($regular_price - $sale_price) * 100 / $regular_price;
					?>
						<span class="on-sale"><?php echo round($sale) . '%'; ?></span>
					<?php } ?>
		        </div>
			<?php } ?>
            
            <div class="overlay">
                <div class="box">
                    <div class="content">
                        <?php if ( $product->is_type( 'variable' ) ) { ?>
					        <a class="btn btn-read-more" href="<?php the_permalink(); ?>">
					            <span><?php echo __('Chi tiết sản phẩm'); ?></span>
					        </a>
					    <?php } else { ?>
					    	<?php if ($product->price) { ?>
						        <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
								sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
								     class="%s btn ajax_add_to_cart">Thêm vào giỏ</a>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								$product->is_purchasable() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type ),
								esc_html( $product->add_to_cart_text() ) ), $product ); ?>
							<?php } else { ?>
							    <a class="btn btn-read-more" href="<?php the_permalink(); ?>">
						            <span><?php echo __('Liên hệ'); ?></span>
						        </a>
							<?php } ?>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-holder">
            <div class="top clearfix">
                <div class="product-title pull-left">
                    <h3 class="post-name">
			    		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				    		<?php the_title(); ?>
				    	</a>    		
			    	</h3>	
                </div>
                <div class="review-box pull-right">
                    <?php get_template_part('woocommerce/loop/rating', ''); ?>

                    <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                </div>
            </div>
            <?php if ( $product->is_type( 'variable' ) ) { ?>
            	<h4><?php echo $product->get_price_html(); ?></h4>
            <?php } else { ?>
	            <?php if ($product->price) { ?>
				    <h4><?php echo $product->get_price_html(); ?></h4>
				<?php } else { ?>
				    <h4><?php echo __('Liên hệ'); ?></h4>
				<?php } ?>
			<?php } ?>
        </div>
    </div>
</div>