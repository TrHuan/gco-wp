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
				<?php
			        $terms = get_the_terms( $post->ID, 'product_cat' );
		 
					if ( $terms && ! is_wp_error( $terms ) ) :
					 
					    foreach ( $terms as $term ) { ?>
 
				        	<?php if ($term->slug == 'thuong-hieu' ) {
				        		$parent = $term->term_id;
				        	} ?>

			        		<?php $args2 = array(
			                    'parent' => 31,
			                    'post__in' => $post->ID,
			                );
			                 
			                $cats = get_terms( 'product_cat', $args2 );

			                foreach ( $cats as $cat ) {
			                	if ($cat->term_id == $term->term_id) { ?>
				                	<a href="<?php echo get_term_link( $cat ); ?>" title="">
										<?php $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
										$image = wp_get_attachment_url( $thumbnail_id );
										if ($image) { ?>
											<img src="<?php echo $image; ?>" alt="Trademark" width="120" height="51">
										<?php } else {
											echo $cat->name;
										} ?>
									</a>
								<?php }
							} ?>

					    <?php }
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

			<div class="post-donate">
				<label><?php echo __('Quà tặng'); ?></label>

				<div class="post-box">
					<?php
					$products = get_field('product');
					if( $products ): ?>					
						<div class="post-image">
							<a href="<?php the_permalink($products->ID); ?>" title="" class="image" tabindex="0">
								<?php $featured_img_url = get_post_thumbnail_id( $products->ID ); ?>

								<img src="<?php echo wp_get_attachment_image_url( $featured_img_url, 'thumbnail' ); ?>" width="75" height="54" alt="<?php echo $products->post_title; ?>">
							</a>
						</div>

						<div class="post-content">
							<h3 class="post-name">
								<a href="<?php the_permalink($products->ID); ?>" title="" tabindex="0">
									<?php echo $products->post_title; ?>
								</a>   		
							</h3>

							<div class="post-price">
								<label><?php echo __('Trị giá:'); ?></label>
								<?php
									$products_price = wc_get_product($products->ID);
									echo $products_price->get_price_html();
								?>
							</div>	
						</div>
					<?php endif; ?>		
				</div>
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