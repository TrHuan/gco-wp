<?php global $product; ?>

<div class="vk-shop-item vk-shop-item--style-1">
    <a href="<?php the_permalink(); ?>" title="" class="vk-img vk-img--mw100">
        <img src="<?php echo lth_custom_img('full', 196, 180);?>" width="196" height="180" alt="<?php the_title(); ?>">
    </a>


    <div class="vk-shop-item__brief">
        <h3 class="vk-shop-item__title">
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	    		<?php the_title(); ?>
	    	</a>
        </h3>
        <div class="vk-shop-item__id"><?php echo __('Mã SP:'); ?> <?php echo $product->get_sku(); ?></div>
        <div class="vk-shop-item__price"><?php echo $product->get_price_html(); ?></div>
    </div>
</div> <!--./vk-shop-item-->