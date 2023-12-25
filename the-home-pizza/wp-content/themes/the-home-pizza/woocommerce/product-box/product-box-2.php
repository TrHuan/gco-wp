<?php global $product; ?>

<div class="item">
	<article class="post-box">
		<?php if (has_post_thumbnail()) { ?>
			<div class="post-image">
	        	<div class="image">
		            <img src="<?php echo lth_custom_img('full', 640, 853);?>" alt="<?php the_title(); ?>" width="640" height="853">
		        </div>

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

		<div class="post-content">
			<h3 class="post-name">
	    		<a href="javascript:0<?php //the_permalink(); ?>" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a>    		
	    	</h3>	

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

			<div class="post-excerpt">
				<?php the_excerpt(); ?>
			</div>	
		</div>
	</article>
</div>