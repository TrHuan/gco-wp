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

            <style type="text/css">
                .slider-l {
                    position: relative;
                }
                .nivo-caption {
                    background: transparent;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
                .slider-text {
                    padding: 10px 20px;
                    background: rgba(144,87,169,.5);
                }
                .nivo-directionNav a {
                    bottom: 40px;
                }
                @media (min-width: 768px) {
                    .slider-text {
                        padding: 30px 100px;
                    }
                    .nivo-directionNav a {
                        top: auto;
                        bottom: 80px;
                    }
                    .sale-slider .sale-item {
                        margin-left: 20px;
                    }
                }
                
                .slider-text a {
                    color: #fff;
                }
                
                
                .nivo-directionNav img {
                    height: 40px;
                    padding: 10px 20px;
                    background: rgba(144,87,169,.2);
                }
                .nivo-nextNav {
                    right: 61px;
                }
                @media (min-width: 1200px) {
                    .nivo-prevNav {
                        left: calc((100% - 1134px)/2);
                    }
                    .nivo-nextNav {
                        right: auto;
                        left: calc(((100% - 1144px)/2) + 65px);
                    }
                }
                
                /*13/08*/
                /* .cate-slider .slick-track {
                    width: auto!important
                } */
                .cate-slider-item:hover {
                    background-image: linear-gradient(white, white), radial-gradient(circle at top left, rgba(144, 87, 169, .6),rgba(234, 136, 217, .6));
                    background-origin: border-box;
                    background-clip: content-box, border-box;
                }
                .wel-l {
                    padding: 95px 0 85px;
                }
                .slider-count {
                    margin: 35px 0px 45px;
                }
                .slider-count li span {
                    display: inline-block;
                    white-space: nowrap;
                }
                .wel {
                    padding: 40px 0px 50px;
                }
                .wel h2 {
                    padding-bottom: 10px;
                }
                .wel-sum {
                    padding-bottom: 35px;
                    line-height: 24px;
                }
                .wel-tabs {
                    padding-bottom: 55px;
                }
                .wel-tabs li {
                    border: 2px solid transparent;
                    background-image: linear-gradient(white, white), radial-gradient(circle at top left, #9057a9,#ea88d9);
                    background-origin: border-box;
                    background-clip: content-box, border-box;
                    line-height: 61px;
                    border-radius: 40px;
                    min-width: 170px;
                    text-align: center;
                    margin: 10px 20px;
                }
                .beauty-tabs li a {
                    padding: 15px 25px;
                    border: 1px solid transparent;
                    display: block;
                }
                .beauty-tabs li a.active {
                    border-color: #793098;
                    color: #793098;
                    border-radius: 30px;
                }
                .allpro-row > div[class*='col'] {
                    margin-bottom: 20px;
                }
                .sale-slider {
                    padding: 25px 0;
                }
                .sale-item {
                    background: #fff;
                    padding: 25px 20px;
                }
                .sale-percent {
                    border: solid #792c9a;
                    border-width: 1px 0;
                }
                .sale-item-tit {
                    padding: 15px 0px 10px;
                }
                .sale-item-img {
                    position: relative;
                }
                .rate svg {
                    color: #ef7114;
                    margin-right: 3px;
                }
                .banner {
                    padding: 13px 0 30px;
                }
                .allpro {
                    padding: 50px 0px 55px;
                }
                .blog {
                    padding: 40px 0px 45px;
                }
                .blog-item-info h3 {
                    padding: 15px 0;
                }
                .blog-item-info {
                    padding-bottom: 15px;
                    border-bottom: 1px solid #ccc;
                    margin-bottom: 10px;
                }
                .btime > div > span:first-child {
                    border-right: 1px solid #ccc;
                    padding-right: 10px;

                }
                .btime > div > span:first-child span {
                    padding-bottom: 5px;
                }
                .btime > div > span:nth-child(2) {
                    padding-left: 10px;
                }
                .btime > div > span:nth-child(2) span {
                    line-height: 24px;
                }
                @media (min-width: 560px) {
                    .blog-item {
                        margin-right: 20px;
                    }
                }
                /*13/08*/
                .slider-count li {
                    position: relative;
                    padding: 5px 10px;
                    border-radius: 3px;
                }
                .slider-count li:not(:first-child) {
                    margin-left: 30px;
                }
                .nivo-controlNav {
                    position: absolute;
                    width: 100%;
                    bottom: 0;
                    left: 0;
                    z-index: 10;
                }
                .nivo-controlNav .nivo-control {
                    width: 15px;
                    height: 15px;
                    border-radius: 50%;
                    background: #acacac;
                    display: inline-block;
                    text-indent: 20px;
                    overflow: hidden;
                    margin: 3px;
                }
                .nivo-controlNav .nivo-control.active {
                    background: #fff;
                }

                .intro-item {
                    padding-left: 20px;
                }
                
            </style>

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
            echo $ptp = get_post_type();

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
            <div class="wrapper">

                <header class="fixed-top top">
                    <div class="b1 s15 top-contact">
                        <div class="container">
                            <div class="d-flex align-items-center justify-content-lg-between justify-content-center">
                                <div class="tcontact-l">
                                    <?php
                                        $header = get_field('header', 'option');
                                        $hotline = $header['hotline'];
                                        $email = $header['email'];
                                    ?>
                                    <a href="tel:<?php echo $hotline; ?>" title="" class="pr-3"><i class="fas fa-phone"></i> <?php echo $hotline; ?></a>
                                    |<a class="pl-3" href="mailto:<?php echo $email; ?>" title=""><i class="fas fa-envelope"></i> <?php echo $email; ?></a>
                                </div>
                                <div class="tcontact-r">
                                    <div id="menu" class="menu-wrap">
                                        <!-- menu -->
                                        <?php include 'templates/addons/menu-box.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="w-100 d-flex align-items-center justify-content-between top-menu">
                            <!-- logo -->
                            <div class="d-flex align-items-center justify-content-between top-menu-btn">
                                <!-- hamburger menu -->
                                <a id="nav-icon" href="#menu" class="d-xl-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                                
                                <?php get_template_part('templates/addons/logo-box', ''); ?>
                            </div>

                            <div class="menu-r">
                                <div class="d-flex align-items-center justify-content-between">
                                    <?php
                                        $header = get_field('header', 'option');
                                        $product_categories = $header['product_categories'];
                                        if( $product_categories ):
                                    ?>
                                        <div class="text-uppercase d-xl-inline-block d-none  mr-3 cate-slider">
                                            <?php foreach( $product_categories as $term ): ?>
                                                <h2 class="cate-slider-item">
                                                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" title=""><?php echo esc_html( $term->name ); ?></a>
                                                </h2>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- search  -->
                                    <div class="mr-3 top-search">
                                        <?php get_search_form(); ?>                                    
                                    </div>
                                    <!-- top-cart -->
                                    <div class="d-flex align-items-center">
                                         <div class="cart-header clearfix">
                                            <?php global $woocommerce; ?>
                                            <?php require_once(WOO_DIR . '/cart/mini-cart-ajax.php'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </header>

                <?php
                    if ( !is_home() && !is_front_page() ) :
                       // require_once(LIBS_DIR . '/breadcrumbs.php');
                    endif;
                ?>

            