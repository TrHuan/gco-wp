<?php
/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_styles() {
    wp_enqueue_style(THEME_NAME . '-animate', ASSETS_URI . '/ja/css/animate.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-font-awesome', ASSETS_URI . '/ja/css/font-awesome.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-bootstrap-min', ASSETS_URI . '/ja/css/bootstrap.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-jquery-ui-min', ASSETS_URI . '/ja/css/jquery-ui.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-swiper-min', ASSETS_URI . '/ja/css/swiper.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-jquery-fancybox-min', ASSETS_URI . '/ja/css/jquery.fancybox.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-main', ASSETS_URI . '/ja/css/main.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-shops', ASSETS_URI . '/ja/css/shops.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-sience', ASSETS_URI . '/ja/css/sience.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-testemonials', ASSETS_URI . '/ja/css/testemonials.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-faq', ASSETS_URI . '/ja/css/faq.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-story', ASSETS_URI . '/ja/css/story.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-reset', ASSETS_URI . '/ja/css/reset.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-responsive', ASSETS_URI . '/ja/css/responsive.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-customs', ASSETS_URI . '/css/customs.css', false, THEME_VERSION, 'all');


    wp_enqueue_style(THEME_NAME . '-customs-ja', ASSETS_URI . '/ja/css/customs.css', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
 * Add js
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_scripts() {
	wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/ja/js/jquery-3.4.1.min.js', false, THEME_VERSION, false, 'all');
	
	// file js (được add vào footer)	
	wp_enqueue_script(THEME_NAME.'-moment', ASSETS_URI .'/ja/js/moment.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-wow', ASSETS_URI .'/ja/js/wow.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-jquery-ui', ASSETS_URI .'/ja/js/jquery.ui.js', false, THEME_VERSION, 'all');	
	wp_enqueue_script(THEME_NAME.'-fancybox', ASSETS_URI .'/ja/js/jquery.fancybox.min.js', false, THEME_VERSION, 'all');  
    wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/ja/js/bootstrap.min.js', false, THEME_VERSION, 'all');   
    wp_enqueue_script(THEME_NAME.'-swiper', ASSETS_URI .'/ja/js/swiper.min.js', false, THEME_VERSION, 'all');   
    wp_enqueue_script(THEME_NAME.'-script', ASSETS_URI .'/ja/js/script.js', false, THEME_VERSION, 'all');
    
    // wp_enqueue_script(THEME_NAME.'-customs', ASSETS_URI .'/js/customs.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);