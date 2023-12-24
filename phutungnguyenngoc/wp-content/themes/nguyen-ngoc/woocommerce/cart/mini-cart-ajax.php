<div class="carts-content">
    <div class="cart-icon" >
        <div class="cart-btn">
            <a href="<?php echo wc_get_cart_url(); ?>" class="icon-cart">
                <i class="ti-shopping-cart"></i>
                <span class="item-count count-style"><?php echo  $woocommerce->cart->cart_contents_count ?></span>
                <span class="count-Giá-add"><?php echo WC()->cart->get_total(); ?></span>
            </a>
        </div>
    </div>

    <div class="cart-content shopping-cart-content">
        <?php woocommerce_mini_cart();?>
    </div>
</div>