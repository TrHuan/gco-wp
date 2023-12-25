
<header>
    <section class="header ">
        <div class="container">
            <div class="button-phone btn_sp_menu"><img src="<?php echo ASSETS_URI; ?>/images/btn-phones.svg"></div>
            <div class="logo-mains">
                <?php get_template_part('templates/addons/logo-box', ''); ?>
            </div>
            
            <div class="shopcart">  
                <?php
                    global $woocommerce;
                    $cart_url = wc_get_cart_url();
                ?>
             
                <div class="cart-header clearfix">
                    <?php require_once(WOO_DIR . '/cart/mini-cart-ajax.php'); ?>
                </div>
            </div>

            <?php //get_search_form(); ?>
            <?php //echo do_shortcode('[fibosearch]'); ?>
            <?php echo do_shortcode('[fibosearch]');?>
            
            <div class="menu">
                <div class="menu-desktop">
                </div>
            </div>
        </div>
    </section>
</header>
<div id="main-menu-mobile">
    <div class="header-menu-mobile">
        <p class="title-menu__headers"><?php echo __('Danh mục'); ?></p>
    </div>
    <div class="menu_clone">
        <?php include 'addons/menu-box.php'; ?>
    </div>
</div>
<div class="bg-over-menu"></div>
<p class="close-menu-btn smooth"></p>