<?php
/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_styles() {
	// file css
    wp_enqueue_style(THEME_NAME . '-jquery-ui', ASSETS_URI . '/css/jquery-ui.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-bootstrap', ASSETS_URI . '/css/bootstrap.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-animate', ASSETS_URI . '/css/animate.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-fontawesome', ASSETS_URI . '/css/font-awesome.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-ionicons', ASSETS_URI . '/css/ionicons.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-fancybox', ASSETS_URI . '/css/jquery.fancybox.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-meanmenu', ASSETS_URI . '/css/meanmenu.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-nice-select', ASSETS_URI . '/css/nice-select.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-carousel', ASSETS_URI . '/css/owl.carousel.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-default', ASSETS_URI . '/css/default.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-style', ASSETS_URI . '/css/style.css', false, THEME_VERSION, 'all');
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
	if ( !class_exists( 'WooCommerce' ) ) {
		// file js (được add vào header - sử dụng khi không dùng woocommerce)	
		wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/jquery.min.js', false, THEME_VERSION, false, 'all');
	}

	wp_enqueue_script(THEME_NAME.'-modernizr', ASSETS_URI .'/js/vendor/modernizr-3.5.0.min.js', false, THEME_VERSION, false, 'all');
	// wp_enqueue_script(THEME_NAME.'-jquery-3', ASSETS_URI .'/js/vendor/jquery-3.2.1.min.js', false, THEME_VERSION, false, 'all');
	
	// file js (được add vào footer)	
	wp_enqueue_script(THEME_NAME.'-countdown', ASSETS_URI .'/js/jquery.countdown.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-meanmenu', ASSETS_URI .'/js/jquery.meanmenu.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-scrollUp', ASSETS_URI .'/js/jquery.scrollUp.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-fancybox', ASSETS_URI .'/js/jquery.fancybox.min.js', false, THEME_VERSION, 'all');
	// wp_enqueue_script(THEME_NAME.'-nice-select', ASSETS_URI .'/js/nice-select.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-jquery-ui', ASSETS_URI .'/js/jquery-ui.min.js', false, THEME_VERSION, 'all');	
	wp_enqueue_script(THEME_NAME.'-carousel', ASSETS_URI .'/js/owl.carousel.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-popper', ASSETS_URI .'/js/popper.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/js/bootstrap.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-plugins', ASSETS_URI .'/js/plugins.js', false, THEME_VERSION, 'all');	
	wp_enqueue_script(THEME_NAME.'-main', ASSETS_URI .'/js/main.js', false, THEME_VERSION, 'all');
		
	wp_enqueue_script(THEME_NAME.'-customs', ASSETS_URI .'/js/customs.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);