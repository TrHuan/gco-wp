<?php global $product; ?>

<div class="item">
	<article class="post-box">					
		<div class="post-image">
			<a href="<?php the_permalink(); ?>" title="" class="image" tabindex="0">
				<img src="<?php echo lth_custom_img('full', 220, 160);?>" alt="<?php the_title(); ?>" width="220" height="160">
			</a>
		</div>

		<div class="post-content">
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

			<ul class="post-meta">
                <li>
                    <label><?php echo __('Hãng sản xuất:'); ?></label>

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
											<?php echo $cat->name; ?>
										</a>
									<?php }
								} ?>

						    <?php }
						endif; 
					?>                  
                </li>
                <li>
                    <label><?php echo __('Phân loại:'); ?></label>

                    <?php
				        $terms = get_the_terms( $post->ID, 'product_cat' );
			 
						if ( $terms && ! is_wp_error( $terms ) ) :
						 
						    foreach ( $terms as $term ) { ?>
	 
					        	<?php if ($term->slug == 'phan-loai' ) {
					        		$parent = $term->term_id;
					        	} ?>

				        		<?php $args2 = array(
				                    'parent' => 74,
				                    'post__in' => $post->ID,
				                );
				                 
				                $cats = get_terms( 'product_cat', $args2 );

				                foreach ( $cats as $cat ) {
					                if ($cat->term_id == $term->term_id) { ?>
										<a href="<?php echo get_term_link( $cat ); ?>" title="">
											<?php echo $cat->name; ?>
										</a>
									<?php }
								} ?>

						    <?php }
						endif; 
					?>    
                </li>
            </ul>

			<div class="post-btn">
				<a href="<?php the_permalink(); ?>" rel="nofollow" class=" btn" tabindex="0"><?php echo __('Xem hàng'); ?></a>
			</div>
		</div>
	</article>
</div>