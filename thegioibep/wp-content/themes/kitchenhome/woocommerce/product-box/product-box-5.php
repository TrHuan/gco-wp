<?php global $product; ?>

<div class="item">
	<article class="post-box" style="padding-bottom:0;">					
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
		</div>
	</article>
</div>