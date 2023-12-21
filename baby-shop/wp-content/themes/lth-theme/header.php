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
            <div id="menu2" class="vk-header__menu">
                <div class="vk-header__menu-content">
                    <div class="menu-navbar"><a class="menu-navbar__title"><?php echo __('Menu'); ?></a></div>
                    <?php
                        wp_nav_menu( array(
                                'menu'            => 'Main Menu',
                                'theme_location'  => 'main_menu',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'menu vk-list vk-list--inline vk-menu__main',
                            )
                        );
                    ?>
                </div>
            </div>

            <div class="main-wrapper">
                <div class="bg-menu"></div>

                <header class="vk-header">
                    <div class="vk-header__top">
                        <div class="vk-img">
                            <img src="<?php echo get_field('banner_header', 'option'); ?>" alt="">
                        </div>
                    </div>
                    <div class="vk-header__bot">
                        <div class="container">
                            <div class="vk-header__bot-content">
                                <?php
                                    $logo = get_field('logo', 'option');
                                    $w = get_field('width_logo', 'option');
                                    $h = get_field('height_logo', 'option');
                                ?>
                                <a href="<?php echo get_home_url( $lang ); ?>" title="" class="vk-header__logo">
                                    <img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
                                </a>
                                <div class="vk-header__right">
                                    <div class="vk-header__cat">
                                        <a href="#cat" class="vk-btn vk-btn--blue-1 d-none d-lg-inline-flex" data-toggle="collapse"><i class="_icon ti-menu"></i> <span>Sản phẩm</span></a>
                                        <a href="#menu" class="vk-btn vk-btn--blue-1 d-lg-none pl-3 pr-3"><i class="ti-menu"></i></a>
                                        <div class="vk-header__cat-content ">
                                            <?php
                                                wp_nav_menu( array(
                                                        'menu'            => 'Danh Mục',
                                                        'theme_location'  => 'danh_muc',
                                                        'container'       => '',
                                                        'container_class' => '',
                                                        'container_id'    => '',
                                                        'menu_class'      => 'menu vk-list collapse',
                                                        'menu_id'         => 'cat',
                                                    )
                                                );
                                            ?>
                                        </div>
                                    </div>

                                    <?php get_search_form(); ?>                                    

                                    <div class="vk-header__minicart">
                                        <?php global $woocommerce; ?>
                                        <?php require_once(get_template_directory() . '/woocommerce/cart/header-cart-ajax.php'); ?>
                                    </div>
                                </div> <!--./right-->

                            </div>
                        </div>
                    </div>

                    <div class="vk-header__menu">
                        <div class="container">
                            <div class="vk-header__menu-content">
                                <?php
                                    wp_nav_menu( array(
                                            'menu'            => 'Main Menu',
                                            'theme_location'  => 'main_menu',
                                            'container'       => '',
                                            'container_class' => '',
                                            'container_id'    => '',
                                            'menu_class'      => 'menu vk-list vk-list--inline vk-menu__main',
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                    </div>
                </header> <!--./vk-header-->

                