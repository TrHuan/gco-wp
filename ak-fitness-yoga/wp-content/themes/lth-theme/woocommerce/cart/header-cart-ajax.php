
<a href="<?php echo wc_get_cart_url(); ?>" title="" class="cart-btn">
    <!-- <span class="fas fa-shopping-cart icon-cart" aria-hidden="true"></span> -->
    <img src="<?php echo ASSETS_URI; ?>/img/icons/cart.png" alt="cart-img" width="19" height="19">
    <span class="item-count"><?php echo  $woocommerce->cart->cart_contents_count ?></span>
</a>

<?php require_once(get_template_directory() . '/woocommerce/cart/mini-cart-ajax.php'); ?>