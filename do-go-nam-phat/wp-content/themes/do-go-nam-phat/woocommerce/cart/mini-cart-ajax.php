<div class="carts-content">
	<div class="cart-icon" >
		<div class="cart-btn">
            <a href="<?php echo wc_get_cart_url(); ?>">
                <span class="icofont-shopping-cart icon" aria-hidden="true"></span>
                <span class="item-count"><?php echo  $woocommerce->cart->cart_contents_count ?></span>
            </a>
        </div>
	</div>

	<div class="cart-content">
		<div class="cart-list">
			<div class="cart-container-list">
				<div class="cart-close" >
					<i class="icofont-close icon"></i>
				</div>
				<?php woocommerce_mini_cart();?>
			</div>
		</div>
	</div>
</div>