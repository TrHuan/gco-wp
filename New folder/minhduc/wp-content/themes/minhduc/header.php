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
            <?php
                $logo = get_field('logo', 'option');
                $w = get_field('width_logo', 'option');
                $h = get_field('height_logo', 'option');
            ?>

            <header>
                <section class="header">
                    <div class="top-headers">
                        <div class="container">
                            <ul class="mail-phone__headers">
                                <li><a href="" title=""><img src="<?php echo ASSETS_URI; ?>/images/mail-phone-headers-1.svg" alt="Icon"> <?php the_field('hotline', 'option'); ?></a></li>
                                <li><a href="" title=""><img src="<?php echo ASSETS_URI; ?>/images/mail-phone-headers-2.svg" alt="Icon"> <?php the_field('email', 'option'); ?></a></li>
                            </ul>
                            <?php if (is_active_sidebar('header_top')) {
                                dynamic_sidebar('header_top');
                            } ?>
                        </div>
                    </div>
                    <div class="content-headers">
                        <div class="container">
                            <div class="logo-mains">                                
                                <a href="<?php echo get_home_url( $lang ); ?>" title="">
                                    <img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
                                </a>
                            </div>
                            <div class="menu">
                                <div class="menu-desktop">
                                    <?php
                                        wp_nav_menu( array(
                                                'menu'            => 'Main Menu',
                                                'theme_location'  => 'main_menu',
                                                'container'       => '',
                                                'container_class' => '',
                                                'container_id'    => '',
                                                'menu_class'      => 'nav-menu',
                                            )
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="search-headers">
                                <p class="btn-searchs__headers"><img src="<?php echo ASSETS_URI; ?>/images/icon-search-headers.svg" alt="Icon" width="20" height="20"></p>
                            </div>
                            <span class="button-phone btn_sp_menu"><i class="fa fa-bars" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </section>
            </header>
            <div id="main-menu-mobile">
                <div class="header-menu-mobile">
                    <p class="logo-menu__mobile">
                        <a href="<?php echo get_home_url( $lang ); ?>" title="">
                            <img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
                        </a>
                    </p>
                </div>
                <div class="menu_clone">
                    <?php
                        wp_nav_menu( array(
                                'menu'            => 'Main Menu',
                                'theme_location'  => 'main_menu',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'nav-menu',
                            )
                        );
                    ?>
                </div>
            </div>
            <div class="bg-over-menu"></div>
            <p class="close-menu-btn smooth"></p>
            <div class="search-headerss__box">
                <div class="container">
                    <p class="btn-close__searchs">
                        <img src="<?php echo ASSETS_URI; ?>/images/btn-close-searchs.png" alt="Icon" width="50" height="50">
                    </p>

                    <?php get_search_form(); ?>                    
                </div>
            </div>