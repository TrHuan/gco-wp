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
     wp_enqueue_style(THEME_NAME . '-animate', ASSETS_URI . '/css/animate.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-carousel', ASSETS_URI . '/css/owl.carousel.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-slick', ASSETS_URI . '/css/slick.min.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-chosen', ASSETS_URI . '/css/chosen.min.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-easyzoom', ASSETS_URI . '/css/easyzoom.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-icofont', ASSETS_URI . '/css/icofont.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-themify', ASSETS_URI . '/css/themify-icons.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-awesome', ASSETS_URI . '/css/font-awesome.min.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-meanmenu', ASSETS_URI . '/css/meanmenu.min.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-bundle', ASSETS_URI . '/css/bundle.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-style', ASSETS_URI . '/css/style.css', false, THEME_VERSION, 'all');
     wp_enqueue_style(THEME_NAME . '-responsive', ASSETS_URI . '/css/responsive.css', false, THEME_VERSION, 'all');

     wp_enqueue_style(THEME_NAME . '-customs', ASSETS_URI . '/css/customs.css', false, THEME_VERSION, 'all');
    //  wp_enqueue_style(THEME_NAME . '-customs-fix', ASSETS_URI . '/css/customs-fix.css', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
 * Add js
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_scripts() {
	wp_enqueue_script(THEME_NAME.'-modernizr', ASSETS_URI .'/js/vendor/modernizr-2.8.3.min.js', false, THEME_VERSION, false, 'all');
	wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/vendor/jquery-1.12.0.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-popper', ASSETS_URI .'/js/popper.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/js/bootstrap.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-slick', ASSETS_URI .'/js/slick.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-isotope', ASSETS_URI .'/js/isotope.pkgd.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-imagesloaded', ASSETS_URI .'/js/imagesloaded.pkgd.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-counterup', ASSETS_URI .'/js/jquery.counterup.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-waypoints', ASSETS_URI .'/js/waypoints.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-ajax-mail', ASSETS_URI .'/js/ajax-mail.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-carousel', ASSETS_URI .'/js/owl.carousel.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-plugins', ASSETS_URI .'/js/plugins.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-main', ASSETS_URI .'/js/main.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);