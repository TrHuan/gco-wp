<?php
/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_styles() {
	// file css
    wp_enqueue_style(THEME_NAME . '-bootstrap', ASSETS_URI . '/css/bootstrap.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-fontawesome', ASSETS_URI . '/css/icofont.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-slick', ASSETS_URI . '/css/slick.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-SF-UI-Display', ASSETS_URI . '/css/font-SF-UI-Display.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-UVF-BankGothic-Md-BT', ASSETS_URI . '/css/font-UVF-BankGothic-Md-BT.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-customs', ASSETS_URI . '/css/customs.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-reponsive', ASSETS_URI . '/css/reponsives.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-customs-2', ASSETS_URI . '/css/customs-2.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-reponsive-2', ASSETS_URI . '/css/reponsives-2.css', false, THEME_VERSION, 'all');

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
		wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/jquery.min.js', false, THEME_VERSION, false, 'all');
	}
	
	// file js (được add vào footer)	
	wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/js/bootstrap.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-slick', ASSETS_URI .'/js/slick.min.js', false, THEME_VERSION, 'all');
	
	wp_enqueue_script(THEME_NAME.'-main', ASSETS_URI .'/js/main.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);