<?php
/**
 * Header
 * @author LTH
 * @since 2020
 */
ob_start();
session_start(); 
?>


<!DOCTYPE html>
    <html lang="en-US">
         <head>
            <meta charset="UTF-8">
            <meta name="description" content="Free Web tutorials">
            <meta name="keywords" content="Php, HTML, CSS, JavaScript">
            <meta name="author" content="LTH">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
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
        
        <?php
        $bodyClass = ''; 
        //if( (isset($_COOKIE['mobileView']) && $_COOKIE['mobileView'] == 1) || (isset($_SESSION['mobileView']) && $_SESSION['mobileView'] == 1) ){
        if( ($_COOKIE['mobileView'] == 1 || $_SESSION['mobileView'] == 1) && $_SESSION['mobileView'] != -1 ){
            $bodyClass = 'site-wrap';
        } 
        ?>

        <body <?php body_class($bodyClass); ?> data_url="<?php echo $dat_url; ?>">
            
            <?php
                if ( wp_is_mobile() ) {
                    include 'templates/header.php';
                } else {
                    include 'templates/desktop/header.php';
                }
            ?>