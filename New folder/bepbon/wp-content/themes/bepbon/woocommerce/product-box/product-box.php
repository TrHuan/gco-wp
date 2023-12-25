<?php global $product; ?>

<div class="item">
	<article class="post-box">
		<?php if (has_post_thumbnail()) { ?>
			<div class="post-image">
	        	<a href="<?php the_permalink(); ?>" title="" class="image">
		            <img src="<?php echo lth_custom_img('full', 188, 127);?>" width="188" height="127" alt="<?php the_title(); ?>">
		        </a>

		        <?php
					$regular_price = $product->get_regular_price();
					$sale_price = $product->get_sale_price();
				?>

				<?php if ($sale_price) { 
					$sale = ($regular_price - $sale_price) * 100 / $regular_price;
				?>
					<span class="on-sale"><?php echo __('Sale'); //echo round($sale) . '%'; ?></span>
				<?php } ?>
	        </div>
		<?php } ?>

		<div class="post-content">
			<h3 class="post-name">
	    		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a>    		
	    	</h3>	

			<?php //get_template_part('woocommerce/loop/rating', ''); ?>

			<div class="post-price">
				<?php echo $product->get_price_html(); ?>
			</div>	

			<?php if( have_rows('qua_tang') ) { ?>
				<div class="post-gift">
					<label><?php echo __('Quà tặng'); ?></label>

					<ul>
						<?php
						    while( have_rows('qua_tang') ) : the_row();
						        $text = get_sub_field('text'); ?>

						        <li>-<?php echo $text; ?></li>
						    <?php endwhile;						
						?>
					</ul>
				</div>
			<?php } elseif (get_field('thuong_hieu') || get_field('chi_tiet')) { ?>
				<div class="post-meta">
					<ul>
						<?php if (get_field('thuong_hieu')) { ?>
							<li><span><?php echo __('Thương hiệu: '); ?></span><?php echo get_field('thuong_hieu'); ?></li>
						<?php } ?>
						<?php if (get_field('chi_tiet')) { ?>
							<li><span><?php echo __('Chi tiết: '); ?></span><?php echo get_field('chi_tiet'); ?></li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>

	        <div class="post-btn">
		        <a class="btn btn-read-more" href="<?php the_permalink(); ?>">
		            <span><?php echo __('Xem chi tiết'); ?></span>
		        </a>

		        <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
				     class="%s btn ajax_add_to_cart"><img src="'.ASSETS_URI.'/images/icon-04.png" alt="Icon" width="16" height="20"></a>',
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