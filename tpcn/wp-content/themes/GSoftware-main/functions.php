<?php
/**
 * SH Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SH_Theme
 */

/**
 * Run option
 */

add_filter( 'use_widgets_block_editor', '__return_false' );

if ( ! function_exists( 'shtheme_setup' ) ) :
	function shtheme_setup() {
		
		load_theme_textdomain( 'shtheme', get_template_directory() . '/languages' );

		// Load Theme Options
		require get_template_directory() . '/inc/options.php';

		if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			Redux::init('sh_option');
		}

		// Add theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shtheme' ),
		) );

		// add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
	 //    function my_wp_nav_menu_objects( $items, $args ) { 
	 //        foreach( $items as $item ) {
	 //            $item->title .= ' <i class="typo-icon typo-icon-angle-down icon"></i>';
	 //        }      
	 //        return $items;        
	 //    }

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shtheme_custom_background_args', array('default-color' => 'ffffff','default-image' => '',) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'shtheme_setup' );

function sh_constants() {
	define( 'PARENT_DIR', get_template_directory() );
	define( 'SH_DIR',  get_template_directory_uri() );
	define( 'SH_FUNCTIONS_DIR', PARENT_DIR . '/inc/functions' );
}
add_action( 'init', 'sh_constants' );

function sh_load_framework() {
	// Load Functions.
	require_once( PARENT_DIR . '/inc/options-function.php' );
	require_once( SH_FUNCTIONS_DIR . '/init.php' );
	require_once( SH_FUNCTIONS_DIR . '/sidebar.php' );
	require_once( SH_FUNCTIONS_DIR . '/formatting.php' );
	require_once( SH_FUNCTIONS_DIR . '/breadcrumbs.php' );
	require_once( SH_FUNCTIONS_DIR . '/dashboard.php' );
	require_once( SH_FUNCTIONS_DIR . '/mobilemenu.php' );
}
add_action( 'init','sh_load_framework' );

/**
 * Register Widget Area
 */
function shtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'shtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'shtheme' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'shtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shtheme_widgets_init' );

/**
 * Add Widget Top Header
 */
function sh_register_top_header_widget_areas() {

	global $sh_option;
	if( $sh_option['display-topheader-widget'] == '1' ) {
		register_sidebar( array(
			'name'          => __( 'Top Header', 'shtheme' ),
			'id'            => 'top-header',
			'description'   => __( 'Top Header widget area', 'shtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}

}
add_action( 'widgets_init','sh_register_top_header_widget_areas', 1 );

/**
 * Add Widget Footer
 */
function sh_register_footer_widget_areas() {

	global $sh_option;
	$footer_widgets = $sh_option['opt-number-footer'];
	$footer_widgets_number = intval($footer_widgets);
	$counter = 1;
	while ( $counter <= $footer_widgets_number ) {

		register_sidebar( array(
			'name'          => sprintf( __( 'Footer %d', 'shtheme' ), $counter ),
			'id'            => sprintf( 'footer-%d', $counter ),
			'description'   => sprintf( __( 'Footer %d widget area', 'shtheme' ), $counter ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		$counter++;
	}

}
add_action( 'widgets_init','sh_register_footer_widget_areas' );

/**
 * Load File
 */
// Load Plugin Activation File.
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

// Load Custom Post Type
// require get_template_directory() . '/inc/cpt/cpt-abstract.php';
// require get_template_directory() . '/inc/cpt/khach-hang.php';
// require get_template_directory() . '/inc/cpt/cpt.php';
	
// Load Custom Taxonomy
// require get_template_directory() . '/inc/taxonomies/custom-taxonomy-abstract.php';
// require get_template_directory() . '/inc/taxonomies/khach-hang-cat.php';
// require get_template_directory() . '/inc/taxonomies/custom-taxonomy.php';

// Load Shortcode
require get_template_directory() . '/inc/shortcode/shortcode-blog.php';

// Load Woocomerce
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/shortcode/shortcode-product.php';
	require get_template_directory() . '/inc/functions-woocommerce/function-woo.php';
}

// Load Widget
require get_template_directory() . '/inc/widgets/wg-post-list.php';
require get_template_directory() . '/inc/widgets/wg-support.php';
require get_template_directory() . '/inc/widgets/wg-fblikebox.php';
require get_template_directory() . '/inc/widgets/wg-page.php';
require get_template_directory() . '/inc/widgets/wg-view-post-list.php';
require get_template_directory() . '/inc/widgets/wg-information.php';
require get_template_directory() . '/inc/widgets/wg-social.php';
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/widgets/wg-product-slider.php';
}

// add image for menu
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects( $items, $args ) { 
    foreach( $items as $item ) {
        $icon = get_field('icon_class', $item);
        if( $icon ) {                
            $item->title .= ' <i class="'.$icon.' icon"></i>';                
        }

        $img = get_field('image', $item); 
        if( $img ) {                
            $item->title .= '<img src="'.$img.'" alt="Icon">';                
        }
    }      
    return $items;        
}