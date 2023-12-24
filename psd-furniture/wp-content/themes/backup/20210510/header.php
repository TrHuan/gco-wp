<?php
/**
 * Header
 * @author LTH
 * @since 2020
 */
?>
<!DOCTYPE html>
    <html lang="VI">
        <head>
            <meta charset="UTF-8">
            <meta name="description" content="Free Web tutorials">
            <meta name="keywords" content="Php, HTML, CSS, JavaScript">
            <meta name="author" content="LTH">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/gif">

            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

            <?php wp_head(); ?> <!-- hook của wordpress gọi đến file inc/head.php -->

            <?php require_once(LIBS_DIR . '/css.php'); ?>
        </head>
        
        <body <?php body_class(); ?>>

        <div class="megamenu megamenu-mobile">
            <div class="megamenu-mobile-content">
                <div class="menu-close">
                    <a href="javascript:0" title="">
                        <i class="icofont-close"></i>
                    </a>
                </div>

                <?php get_template_part('templates/addons/megamenu', ''); ?>
            </div>
        </div>

        <div class="search-box">
            <div class="content-box">
                <div class="search-close">
                    <a href="javascript:0" title="">
                        <i class="icofont-close"></i>
                    </a>
                </div>

                <?php get_search_form(); ?>
            </div>
        </div>

           <header class="headers"> 
                
                <?php
                    $header_top = get_field('header_top', 'option');
                    
                    if( $header_top ):
                        $select = $header_top['header_top'];

                        if ($select) {
                            get_template_part('templates/headers/header', 'top');
                        } 
                    endif;
                ?>   
                
                <?php get_template_part('templates/headers/header', 'main'); ?>    

            </header> <!-- end header -->   