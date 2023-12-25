<header class="headers">

    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <?php if (is_active_sidebar('widget_header_top')) {
                        dynamic_sidebar('widget_header_top');
                    } ?>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="shopcart">  
                        <?php
                            global $woocommerce;
                            $cart_url = wc_get_cart_url();
                        ?>
                     
                        <div class="cart-header clearfix">
                            <?php require_once(WOO_DIR . '/cart/mini-cart-ajax.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $header_stick = get_field('header_stick', 'option');
        $select = $header_stick['header_stick'];

    ?>
    <div class="header-main">
        <?php if ($select) { ?><div class="header-stick"><?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="groups-box">
                            <?php get_template_part('templates/addons/logo-box', ''); ?>

                            <?php //get_search_form(); ?>
                            <div class="search-box">
                                <div class="search-content">
                                    <?php //echo do_shortcode('[fibosearch]'); ?>
                                    <?php echo do_shortcode('[wd_asp id=1]');?>
                                </div>
                            </div>
                            <div class="megamenu__dropdown">
                                <button id="btnTopMegaMenu"><span class="fa fa-navicon"></span></button>
                            </div>
                            <div class="megamenu megamenu-desktop megamenu__top d-none d-lg-block">   
                                <div class="menu-content">  
                                    <?php include 'addons/menu-box.php'; ?>
                                </div>
                            </div>

                            <div id="megamenu__top__sticky" class="megamenu__top__sticky">
                                <div class="container">
                                    <div class="megamenu megamenu-desktop">   
                                        <div class="menu-content">  
                                            <?php include 'addons/menu-box.php'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php if ($select) { ?></div><?php } ?>
    </div> 
    
</header>