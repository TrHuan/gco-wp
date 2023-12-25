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

            <?php
                $other = get_field('other', 'option');
                $header = $other['code_header'];
                echo $header;
            ?>

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

                <!-- Newsletter Popup Start -->
                <div class="popup_wrapper">
                    <div class="test">
                        <span class="popup_off">Close</span>
                        <div class="subscribe_area text-center mt-40">
                            <h2>Newsletter</h2>
                            <p>Subscribe to the Makali mailing list to receive updates on new arrivals, special offers and other discount
                                information.</p>
                            <div class="subscribe-form-group">
                                <form action="#">
                                    <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter Nhập email">
                                    <button type="submit">subscribe</button>
                                </form>
                            </div>
                            <div class="subscribe-bottom mt-15">
                                <input type="checkbox" id="newsletter-permission">
                                <label for="newsletter-permission">Don't show this popup again</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Newsletter Popup End -->

                <!-- Main Header Area Start Here -->
                <header class="header-style-five">
                    <!-- Header Top Start Here -->
                    <div class="header-top">
                        <div class="container">
                            <div class="col-sm-12">
                                <div class="row justify-content-lg-between justify-content-center">
                                    <!-- Header Top Left Start -->
                                    <div class="header-top-left order-2 order-lg-1">
                                        <ul>
                                            <li>
                                                <a href="tel:<?php the_field('hotline', 'option'); ?>"><i class="fa fa-phone"></i> <?php the_field('hotline', 'option'); ?></a>
                                            </li>
                                            <li>
                                                <a href="mailto:<?php the_field('email', 'option'); ?>"><i class="fa fa-envelope-open-o"></i> <?php the_field('email', 'option'); ?></a>
                                            </li>
                                            <li>
                                                <?php if( have_rows('socials', 'option') ): ?>
                                                <ul class="social-icon">
                                                    <?php while( have_rows('socials', 'option') ): the_row(); ?>
                                                        <?php
                                                            $title = get_sub_field('title', 'option');
                                                            $url = get_sub_field('url', 'option');
                                                            $icon_image = get_sub_field('icon_image', 'option');
                                                            $icon_class = get_sub_field('icon_class', 'option');
                                                        ?>

                                                        <li>
                                                            <a href="<?php if ($url) {echo $url;} else { echo '#';} ?>" title="Icon" target="_blank" rel="noopener">
                                                                <?php if ($icon_image || $icon_class) { ?>
                                                                    <span class="icon">
                                                                        <?php if ($icon_image) { ?>
                                                                            <img src="<?php echo $icon_image; ?>" alt="Social"  width="60" height="60">
                                                                        <?php } else { ?>
                                                                            <i class="<?php echo $icon_class; ?>"></i>
                                                                        <?php } ?>
                                                                    </span>
                                                                <?php } ?>

                                                                <?php if ($title) { ?>
                                                                    <span class="icon-title"><?php echo $title; ?></span>
                                                                <?php } ?>
                                                            </a>
                                                        </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Header Top Left End -->
                                    <!-- Header Top Right Start -->
                                    <div class="header-top-right order-1 order-lg-2">

                                    </div>
                                    <!-- Header Top Right End -->
                                </div>
                            </div>
                        </div>
                        <!-- Container End -->
                    </div>
                    <!-- Header Top End Here -->
                    <!-- Header Middle Start Here -->
                    <div class="header-middle stick header-sticky">
                        <div class="container">
                            <div class="row align-items-center">
                                <!-- Logo Start -->
                                <div class="col-xl-3 col-lg-2 col-6">
                                    <div class="logo">
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
                                <!-- Logo End -->
                                <!-- Menu Area Start Here -->
                                <div class="col-xl-7 col-lg-8 d-none d-lg-block">
                                    <nav>
                                        <?php
                                            wp_nav_menu( array(
                                                    'menu'            => 'Main Menu',
                                                    'theme_location'  => 'main_menu',
                                                    'container'       => '',
                                                    'container_class' => '',
                                                    'container_id'    => '',
                                                    'menu_class'      => 'menu header-bottom-list d-flex',
                                                )
                                            );
                                        ?>
                                    </nav>
                                </div>
                                <!-- Menu Area End Here -->
                                <!-- Cart Box Start Here -->
                                <div class="col-xl-2 col-lg-2 col-6">
                                    <div class="cart-box">
                                        <ul>
                                            <!-- Search Box Start Here -->
                                            <li>                                                
                                                <?php get_search_form(); ?>
                                            </li>
                                            <!-- Categorie Search Box End Here -->
                                            <li>
                                                <?php global $woocommerce; ?>
                                                <div class="carts-content">
                                                    <?php require_once(get_template_directory() . '/woocommerce/cart/header-cart-ajax.php'); ?>
                                                    <?php require_once(get_template_directory() . '/woocommerce/cart/mini-cart-ajax.php'); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Cart Box End Here -->
                            </div>
                            <!-- Row End -->
                            <!-- Mobile Menu Start Here -->
                            <div class="mobile-menu d-block d-lg-none">
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
                            </div>
                            <!-- Mobile Menu End Here -->
                        </div>
                        <!-- Container End -->
                    </div>
                    <!-- Header Middle End Here -->
                </header>
                <!-- Main Header Area End Here -->