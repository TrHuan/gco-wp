<?php global $product; ?>

<div class="items-prds__compatible">
    <div class="img-prds__compatible">
        <a href="<?php the_permalink(); ?>" title="" class="image" tabindex="0">
			<img src="<?php echo lth_custom_img('full', 220, 220);?>" alt="<?php the_title(); ?>" width="220" height="220">
		</a>
    </div>
    <div class="intros-prds__compatible">
        <h3>
        	<a href="<?php the_permalink(); ?>" title="" tabindex="0" class="name-prds__compatible mb-5s">
				<?php the_title(); ?>
			</a> 
        </h3>

        <?php get_template_part('woocommerce/loop/rating', ''); ?>

        <div class="price-prds__compatible mb-5s">
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
</div>