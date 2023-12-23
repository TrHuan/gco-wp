<?php global $product; ?>

<div class="item">
	<article class="post-box">					
		<div class="post-image">
			<a href="<?php the_permalink(); ?>" title="" class="image" tabindex="0">
				<img src="<?php echo lth_custom_img('full', 220, 160);?>" alt="<?php the_title(); ?>" width="220" height="160">
			</a>
		</div>

		<div class="post-content">
			<div class="post-trademark">
		    	<?php $terms_child = get_sub_field('category_child');
					if( $terms_child ) { $j;
						foreach( $terms_child as $term_child ){ $j++;
							if ($j == 1) {
								$term_child_id = $term_child->term_id;
							}
						}
					}
				?>

				<?php
			        $terms = get_the_terms( $post->ID, 'product_cat' );
		 
					if ( $terms && ! is_wp_error( $terms ) ) :
					 
					    foreach ( $terms as $term ) { 
					    	if ($term->term_id == $term_child_id) { ?>
					    		<a href="<?php echo get_term_link( $term ); ?>" title="">
						        	<?php	
										$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
										$image = wp_get_attachment_url( $thumbnail_id );
										if ($image) { ?>
											<img src="<?php echo $image; ?>" alt="Trademark" width="120" height="51">
										<?php } else {
											echo $term->name;
										}
									?>
								</a>
						    <?php }
						}
					endif; 
				?>
			</div>

			<h3 class="post-name">
				<a href="<?php the_permalink(); ?>" title="" tabindex="0">
					<?php the_title(); ?>
				</a> 		
			</h3>

			<div class="star-rating">
			    <div style="display: inline-block;">
			    	<span style="width: 100%; overflow: hidden; white-space: nowrap; display: inline-block;">
			    		<span class="icofont-star icon"></span>
			    		<span class="icofont-star icon"></span>
			    		<span class="icofont-star icon"></span>
			    		<span class="icofont-star icon"></span>
			    		<span class="icofont-star icon"></span>
			    	</span>
			    </div>

			    <span class="star-text"><?php echo __('(5 đánh giá)') ?></span>
		    </div>

			<div class="post-price">
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

			<div class="post-btn">
				<a href="<?php the_permalink(); ?>" rel="nofollow" class="btn" tabindex="0"><?php echo __('Xem hàng'); ?></a>

				<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
					sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
					     class="%s btn ajax_add_to_cart">Mua hàng</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( $product->id ),
					esc_attr( $product->get_sku() ),
					$product->is_purchasable() ? 'add_to_cart_button' : '',
					esc_attr( $product->product_type ),
					esc_html( $product->add_to_cart_text() ) ), $product ); ?>
			</div>
		</div>
	</article>
</div>