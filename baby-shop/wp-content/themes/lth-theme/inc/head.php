<?php
/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_styles() {
	// file css
    wp_enqueue_style(THEME_NAME . '-bootstrap', ASSETS_URI . '/plugin/bootstrap/css/bootstrap.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-mmenu', ASSETS_URI . '/plugin/mmenu/jquery.mmenu.all.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-carousel', ASSETS_URI . '/plugin/OwlCarousel/owl.carousel.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-theme-carousel', ASSETS_URI . '/plugin/OwlCarousel/owl.theme.default.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-nice-select', ASSETS_URI . '/plugin/jquery-nice-select/css/nice-select.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-jquery-ui', ASSETS_URI . '/plugin/jquery-ui/jquery-ui.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-magiczoomplus', ASSETS_URI . '/plugin/magiczoomplus/magiczoomplus.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-awesome', ASSETS_URI . '/plugin/fonts/font-awesome/css/font-awesome.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-themify', ASSETS_URI . '/plugin/fonts/themify-icons/themify-icons.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-style', ASSETS_URI . '/css/style.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-custom', ASSETS_URI . '/css/custom.css', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
 * Add js
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_scripts() {	
	// file js (được add vào footer)	
	wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/plugin/jquery/jquery-3.2.1.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-jquery-migrate', ASSETS_URI .'/plugin/jquery/jquery-migrate-3.0.0.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-popper', ASSETS_URI .'/plugin/popper/popper.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/plugin/bootstrap/js/bootstrap.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-mmenu', ASSETS_URI .'/plugin/mmenu/jquery.mmenu.all.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-carousel', ASSETS_URI .'/plugin/OwlCarousel/owl.carousel.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-carousel-sync', ASSETS_URI .'/plugin/OwlCarousel/owl.carousel.sync.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-scrollUp', ASSETS_URI .'/plugin/scrollup/jquery.scrollUp.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-nice-select', ASSETS_URI .'/plugin/jquery-nice-select/js/jquery.nice-select.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-jquery-ui', ASSETS_URI .'/plugin/jquery-ui/jquery-ui.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-numeral', ASSETS_URI .'/plugin/numeral/numeral.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-magiczoomplus', ASSETS_URI .'/plugin/magiczoomplus/magiczoomplus.min.js', false, THEME_VERSION, 'all');	
	wp_enqueue_script(THEME_NAME.'-main', ASSETS_URI .'/plugin/main.js', false, THEME_VERSION, 'all');

	wp_enqueue_script(THEME_NAME.'-custom', ASSETS_URI .'/js/custom.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);