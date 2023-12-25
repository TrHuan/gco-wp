<?php

/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_styles() {
    wp_enqueue_style(THEME_NAME . '-animate', ASSETS_URI . '/css/animate.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-font-awesome', ASSETS_URI . '/css/font-awesome.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-bootstrap', ASSETS_URI . '/css/bootstrap.min.css', false, THEME_VERSION, 'all');    
    wp_enqueue_style(THEME_NAME . '-cloudzoom', ASSETS_URI . '/css/cloudzoom.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-main', ASSETS_URI . '/css/main.css', false, THEME_VERSION, 'all');

    if ( wp_is_mobile() ) {
        wp_enqueue_style(THEME_NAME . '-swiper', ASSETS_URI . '/css/swiper.min.css', false, THEME_VERSION, 'all');
        // wp_enqueue_style(THEME_NAME . '-fancybox', ASSETS_URI . '/css/jquery.fancybox.min.css', false, THEME_VERSION, 'all');
        wp_enqueue_style(THEME_NAME . '-tintuc', ASSETS_URI . '/css/tintuc.css', false, THEME_VERSION, 'all');
        wp_enqueue_style(THEME_NAME . '-san-pham', ASSETS_URI . '/css/san-pham.css', false, THEME_VERSION, 'all');
        wp_enqueue_style(THEME_NAME . '-thanh-toan', ASSETS_URI . '/css/thanh-toan.css', false, THEME_VERSION, 'all');
        wp_enqueue_style(THEME_NAME . '-reset', ASSETS_URI . '/css/reset.css', false, THEME_VERSION, 'all');
        wp_enqueue_style(THEME_NAME . '-responsive', ASSETS_URI . '/css/responsive.css', false, THEME_VERSION, 'all');
        
    }

    wp_enqueue_style(THEME_NAME . '-styles', ASSETS_URI . '/css/styles.css', false, THEME_VERSION, 'all');	
    

    //Desktop

    // wp_enqueue_style(THEME_NAME . '-raleway-desktop', ASSETS_URI . '/desktop/css/font-raleway.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-Androgyne-desktop', ASSETS_URI . '/desktop/css/font-UTM-Androgyne.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-icofont-desktop', ASSETS_URI . '/desktop/css/icofont.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-slick-desktop', ASSETS_URI . '/desktop/css/slick.min.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-customs-desktop', ASSETS_URI . '/desktop/css/customs.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-reponsive-desktop', ASSETS_URI . '/desktop/css/reponsives.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-styles-desktop', ASSETS_URI . '/desktop/css/styles.css', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
 * Add js
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_scripts() {
    if ( !class_exists( 'WooCommerce' ) ) {
        // file js (được add vào header - sử dụng khi không dùng woocommerce)   
        wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/jquery.min.js', false, THEME_VERSION, 'all');
    }

    wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/jquery-3.4.1.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-moment', ASSETS_URI .'/js/moment.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-cloudzoom', ASSETS_URI .'/js/cloudzoom.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/js/bootstrap.min.js', false, THEME_VERSION, 'all');

    if ( wp_is_mobile() ) {
        // wp_enqueue_script(THEME_NAME.'-fancybox', ASSETS_URI .'/js/jquery.fancybox.min.js', false, THEME_VERSION, 'all');
        wp_enqueue_script(THEME_NAME.'-swiper', ASSETS_URI .'/js/swiper.min.js', false, THEME_VERSION, 'all');

        wp_enqueue_script(THEME_NAME.'-readmore', ASSETS_URI .'/js/readmore.js', false, THEME_VERSION, 'all');

        wp_enqueue_script(THEME_NAME.'-body-padding-top', ASSETS_URI .'/js/body-padding-top.js', false, THEME_VERSION, 'all');

    }

    wp_enqueue_script(THEME_NAME.'-slick-desktop', ASSETS_URI .'/desktop/js/slick.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-script', ASSETS_URI .'/js/script.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-main', ASSETS_URI .'/js/main.js', false, THEME_VERSION, 'all');

    //Desktop

    wp_enqueue_script(THEME_NAME.'-slick-desktop', ASSETS_URI .'/desktop/js/slick.min.js', false, THEME_VERSION, 'all');
    // wp_enqueue_script(THEME_NAME.'-countdown-desktop', ASSETS_URI .'/desktop/js/jquery.countdown.min.js', false, THEME_VERSION, 'all');
    
    wp_enqueue_script(THEME_NAME.'-main-desktop', ASSETS_URI .'/desktop/js/main.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);

/**
 * Custom admin
 */
function wp_include_admin_js() {
    wp_enqueue_script(THEME_NAME.'-custom-admin', ASSETS_URI .'/js/custom-admin.js', false, THEME_VERSION, 'all');
}

add_action('admin_enqueue_scripts', 'wp_include_admin_js', 99);