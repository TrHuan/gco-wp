<div class="shopcart">    
    <?php if ( class_exists( 'WooCommerce' ) ) {
        global $woocommerce;
        $cart_url = wc_get_cart_url();
        ?>
     
        <div class="cart-header clearfix">
            <?php require_once(WOO_DIR . '/cart/mini-cart-ajax.php'); ?>
        </div>
    <?php } ?>
</div>