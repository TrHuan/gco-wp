<?php
/**
 * Header
 * @author LTH
 * @since 2020
 */
?>
<!DOCTYPE html>
    <html lang="en-US">
         <head>
            <meta charset="UTF-8">
            <meta name="description" content="Free Web tutorials">
            <meta name="keywords" content="Php, HTML, CSS, JavaScript">
            <meta name="author" content="LTH">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="AdsBot-Google" content="noindex"/>

            <link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/gif">
            
            <?php wp_head(); ?> <!-- hook của wordpress gọi đến file inc/head.php -->

            <?php require_once(LIBS_DIR . '/css.php'); ?>
        </head>

        <body <?php body_class(); ?>>

            <?php
                $hotline = get_field('hotline', 'option');
                $hotmail = get_field('hotmail', 'option');
                $address = get_field('address', 'option');
                $website = get_field('website', 'option');
                if( $website ) {
                    $url = $website['url'];
                    $title = $website['title'];
                    $target = $website['target'] ? $website['target'] : '_self';
                }
            ?>

            <section class="top-bar-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <!--Start contact info left-->
                            <div class="contact-info-left clearfix">
                                <ul>
                                    <li><span class="flaticon-building"></span><?php echo $address; ?></li>
                                    <li><span class="flaticon-new-email-outline envelop"></span><?php echo $hotmail; ?></li>
                                </ul>
                            </div>
                            <!--End contact info left-->    
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <!--Start contact info right-->
                            <div class="contact-info-right">
                                <div class="phnumber">
                                    <p><span class="flaticon-technology"></span><?php echo $hotline; ?></p>     
                                </div> 
                                <div class="top-social-links">
                                    <?php get_template_part('templates/addons/socials', 'box'); ?>
                                </div>
                            </div>
                            <!--End contact info right--> 
                        </div>
                    </div>
                </div>
            </section>

            <!--Start header-search  area-->
            <section class="header-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="search-form pull-right">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End header-search  area--> 

            <?php
                $header_stick = get_field('header_stick', 'option');
                $stick = $header_stick['header_stick'];
            ?>

            <header class="header-area <?php if ($stick == 'yes') { ?>stricky<?php } ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="outer-box clearfix">
                                <!--Start logo-->
                                <?php get_template_part('templates/addons/logo-box', ''); ?>                               
                                <!--End logo-->
                                <!--Start search box btn-->
                                <div class="search-box-btn">
                                    <div class="toggle-search">
                                        <button><span class="icon fa fa-search"></span></button>    
                                    </div>
                                </div>
                                <!--End search box btn-->
                                <!--Start cart btn-->       
                                <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                                    <div class="shopcart">  
                                        <?php
                                            global $woocommerce;
                                            $cart_url = wc_get_cart_url();
                                        ?>
                                     
                                        <div class="cart-header clearfix">
                                            <?php require_once(WOO_DIR . '/cart/mini-cart-ajax.php'); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!--End cart btn-->
                                <!--Start mainmenu-->
                                <nav class="main-menu">
                                    <div class="navbar-header">     
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="navbar-collapse collapse clearfix">
                                        <?php
                                            wp_nav_menu(array(
                                                'menu' => 'Main Menu',
                                                'theme_location'  => 'main_menu',
                                                'menu_class' => 'nav-menu navigation',
                                            ));
                                        ?>
                                    </div>
                                </nav>
                                <!--End mainmenu-->
                            </div>
                        </div>
                    </div>
                </div>
            </header>  

            <?php 
                if (!is_home()) {
                    require_once(LIBS_DIR . '/breadcrumbs.php');
                }
            ?>