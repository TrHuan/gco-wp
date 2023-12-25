<?php
/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_styles() {
	// file css
    wp_enqueue_style(THEME_NAME . '-animate', ASSETS_URI . '/css/animate.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-bootstrap', ASSETS_URI . '/css/bootstrap.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-fontawesome', ASSETS_URI . '/css/font-awesome.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-carousel', ASSETS_URI . '/css/owl.carousel.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-slick', ASSETS_URI . '/css/slick.min.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-styles', ASSETS_URI . '/css/styles.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-responsive', ASSETS_URI . '/css/responsive.css', false, THEME_VERSION, 'all');    

    wp_enqueue_style(THEME_NAME . '-customs', ASSETS_URI . '/css/customs.css', false, THEME_VERSION, 'all');

}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
 * Add js
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_scripts() {
	// file js (được add vào header - sử dụng khi không dùng woocommerce)	
	// wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/jquery.min.js', false, THEME_VERSION, false, 'all');
	
	// file js (được add vào footer)	
	wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/js/bootstrap.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-carousel', ASSETS_URI .'/js/owl.carousel.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-slick', ASSETS_URI .'/js/slick.min.js', false, THEME_VERSION, 'all');
	// wp_enqueue_script(THEME_NAME.'-waypoints', ASSETS_URI .'/js/waypoints.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-counterup', ASSETS_URI .'/js/jquery.counterup.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-wow', ASSETS_URI .'/js/wow.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-private', ASSETS_URI .'/js/private.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);