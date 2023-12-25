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
    wp_enqueue_style(THEME_NAME . '-mmenu', ASSETS_URI . '/css/jquery.mmenu.all.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-mmenu-shadows', ASSETS_URI . '/css/jquery.mmenu.shadows.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-slick', ASSETS_URI . '/css/slick.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-slick-theme', ASSETS_URI . '/css/slick-theme.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-animate', ASSETS_URI . '/css/animate.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-fontawesome', ASSETS_URI . '/css/all.fontawesome.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-nivo-slider', ASSETS_URI . '/css/nivo-slider.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-magicscroll', ASSETS_URI . '/css/magicscroll.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-magicthumb', ASSETS_URI . '/css/magicthumb.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-magiczoomplus', ASSETS_URI . '/css/magiczoomplus.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-magicslideshow', ASSETS_URI . '/css/magicslideshow.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-styles', ASSETS_URI . '/css/style.css', false, THEME_VERSION, 'all');

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
	// if ( !class_exists( 'WooCommerce' ) ) {
	// 	// file js (được add vào header - sử dụng khi không dùng woocommerce)	
	// 	wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/jquery.min.js', false, THEME_VERSION, 'all');
	// }

    wp_enqueue_script(THEME_NAME.'-jquery-min', ASSETS_URI .'/js/jquery.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-jquery-all', ASSETS_URI .'/js/jquery.mmenu.min.all.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-popper', ASSETS_URI .'/js/popper.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/js/bootstrap.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-slick', ASSETS_URI .'/js/slick.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-wow', ASSETS_URI .'/js/wow.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-fontawesome', ASSETS_URI .'/fonts/fontawesome/fontawesome-all.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-nivo', ASSETS_URI .'/js/jquery.nivo.slider.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-countdown', ASSETS_URI .'/js/jquery.countdown.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-magicscroll', ASSETS_URI .'/js/magicscroll.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-magicthumb', ASSETS_URI .'/js/magicthumb.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-magiczoomplus', ASSETS_URI .'/js/magiczoomplus.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-magicslideshow', ASSETS_URI .'/js/magicslideshow.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/jquery.js', false, THEME_VERSION, 'all');
	
	wp_enqueue_script(THEME_NAME.'-main', ASSETS_URI .'/js/main.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);