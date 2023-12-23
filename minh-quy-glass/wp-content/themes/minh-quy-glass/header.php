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
            
            <?php wp_head(); ?> <!-- hook của wordpress gọi đến file inc/head.php -->

            <?php require_once(LIBS_DIR . '/css.php'); ?>
        </head>
        <body <?php body_class(); ?>>

            <div class="megamenu megamenu-mobile-content d-xl-none">
                <div class="content-box">
                    <a class="close-title">
                        <i class="icofont-close"></i>
                    </a>

                    <div class="d-md-none">
                        <?php get_search_form(); ?>
                    </div>

                    <nav class="megamenu">
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

           <header class="headers">
                <?php
                    $header_stick = get_field('header_stick', 'option');
                    $select = $header_stick['header_stick'];

                ?>

                <div class="header-main">
                    <?php if ($select) { ?><div class="header-stick"><?php } ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-column column-1">
                                    <div class="header-main-box">
                                        <?php get_template_part('templates/addons/logo-box', ''); ?>

                                        <div class="groups-box">
                                            <ul>
                                                <li>
                                                    <i class="icofont-envelope icon"></i>
                                                    <a href="mailto:<?php the_field('hotmail', 'option'); ?>" title="<?php the_field('hotmail', 'option'); ?>">
                                                        <span>Email:</span>
                                                        <?php the_field('hotmail', 'option'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <img src="<?php echo ASSETS_URI ?>/images/icon-11.png" alt="Icon">
                                                    <a href="tel:<?php the_field('hotline', 'option'); ?>" title="<?php the_field('hotline', 'option'); ?>">
                                                        <!-- <i class="icofont-ui-call icon"></i> -->
                                                        <span>Hotline:</span> <?php the_field('hotline', 'option'); ?> 
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="d-none d-md-block">
                                                <?php get_search_form(); ?>
                                            </div>

                                            <div class="megamenu megamenu-mobile d-xl-none">
                                                <a href="#" title="" class="menu-title">
                                                    <i class="icofont-minus icon"></i>
                                                    <i class="icofont-minus icon"></i>
                                                    <i class="icofont-minus icon"></i>
                                                </a>                            
                                            </div>
                                        </div>

                                        <div class="megamenu megamenu-destop d-none d-xl-block">
                                            <nav class="megamenu">
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
                    <?php if ($select) { ?></div><?php } ?>
                </div>              
            </header> <!-- end header -->