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

			<div class="post-donate">
				<?php
				$product = get_field('product');
				if( $product ): ?>
				    <span><?php echo __('Tặng:'); ?> <a href="<?php echo get_permalink($product->ID); ?>"><?php echo $product->post_title; ?></a></span>
				<?php endif; ?>				
			</div>

			<div class="post-btn">
				<a href="<?php the_permalink(); ?>" rel="nofollow" class=" btn" tabindex="0"><?php echo __('Xem hàng'); ?></a>
			</div>
		</div>
	</article>
</div>