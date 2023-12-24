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

            <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

            <?php require_once(LIBS_DIR . '/css.php'); ?>

            <?php
                $other = get_field('other', 'option');
                $header = $other['header'];
            ?>

            <?php if ($header) { ?>
                <?php echo $header; ?>
            <?php } ?>
        <meta name="google-site-verification" content="ez2QAnQGSSapF-1m3zXWtU3T1JFNwh-RpcLCMBwANUY" />
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
                <header>
                    <div class="header-area transparent-bar ptb-55">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-4">
                                    <?php get_template_part('templates/addons/logo-box', ''); ?>
                                </div>
                                <div class="col-lg-8 col-md-8 col-8">
                                    <div class="header-contact-menu-wrapper pl-45">
                                        <div class="header-contact">
                                            <?php
                                                $header = get_field('header', 'option');
                                                $hotline = $header['hotline'];
                                            ?>
                                            <p><?php echo __('Hotline:  '); ?><a href="tel:<?php echo $hotline; ?>" title=""><?php echo $hotline; ?></a></p>
                                        </div>
                                        <div class="menu-wrapper text-center">
                                            <button class="menu-toggle">
                                                <img class="s-open" alt="" src="<?php echo ASSETS_URI; ?>/img/icon-img/menu.png">
                                                <img class="s-close" alt="" src="<?php echo ASSETS_URI; ?>/img/icon-img/menu-close.png">
                                            </button>
                                            <div class="main-menu">
                                                <nav class="megamenu megamenu-desktop d-none d-lg-block">
                                                    <?php
                                                        wp_nav_menu(array(
                                                            'menu' => 'Main Menu',
                                                            'theme_location'  => 'main_menu',
                                                            'menu_class' => 'nav-menu',
                                                        ));
                                                    ?>
                                                </nav> <!-- end nav -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="header-cart-wrapper">
                                        <div class="header-cart">
                                            <?php global $woocommerce; ?>
                                            <?php require_once(WOO_DIR . '/cart/mini-cart-ajax.php'); ?>
                                        </div>
                                    </div>

                                    <div class="mobile-menu-area">
                                        <div class="mobile-menu">
                                            <nav id="mobile-menu-active" class="megamenu megamenu-mobile">
                                                <?php
                                                    wp_nav_menu(array(
                                                        'menu' => 'Main Menu',
                                                        'theme_location'  => 'main_menu',
                                                        'menu_class' => 'nav-menu',
                                                    ));
                                                ?>
                                            </nav> <!-- end nav -->                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <?php
                    // if ( !is_home() && !is_front_page() ) :
                    //     require_once(LIBS_DIR . '/breadcrumbs.php');
                    // endif;
                ?>

            