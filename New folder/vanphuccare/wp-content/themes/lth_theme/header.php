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

            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="top-left">
                                    <?php if (is_active_sidebar('header_top')) {
                                        dynamic_sidebar('header_top');
                                    } ?>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="top-right">
                                    <div class="module__content">
                                        <ul>
                                            <?php $phone = get_field('hotline', 'option');
                                            $mail = get_field('email', 'option');
                                            if ($phone) { ?>
                                                <li class="bor-right">
                                                    <a href="tel:<?php echo $phone; ?>"><img src="<?php echo ASSETS_URI; ?>/images/phone.svg"> <?php echo $phone; ?></a>
                                                </li>
                                            <?php }
                                            if ($mail) { ?>
                                                <li class="bor-right">
                                                    <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <ul class="socials-box">
                                            <?php if( have_rows('socials', 'option') ): ?> 
                                                <?php while( have_rows('socials', 'option') ): the_row(); ?>
                                                    <?php
                                                    $title = get_sub_field('title', 'option');
                                                    $url = get_sub_field('url', 'option');
                                                    $icon_image = get_sub_field('icon_image', 'option');
                                                    $icon_class = get_sub_field('icon_class', 'option');
                                                    ?>

                                                    <li class="">
                                                        <a href="<?php if ($url) {echo $url;} else { echo '#';} ?>" title="" target="_blank" rel="noopener">
                                                            <?php if ($icon_image || $icon_class) { ?>
                                                                <span class="icon">
                                                            <?php if ($icon_image) { ?>
                                                                <img src="<?php echo $icon_image; ?>" alt="Social"  width="40" height="40">
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
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-main">
                    <div class="header-stick">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="lth-logo">
                                        <?php if ($logo) { ?>
                                            <a href="<?php echo get_home_url( $lang ); ?>" title="">
                                                <img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
                                            </a>
                                        <?php } else { ?>
                                            <h2>
                                                <a href="<?php echo get_home_url( $lang ); ?>" title="" class="title"><?php bloginfo('title'); ?></a>
                                                <p><?php bloginfo('description'); ?></p>
                                            </h2>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-6">
                                    <div class="megamenus d-none d-lg-block">
                                        <div class="content">
                                            <?php
                                                wp_nav_menu (
                                                    array(
                                                        'menu'            => 'Main Menu',
                                                        'theme_location'  => 'main_menu',
                                                        'container'       => '',
                                                        'container_class' => '',
                                                        'container_id'    => '',
                                                        'menu_class'      => 'megamenu',
                                                    )
                                                );
                                            ?>                                            
                                        </div>
                                    </div>

                                    <div class="megamenus megamenu-mobile d-lg-none">
                                        <div class="open">
                                            <a href="#"><span></span></a>
                                        </div>

                                        <div class="content-box">
                                            <div class="content">
                                                <div class="close">
                                                    <a href="#">
                                                        <span class="typo-icon typo-icon-close-1"></span>
                                                    </a>
                                                </div>

                                                <?php
                                                    wp_nav_menu (
                                                        array(
                                                            'menu'            => 'Main Menu',
                                                            'theme_location'  => 'main_menu',
                                                            'container'       => '',
                                                            'container_class' => '',
                                                            'container_id'    => '',
                                                            'menu_class'      => 'megamenu',
                                                        )
                                                    );
                                                ?>     
                                            </div>                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>