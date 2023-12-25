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

            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

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
            <header class="header">
                <div class="header-stick">                    
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 item-col-1">
                                <div class="logo">
                                    <?php
                                        $logo = get_field('logo', 'option');
                                        $w = get_field('width_logo', 'option');
                                        $h = get_field('height_logo', 'option');
                                    ?>
                                    <a href="<?php echo get_home_url( $lang ); ?>" title="">
                                        <img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
                                    </a>
                                </div> <!-- logo -->
                            </div>
                        
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9 item-col-2">
                                <div class="groups-box">
                                    <div class="megamenu megamenu-desktop d-none d-lg-block">
                                        <nav>
                                            <?php
                                                wp_nav_menu( array(
                                                        'menu'            => 'Main Menu',
                                                        'theme_location'  => 'main_menu',
                                                        'container'       => '',
                                                        'container_class' => '',
                                                        'container_id'    => '',
                                                        'menu_class'      => 'menu',
                                                    )
                                                );
                                            ?>
                                        </nav>
                                    </div> <!-- megamenu-desktop -->

                                    <div class="searchs d-none d-lg-block">
                                        <?php get_search_form(); ?>
                                    </div>

                                    <div class="hotline d-none d-lg-flex">
                                        <div class="hotline-icon">
                                            <img src="<?php echo ASSETS_URI . '/images/icon-01.png' ?>" alt="Icon" width="27" height="30">
                                        </div>
                                        <div class="hotline-content">
                                            <span><?php echo __('Tổng đài'); ?></span>
                                            <span class="number"><?php the_field('hotline', 'option'); ?></span>
                                        </div>
                                    </div>

                                    <div class="shopcart">
                                        <?php global $woocommerce; ?>
                                        <div class="carts-content">
                                            <?php require_once(get_template_directory() . '/woocommerce/cart/header-cart-ajax.php'); ?>
                                            <?php //require_once(get_template_directory() . '/woocommerce/cart/mini-cart-ajax.php'); ?>
                                        </div>
                                    </div>

                                    <div class="megamenu megamenu-mobile d-block d-lg-none">
                                        <div class="open-box">
                                            <a href="#" title="">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div>

                                        <div class="content-box">
                                            <div class="menu-container">
                                                <div class="close-box d-block d-lg-none">
                                                    <a href="#" title="" data_toggle="menu-content" class="menu-icon">
                                                        <i class="fal fa-times"></i>
                                                    </a>
                                                </div>

                                                <nav>
                                                    <?php
                                                        wp_nav_menu( array(
                                                                'menu'            => 'Main Menu',
                                                                'theme_location'  => 'main_menu',
                                                                'container'       => '',
                                                                'container_class' => '',
                                                                'container_id'    => '',
                                                                'menu_class'      => 'menu',
                                                            )
                                                        );
                                                    ?>
                                                </nav>

                                                <div class="searchs">
                                                    <?php get_search_form(); ?>
                                                </div>

                                                <div class="hotline">
                                                    <div class="hotline-icon">
                                                        <img src="<?php echo ASSETS_URI . '/images/icon-01.png' ?>" alt="Icon" width="27" height="30">
                                                    </div>
                                                    <div class="hotline-content">
                                                        <span><?php echo __('Tổng đài'); ?></span>
                                                        <span class="number"><?php the_field('hotline', 'option'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- megamenu-mobile -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <?php
                if ( !is_home() && !is_front_page() ) :
                    //require_once(LIBS_DIR . '/breadcrumbs.php');
                endif;
            ?>