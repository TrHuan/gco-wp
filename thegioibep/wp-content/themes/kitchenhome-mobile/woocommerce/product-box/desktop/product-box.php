<?php global $product; ?>

<div class="item 1">
	<article class="post-box">					
		<div class="post-image">
			<a href="<?php the_permalink(); ?>" title="" class="image" tabindex="0">
				<img src="<?php echo lth_custom_img('full', 220, 220);?>" alt="<?php the_title(); ?>" width="220" height="220">
			</a>
		</div>

		<div class="post-content">
			<h3 class="post-name">
				<a href="<?php the_permalink(); ?>" title="" tabindex="0">
					<?php the_title(); ?>
				</a>   		
			</h3>

			<?php get_template_part('woocommerce/loop/rating', ''); ?>

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