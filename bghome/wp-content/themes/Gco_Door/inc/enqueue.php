<?php
 /**
 * Enqueue scripts and styles.
 */
function specia_scripts() {
	wp_enqueue_style('magnific-popup',get_template_directory_uri().'/css/magnific-popup.min.css');
	wp_enqueue_style('owl-slick',get_template_directory_uri().'/css/slick.min.css');
	wp_enqueue_style('owl-carousel',get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('specia-custom',get_template_directory_uri().'/css/custom.css');
	wp_enqueue_style('specia-typography',get_template_directory_uri().'/css/typography.css');
	wp_enqueue_style('specia-widget',get_template_directory_uri().'/css/widget.css');
	wp_enqueue_style('animate',get_template_directory_uri().'/css/animate.min.css');
	wp_enqueue_style('specia-menus',get_template_directory_uri().'/css/menus.css');
	wp_enqueue_style('specia-woo',get_template_directory_uri().'/css/woo.css');
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/inc/fonts/fontawesome-pro/css/all.min.css', array(), 'all');
	wp_enqueue_style( 'specia-style', get_stylesheet_uri(), array(), filemtime( get_theme_file_path( "style.css" ) ) );
	// Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'));
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'));
	wp_enqueue_script('owl-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'));
	wp_enqueue_script('owl-countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array('jquery'));
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'));
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_script('jquery-text-rotator', get_template_directory_uri() . '/js/jquery.simple-text-rotator.min.js');
	wp_enqueue_script('jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js');
	wp_enqueue_script('wow-min', get_template_directory_uri() . '/js/wow.min.js');
	wp_enqueue_script('specia-service-component', get_template_directory_uri() . '/js/component.min.js');
	wp_enqueue_script('specia-custom-js', get_template_directory_uri() . '/js/custom.js');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'specia_scripts' );