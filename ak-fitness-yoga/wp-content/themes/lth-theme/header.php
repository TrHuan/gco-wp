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
            <meta name="description" content="<?php bloginfo('description'); ?>">
            <meta name="keywords" content="Php, HTML, CSS, JavaScript">
            <meta name="author" content="LTH">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="robots" content="noindex"/>
            <meta name="AdsBot-Google" content="noindex"/>
            <meta name="Googlebot" content="noindex">

            <link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/gif">

            <?php if (is_tax()) { ?>
                <link rel = "canonical" href = "<?php echo get_term_link( $term, $taxonomy ); ?>" />
            <?php } elseif (is_category()) { ?>
                <link rel = "canonical" href = "<?php echo get_category_link(get_the_category()[0]->term_id); ?>" />
            <?php } else { ?>
                <?php if (get_post_type() == 'product' && !is_single()) { 
                    $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
                ?>
                    <link rel = "canonical" href = "<?php echo $shop_page_url; ?>" />
                <?php } else { ?>
                    <link rel = "canonical" href = "<?php the_permalink(); ?>" />
                <?php } ?>
            <?php } ?>
            
            <?php wp_head(); ?> <!-- hook của wordpress gọi đến file inc/head.php -->

            <?php require_once(LIBS_DIR . '/css.php'); ?>
        </head>

        <?php
            $ptp = get_post_type();

            if ($ptp == 'post') {
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/blogs.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;

                $dat_url = get_permalink( $archive_id );
            }

            if ($ptp == 'service') {
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/services.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;

                $dat_url = get_permalink( $archive_id );
            }

            if ($ptp == 'project') {
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/projects.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;

                $dat_url = get_permalink( $archive_id );
            }

            if ($ptp == 'product' && !is_search() || is_tax()) {
                $dat_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
            }
        ?>

        <body <?php body_class(); ?> data_url="<?php echo $dat_url; ?>">
            <div class="wrapper">
                <header class="absolute-header">
                    <!-- Header Bottom Start Here -->
                    <div class="header-bottom header-style-two header-sticky">
                        <div class="container-fluid">
                            <div class="main-header">
                                <div class="row">
                                    <!-- Header Menu & Cart Area Start Here -->
                                    <div class="col-xl-5 col-lg-6">
                                        <div class="maain-menu-area d-lg-flex align-items-center h-100 position-relative">
                                            <!-- Primary Menu Start -->
                                            <div class="primary-menu d-none d-lg-block">
                                                <?php
                                                wp_nav_menu( array(
                                                        'menu'            => 'Main Menu',
                                                        'theme_location'  => 'main_menu',
                                                        'container'       => '',
                                                        'container_class' => '',
                                                        'container_id'    => '',
                                                        'menu_class'      => 'menu primary-menu-list d-flex',
                                                    )
                                                );
                                                ?>
                                            </div>
                                            <!-- Primary Menu End -->
                                        </div>
                                    </div>
                                    <!-- Header Menu & Cart Area End Here -->
                                    <!-- Logo Start Here -->
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                                        <div class="logo text-center">
                                            <?php
                                                $logo = get_field('logo', 'option');
                                                $w = get_field('width_logo', 'option');
                                                $h = get_field('height_logo', 'option');
                                            ?>
                                            <a href="<?php echo get_home_url( $lang ); ?>" title="">
                                                <img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Logo End Here -->
                                    <!-- Cart Box Start Here -->
                                    <div class="col-xl-5 col-lg-4 col-md-10 col-sm-9 col-8">
                                        <!-- Cart & Search Area Start -->
                                        <div class="d-flex align-items-center h-100 search-cart-area pr-all-50 float-right">
                                            <ul class="d-flex">
                                                <li><img src="<?php echo ASSETS_URI; ?>/img/icons/search.png" alt="search-img" width="18" height="18">
                                                    <!-- Search Area Start -->
                                                    <ul class="ht-dropdown search-box-view">
                                                        <li>
                                                            <?php get_search_form(); ?>
                                                        </li>
                                                    </ul>
                                                    <!-- Search Area End -->
                                                </li>
                                                <li>
                                                    <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                                                        <div class="lth-shopcart">
                                                            <div class="cart-header clearfix">
                                                                <?php global $woocommerce; ?>
                                                                <?php require_once(get_template_directory() . '/woocommerce/cart/header-cart-ajax.php'); ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </li>
                                                <li class="d-block d-lg-none">
                                                    <a href="#nav" class="meanmenu-reveal" style="right: 0px; left: auto; text-align: center; text-indent: 0px; font-size: 18px;">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Cart & Search Area End -->
                                    </div>
                                    <!-- Cart Box End Here -->
                                </div>
                                <!-- Mobile Menu Start -->
                                <div class="mobile-menu mobile-menu-two d-block d-lg-none">
                                    <div class="mean-bar">
                                        <?php
                                            wp_nav_menu( array(
                                                    'menu'            => 'Main Menu',
                                                    'theme_location'  => 'main_menu',
                                                    'container'       => '',
                                                    'container_class' => '',
                                                    'container_id'    => '',
                                                    'menu_class'      => 'menu primary-menu-list',
                                                )
                                            );
                                        ?>
                                    </div>
                                </div>
                                <!-- Mobile Menu End -->
                            </div>
                        </div>
                        <!-- Container End -->
                    </div>
                    <!-- Header Bottom End Here -->
                </header>