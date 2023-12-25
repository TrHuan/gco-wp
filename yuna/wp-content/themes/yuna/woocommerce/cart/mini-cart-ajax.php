
<div class="top-cart carts-content">
    <div class="cart-icon" data-toggle="dropdown">
        <div class="cart-btn">
            <a href="<?php echo wc_get_cart_url(); ?>" title="" class="d-flex align-items-center top-cart-btn">
                <span class="fas fa-shopping-cart icon" aria-hidden="true"></span>
                <span class="item-count top-cart-quan"><?php echo  $woocommerce->cart->cart_contents_count ?></span>
            </a>
        </div>
    </div>

    <div class="dropdown-menu cart-content" aria-labelledby="dropdownMenuButton">
        <div class="cart-list">
            <?php woocommerce_mini_cart();?>
        </div>
    </div>
</div>