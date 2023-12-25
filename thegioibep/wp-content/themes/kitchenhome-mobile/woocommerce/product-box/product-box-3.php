<?php global $product; ?>

<div class="items-prd__groups">
    <div class="img-prds__groups">
        <a href="<?php the_permalink(); ?>" title="" class="image" tabindex="0">
			<img src="<?php echo lth_custom_img('full', 220, 220);?>" alt="<?php the_title(); ?>" width="220" height="220">
		</a>
    </div>
    <div class="intros-prds__groups">
        <div class="logos-producer__prds mb-15s">
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
        <h3>
        	<a href="<?php the_permalink(); ?>" title="" tabindex="0" class="names-prds__groups mb-10s">
				<?php the_title(); ?>
			</a>
    	</h3>
        <?php get_template_part('woocommerce/loop/rating', '2'); ?>
        <div class="price-prds__groups fs-18s">
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
    <div class="gift-prds__groups">
        <div class="tag-gift__prds mb-5s">
            <p><?php echo __('Quà tặng'); ?></p>
        </div>
        <?php
		$products = get_field('product');
		if( $products ): ?>
	        <a href="<?php the_permalink($products->ID); ?>" title="" tabindex="0" class="names-gilf__groups mb-5s">
				<?php echo $products->post_title; ?>
			</a>
	        <p class="price-gilf__groups mb-20s"><?php echo __('Trị giá:'); ?> <span class="numers-price__gilf"><?php
						$products_price = wc_get_product($products->ID);
						echo $products_price->get_price_html();
					?></span></p>
        <?php endif; ?>
    </div>
    <a href="<?php the_permalink(); ?>" rel="nofollow" class="btn btn-dacks__alls" tabindex="0"><?php echo __('Xem chi tiết'); ?></a>
</div>