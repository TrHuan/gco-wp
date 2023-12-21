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
            <nav class="megamenu menu-mobile-content d-block d-lg-none">
                <div class="menu-content">
                    <a class="menu-close" title="" href="#">
                        <i class="icofont-close"></i>
                    </a>

                    <?php
                        wp_nav_menu(array(
                            'menu' => 'Main Menu',
                            'theme_location'  => 'main_menu',
                            'menu_class' => 'nav-menu',
                        ));
                    ?>
                </div>
            </nav> <!-- end nav -->

           <header>
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

                                        <nav class="megamenu megamenu-desktop d-none d-lg-block">
                                            <?php
                                                wp_nav_menu(array(
                                                    'menu' => 'Main Menu',
                                                    'theme_location'  => 'main_menu',
                                                    'menu_class' => 'nav-menu',
                                                ));
                                            ?>
                                        </nav> <!-- end nav -->

                                        <div class="right-box">
                                            <?php get_search_form(); ?>

                                            <div class="megamenu menu-mobile-title d-block d-lg-none">
                                                <a class="menu-open" title="" href="#">
                                                    <i class="icofont-minus"></i>
                                                    <i class="icofont-minus"></i>
                                                    <i class="icofont-minus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php if ($select) { ?></div><?php } ?>
                </div>                
            </header> <!-- end header -->

            <?php
                if ( !is_home() && !is_front_page() ) :
                    require_once(LIBS_DIR . '/breadcrumbs.php');
                endif;
            ?>

            