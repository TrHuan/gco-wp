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

            <?php
                $other = get_field('other', 'option');
                $header = $other['header'];
            ?>

            <?php if ($header) { ?>
                <?php echo $header; ?>
            <?php } ?>
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

            if ($ptp == 'product' && !is_search()) {
                $dat_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
            }
        ?>

        <body <?php body_class(); ?> data_url="<?php echo $dat_url; ?>">

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

                                        <?php get_search_form(); ?>

                                        <div class="megamenu megamenu-desktop d-none d-lg-block">   
                                            <div class="menu-content">  
                                                <?php include 'templates/addons/menu-box.php'; ?>
                                            </div>
                                        </div>

                                        <div class="megamenu megamenu-mobile d-block d-lg-none">
                                            <div class="menu-open">
                                                <a href="#" title="" data_toggle="menu-content" class="menu-icon">
                                                    <i class="icofont-minus"></i>
                                                    <i class="icofont-minus"></i>
                                                    <i class="icofont-minus"></i>
                                                </a>
                                            </div>

                                            <div class="menu-mobile-content">
                                                <div class="menu-content">
                                                    <div class="menu-close">
                                                        <a href="#" title="" data_toggle="menu-content" class="menu-icon">
                                                            <i class="icofont-close"></i>
                                                        </a>
                                                    </div>
                                                    
                                                    <?php include 'templates/addons/menu-box.php'; ?>
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

            <?php
                if ( !is_home() && !is_front_page() ) :
                   // require_once(LIBS_DIR . '/breadcrumbs.php');
                endif;
            ?>

            