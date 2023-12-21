<div class="carts-content">
	<div class="cart-icon" >
		<div class="cart-btn">
            <a href="<?php echo wc_get_cart_url(); ?>" class="vk-btn vk-btn--violet-1">
                <span class="_icon">
                    <img src="<?php echo ASSETS_URI ?>/images/i-4.png" alt="">
                </span>
                <span class=" _num _num--mobile item-count"><?php echo  $woocommerce->cart->cart_contents_count ?></span>
                <span class="_text">
                    <span><?php echo __('Giỏ hàng'); ?></span>
                    <span class="_num item-count">(<?php echo  $woocommerce->cart->cart_contents_count ?> <?php echo __('sản phẩm'); ?>)</span>
                </span>
            </a>
        </div>
	</div>
</div>