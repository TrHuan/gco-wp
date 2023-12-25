<?php global $product; ?>

<div class="items-prds__sales">
    <div class="img-prds__sales">
        <a href="<?php the_permalink(); ?>" title="" class="image" tabindex="0">
			<img src="<?php echo lth_custom_img('full', 220, 220);?>" alt="<?php the_title(); ?>" width="220" height="220">
		</a>
    </div>
    <div class="intros-prds__sales">
        <h3>
        	<a href="<?php the_permalink(); ?>" title="" tabindex="0" class="names-prds__sales">
				<?php the_title(); ?>
			</a>  
        </h3>
        <?php get_template_part('woocommerce/loop/rating', ''); ?>
        <div class="price-prds__sales">
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
        <div class="note-sale__prds">
			<?php
			$product = get_field('product');
			if( $product ): ?>
			    <span><?php echo __('Tặng:'); ?> <a href="<?php echo get_permalink($product->ID); ?>"><?php echo $product->post_title; ?></a></span>
			<?php endif; ?>				
		</div>
        <a href="<?php the_permalink(); ?>" rel="nofollow" class=" btn btn-oranges__linear" tabindex="0"><?php echo __('Xem ngay'); ?></a>
    </div>
</div>