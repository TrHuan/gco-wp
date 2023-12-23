<?php
/**
 * RadiantThemes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RadiantThemes
 */

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_parent_theme_file_path( '/inc/jetpack.php' );
}

/**
 * Load TGMPA file.
 */
require get_parent_theme_file_path( '/inc/tgmpa/tgmpa.php' );
/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_enqueue_scripts() {
	wp_enqueue_style(
		'radiantthemes-admin-styles',
		get_template_directory_uri() . '/inc/radiantthemes-dashboard/css/admin-pages.css',
		array(),
		time()
	);

}
add_action( 'admin_enqueue_scripts', 'radiantthemes_enqueue_scripts' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_dashboard_submenu_page() {
	add_submenu_page(
		'themes.php',
		esc_html__( 'RadiantThemes Dashboard', 'apexclinic' ),
		esc_html__( 'RadiantThemes Dashboard', 'apexclinic' ),
		'manage_options',
		'radiantthemes-dashboard',
		'radiantthemes_screen_welcome'
	);
}
add_action( 'admin_menu', 'radiantthemes_dashboard_submenu_page' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_screen_welcome() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
	require_once get_parent_theme_file_path( '/inc/radiantthemes-dashboard/welcome.php' );
}

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_plugins_submenu_page() {

	add_submenu_page(
		'themes.php',
		esc_html__( 'Radiantthemes Install Plugins', 'apexclinic' ),
		esc_html__( 'Radiantthemes Install Plugins', 'apexclinic' ),
		'manage_options',
		'radiantthemes-admin-plugins',
		'radiantthemes_screen_plugin'
	);

}
add_action( 'admin_menu', 'radiantthemes_plugins_submenu_page' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_screen_plugin() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
	require_once get_parent_theme_file_path( '/inc/radiantthemes-dashboard/install-plugins.php' );
}

/**
 * Redirect to welcome page
 *
 * @return void
 */
function radiantthemes_after_switch_theme() {
	if ( current_user_can( 'manage_options' ) ) {
		wp_safe_redirect( admin_url( 'themes.php?page=radiantthemes-dashboard' ) );
	}
}
add_action( 'after_switch_theme', 'radiantthemes_after_switch_theme' );
// Admin pages.
if ( is_admin() ) {
	include_once get_template_directory() . '/inc/radiantthemes-dashboard/rt-admin.php';
}

if ( ! function_exists( 'apexclinic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function apexclinic_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Finacorp, use a find and replace
		 * to change 'apexclinic' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'apexclinic', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for woocommerce lightbox gallery.
		*/
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top'             => esc_html__( 'Primary', 'apexclinic' ),
				'footer'          => esc_html__( 'Footer', 'apexclinic' ),
				'full-width-menu' => esc_html__( 'Full Width Menu', 'apexclinic' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		$apexclinic_args = array(
			'default-color' => 'ffffff',
			'default-image' => '',
		);
		add_theme_support( 'custom-background', $apexclinic_args );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Registers an editor stylesheet for the theme.
		$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Rubik:400,500,700' );
		add_editor_style( $font_url );
		add_editor_style( 'css/radiantthemes-editor-styles.css' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		/**
		 * Undocumented function
		 */
		function radiantthemes_block_style() {
			wp_register_style(
				'radiantthemes_block',
				get_parent_theme_file_uri( '/css/radiantthemes-blocks.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'radiantthemes_block' );
		}
		add_action( 'enqueue_block_assets', 'radiantthemes_block_style' );

		/**
		 * Undocumented function
		 */
		function radiantthemes_block_editor_style() {
			wp_register_style(
				'radiantthemes_editor',
				get_parent_theme_file_uri( '/css/radiantthemes-editor.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'radiantthemes_editor' );
		}
		add_action( 'enqueue_block_editor_assets', 'radiantthemes_block_editor_style' );

		// Require Redux Framework.
		require_once get_parent_theme_file_path( '/inc/redux-framework/admin-init.php' );

		/**
		 * Redux custom css
		 */
		function apexclinic_custom_redux_css() {
			/**
			 * [apexclinic_custom_redux_css description]
			 */
			function apexclinic_override_css_fonts_url() {
				$google_font_url = '';

				/*
				Translators          : If there are characters in your language that are not supported
				by chosen font(s), translate this to 'off'. Do not translate into your own language.
				*/
				if ( 'off' !== _x( 'on', 'Google font: on or off', 'apexclinic' ) ) {
					$google_font_url = add_query_arg( 'family', rawurlencode( 'Poppins: 300,400,500,600,700' ), '//fonts.googleapis.com/css' );
				}
				return $google_font_url;
			}
			wp_enqueue_style(
				'radiantthemes-google-fonts',
				apexclinic_override_css_fonts_url(),
				array(),
				'1.0.0'
			);
			wp_register_style(
				'simple-dtpicker',
				get_parent_theme_file_uri( '/inc/redux-framework/css/jquery.simple-dtpicker.min.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'simple-dtpicker' );

			wp_register_style(
				'radiantthemes-redux-custom',
				get_parent_theme_file_uri( '/inc/redux-framework/css/radiantthemes-redux-custom.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'radiantthemes-redux-custom' );

			wp_enqueue_script(
				'simple-dtpicker',
				get_parent_theme_file_uri( '/inc/redux-framework/js/jquery.simple-dtpicker.min.js' ),
				array( 'jquery' ),
				time(),
				true
			);
			wp_enqueue_script(
				'radiantthemes-redux-custom',
				get_parent_theme_file_uri( '/inc/redux-framework/js/radiantthemes-redux-custom.js' ),
				array( 'jquery' ),
				time(),
				true
			);

		}
		// This example assumes your opt_name is set to apexclinic_theme_option, replace with your opt_name value.
		add_action( 'redux/page/apexclinic_theme_option/enqueue', 'apexclinic_custom_redux_css', 2 );
	}
endif;
add_action( 'after_setup_theme', 'apexclinic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function apexclinic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'apexclinic_content_width', 640 );
}
add_action( 'after_setup_theme', 'apexclinic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function apexclinic_widgets_init() {

	// ADD MAIN SIDEBAR.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'apexclinic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'apexclinic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// ADD PRODUCT SIDEBAR.
	if ( class_exists( 'woocommerce' ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Product | Sidebar', 'apexclinic' ),
				'id'            => 'apexclinic-product-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'apexclinic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
	}

	// ADD FOOTER WIDGET AREA.
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		// apexclinic Footer Areas.
		for ( $j = 1; $j <= 4; $j++ ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer | #', 'apexclinic' ) . $j . '',
					'id'            => 'apexclinic-footer-area-' . $j,
					'description'   => esc_html__( 'Add widgets here.', 'apexclinic' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h5 class="widget-title">',
					'after_title'   => '</h5>',
				)
			);
		}
	}

	// ADD HAMBURGER WIDGET AREA.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Hamburger | Sidebar', 'apexclinic' ),
			'id'            => 'apexclinic-hamburger-sidebar',
			'description'   => esc_html__( 'Add widgets for "Hamburger" menu from here. To turn it on/off please navigate to "Theme Options > Header" and select "Hamburger" for respetive header styles.', 'apexclinic' ),
			'before_widget' => '<div id="%1$s" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 matchHeight widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'General | Sidebar', 'apexclinic' ),
			'id'            => 'apexclinic-general-sidebar',
			'description'   => esc_html__( 'Add widgets in Find a Doctor page', 'apexclinic' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		)
	);
}
add_action( 'widgets_init', 'apexclinic_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function apexclinic_scripts() {

	// ENQUEUE STYLESHEETS.
	wp_deregister_style( 'font-awesome' );
	wp_deregister_style( 'font-awesome-css' );
	wp_deregister_style( 'ea-bootstrap' );
	wp_enqueue_style(
		'bootstrap',
		get_parent_theme_file_uri( '/css/bootstrap.min.css' ),
		array(),
		time()
	);
	wp_enqueue_style(
		'font-awesome',
		get_parent_theme_file_uri( '/css/font-awesome.min.css' ),
		array(),
		time()
	);
	wp_enqueue_style(
		'elusive-icons',
		get_parent_theme_file_uri( '/css/elusive-icons.min.css' ),
		array(),
		time()
	);
	wp_enqueue_style(
		'animate',
		get_parent_theme_file_uri( '/css/animate.min.css' ),
		array(),
		time()
	);
	wp_enqueue_style( 'js-composer-front' );
	wp_enqueue_style(
		'radiantthemes-custom',
		get_parent_theme_file_uri( '/css/radiantthemes-custom.css' ),
		array(),
		time()
	);
	wp_enqueue_style(
		'radiantthemes-responsive',
		get_parent_theme_file_uri( '/css/radiantthemes-responsive.css' ),
		array(),
		time()
	);

	// CALL RESET CSS IF REDUX NOT ACTIVE.
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
		wp_enqueue_style(
			'radiantthemes-reset',
			get_parent_theme_file_uri( '/css/radiantthemes-reset.css' ),
			array(),
			time()
		);

		/**
		 * Load Montserrat Google Font when redux framework is not installed.
		 */
		function apexclinic_default_google_fonts_url() {
			$google_font_url = '';

			/*
			Translators          : If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			*/
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'apexclinic' ) ) {
				$google_font_url = add_query_arg( 'family', rawurlencode( 'Poppins:700|Rubik:400,500,700' ), '//fonts.googleapis.com/css' );
			}
			return $google_font_url;
		}
		wp_enqueue_style(
			'radiantthemes-google-fonts',
			apexclinic_default_google_fonts_url(),
			array(),
			'1.0.0'
		);
	}

	// ENQUEUE PRELOADER STYLE.
	if ( ! empty( apexclinic_global_var( 'preloader_switch', '', false ) ) ) {
		wp_enqueue_style(
			'preloader',
			get_parent_theme_file_uri( '/css/spinkit.min.css' ),
			array(),
			time()
		);
	}

	// ENQUEUE HEADER STYLE.
	if ( is_404() && ! empty( apexclinic_global_var( 'error_custom_header_style', '', false ) ) ) {
		wp_enqueue_style(
			'radiantthemes-' . apexclinic_global_var( 'error_custom_header_style', '', false ),
			get_parent_theme_file_uri( '/css/radiantthemes-' . apexclinic_global_var( 'error_custom_header_style', '', false ) . '.css' ),
			array(),
			time()
		);
	} elseif ( ! empty( apexclinic_global_var( 'header-style', '', false ) ) ) {
		$id = get_the_ID();

		if ( ( 'default' != get_post_meta( $id, 'selectheader', true ) ) && ( ! empty( get_post_meta( $id, 'selectheader', true ) ) ) ) {
			wp_enqueue_style(
				'radiantthemes-header-style-' . get_post_meta( $id, 'selectheader', true ),
				get_parent_theme_file_uri( '/css/radiantthemes-header-style-' . get_post_meta( $id, 'selectheader', true ) . '.css' ),
				array(),
				time()
			);
		} else {
			wp_enqueue_style(
				'radiantthemes-' . apexclinic_global_var( 'header-style', '', false ),
				get_parent_theme_file_uri( '/css/radiantthemes-' . apexclinic_global_var( 'header-style', '', false ) . '.css' ),
				array(),
				time()
			);
		}
	} else {
		wp_enqueue_style(
			'radiantthemes-header-style-default',
			get_parent_theme_file_uri( '/css/radiantthemes-header-style-default.css' ),
			array(),
			time()
		);
	}

	// ENQUEUE FOOTER STYLE.
	if ( ! empty( apexclinic_global_var( 'footer-style', '', false ) ) ) {
		wp_enqueue_style(
			'radiantthemes-' . apexclinic_global_var( 'footer-style', '', false ),
			get_parent_theme_file_uri( '/css/radiantthemes-' . apexclinic_global_var( 'footer-style', '', false ) . '.css' ),
			array(),
			time()
		);
	} else {
		wp_enqueue_style(
			'radiantthemes-footer-style-one',
			get_parent_theme_file_uri( '/css/radiantthemes-footer-style-one.css' ),
			array(),
			time()
		);
	}

	// ENQUEUE STYLE.CSS.
	wp_enqueue_style(
		'radiantthemes-style',
		get_stylesheet_uri(),
		array(),
		time()
	);

	// ENQUEUE RAIDNATTHEMES USER CUSTOM - GERERATED FROM REDUX CUSTOM CSS.
	wp_enqueue_style(
		'radiantthemes-user-custom',
		get_parent_theme_file_uri( '/css/radiantthemes-user-custom.css' ),
		array(),
		time()
	);

	// ENQUEUE RADIANTTHEMES DYNAMIC - GERERATED FROM REDUX FRAMEWORK.
	wp_enqueue_style(
		'radiantthemes-dynamic',
		get_parent_theme_file_uri( '/css/radiantthemes-dynamic.css' ),
		array(),
		time()
	);

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( class_exists( 'ReduxFrameworkPlugin' ) && class_exists( 'Radiantthemes_Addons' ) ) {

		$buttonradius  = '';
		$buttonradius  = esc_html( apexclinic_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( apexclinic_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( apexclinic_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( apexclinic_global_var( 'border-radius', 'margin-top', true ) );

		$buttonborderradius = '.gdpr-notice .btn, .team.element-six .team-item > .holder .data .btn, .radiantthemes-button > .radiantthemes-button-main, .rt-fancy-text-box > .holder > .more .btn, .rt-call-to-action-wraper .rt-call-to-action-item .btn:hover, .radiant-contact-form .form-row input[type=submit], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn {  border-radius:' . $buttonradius . ' ; }';

		wp_enqueue_style(
			'radiantthemes-button-element-one',
			plugins_url( 'radiantthemes-addons/button/css/radiantthemes-button-element-one.css' ),
			plugin_dir_url( __FILE__ ) . 'css/radiantthemes-button-element-one.css',
			array(),
			null
		);
		wp_add_inline_style( 'radiantthemes-button-element-one', $buttonborderradius );
	}

	/**
	 * ENQUEUE SCRIPTS
	 */

	// DEREGISTER EASY APPOINTMENTS BOOTSTRAP JQUERY.
	// wp_deregister_script( 'ea-bootstrap' );

	// ENQUEUE BOOTSTRAP JQUERY.
	wp_enqueue_script(
		'bootstrap',
		get_parent_theme_file_uri( '/js/bootstrap.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE SIDR JQUERY.
	wp_enqueue_script(
		'sidr',
		get_parent_theme_file_uri( '/js/jquery.sidr.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE MATCHHEIGHT JQUERY.
	wp_enqueue_script(
		'matchHeight',
		get_parent_theme_file_uri( '/js/jquery.matchHeight-min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE WOW JQUERY.
	wp_enqueue_script(
		'wow',
		get_parent_theme_file_uri( '/js/wow.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE NICESCROLL JQUERY.
	wp_enqueue_script(
		'nicescroll',
		get_parent_theme_file_uri( '/js/jquery.nicescroll.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE STICKY JQUERY.
	wp_enqueue_script(
		'sticky',
		get_parent_theme_file_uri( '/js/jquery.sticky.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE RETINA JQUERY.
	wp_enqueue_script(
		'retina',
		get_parent_theme_file_uri( '/js/retina.min.js' ),
		array(),
		time(),
		true
	);

	// ENQUEUE ISOTOPE JQUERY.
	if ( 'two' === apexclinic_global_var( 'blog-style', '', false ) || 'five' === apexclinic_global_var( 'blog-style', '', false ) ) {
		wp_enqueue_script(
			'isotope',
			get_parent_theme_file_uri( '/js/isotope.pkgd.min.js' ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_enqueue_script(
			'radiantthemes-blog-style',
			get_parent_theme_file_uri( '/js/radiantthemes-blog-style.js' ),
			array( 'jquery', 'isotope' ),
			time(),
			true
		);
	}

	// ENQUEUE RADIANTTHEMES CUSTOM JQUERY.
	wp_enqueue_script(
		'radiantthemes-custom',
		get_parent_theme_file_uri( '/js/radiantthemes-custom.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// Load comment-reply.js into footer.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		// enqueue the javascript that performs in-link comment reply fanciness.
		wp_enqueue_script( 'comment-reply' );
	}

	// Load Countdown JS and Coming Soon JS.
	if ( ! is_user_logged_in() && ! empty( apexclinic_global_var( 'coming_soon_switch', '', false ) ) ) {
		wp_enqueue_script(
			'countdown',
			get_parent_theme_file_uri( '/js/jquery.countdown.min.js' ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_enqueue_script(
			'radiantthemes-comingsoon',
			get_parent_theme_file_uri( '/js/radiantthemes-comingsoon.js' ),
			array( 'jquery' ),
			time(),
			true
		);
	}

}
add_action( 'wp_enqueue_scripts', 'apexclinic_scripts' );

/**
 * ADMIN CUSTOM CSS
 *
 * @return void
 */
function radiantthemes_admin_custom_css() {
	$radiantthemes_admin_custom_css = apexclinic_global_var( 'radiantthemes_custom_css_editor', '', false );
	if ( ! empty( $radiantthemes_admin_custom_css ) ) {
		wp_add_inline_style( 'radiantthemes-style', $radiantthemes_admin_custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'radiantthemes_admin_custom_css' );

/**
 * RadiantThemes Dynamic CSS.
 */
global $wp_filesystem;
if ( defined( 'FS_CHMOD_FILE' ) ) {
	$chmod = FS_CHMOD_FILE;
} else {
	$chmod = 0644;
}
$radiantthemes_theme_options = get_option( 'apexclinic_theme_option' );
ob_start();
require_once get_parent_theme_file_path( '/inc/dynamic-style/radiantthemes-dynamic-style.php' );
$css      = ob_get_clean();
$filename = get_parent_theme_file_path( '/css/radiantthemes-dynamic.css' );

if ( empty( $wp_filesystem ) ) {
	require_once ABSPATH . '/wp-admin/includes/file.php';
	WP_Filesystem();
}

if ( $wp_filesystem ) {
	$wp_filesystem->put_contents(
		$filename,
		$css,
		$chmod // predefined mode settings for WP files.
	);
}

/**
 * Woocommerce Support
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * [apexclinic_wrapper_start description]
 */
function apexclinic_wrapper_start() {
	echo wp_kses_post( '<section id="main">' );
}
add_action( 'woocommerce_before_main_content', 'apexclinic_wrapper_start', 10 );

/**
 * [apexclinic_wrapper_end description]
 */
function apexclinic_wrapper_end() {
	echo wp_kses_post( '</section>' );
}
add_action( 'woocommerce_after_main_content', 'apexclinic_wrapper_end', 10 );

/**
 * [woocommerce_support description]
 */
function apexclinic_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'apexclinic_woocommerce_support' );

// Remove the product rating display on product loops.
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Ajax cart basket.
add_filter( 'woocommerce_add_to_cart_fragments', 'apexclinic_iconic_cart_count_fragments', 10, 1 );

// Woocommerce product per page.
add_filter( 'loop_shop_per_page', 'apexclinic_shop_per_page', 20 );

/**
 * Undocumented function
 *
 * @param [type] $cols Columns.
 */
function apexclinic_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = esc_html( apexclinic_global_var( 'shop-products-per-page', '', false ) );
	return $cols;
}
/**
 * [apexclinic_iconic_cart_count_fragments description]
 *
 * @param  [type] $fragments description.
 * @return [type]            [description]
 */
function apexclinic_iconic_cart_count_fragments( $fragments ) {
	$fragments['span.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
	return $fragments;
}

/**
 * Set Site Icon
 */
function apexclinic_site_icon() {
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
		if ( apexclinic_global_var( 'favicon', 'url', true ) ) :
			?>
			<link rel="icon" href="<?php echo esc_url( apexclinic_global_var( 'favicon', 'url', true ) ); ?>" sizes="32x32" />
			<link rel="icon" href="<?php echo esc_url( apexclinic_global_var( 'apple-icon', 'url', true ) ); ?>" sizes="192x192">
			<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( apexclinic_global_var( 'apple-icon', 'url', true ) ); ?>" />
			<meta name="msapplication-TileImage" content="<?php echo esc_url( apexclinic_global_var( 'apple-icon', 'url', true ) ); ?>" />
		<?php else : ?>
			<link rel="icon" href="<?php echo esc_url( get_parent_theme_file_uri( '/images/favicon.ico' ) ); ?>" sizes="32x32" />
			<link rel="icon" href="<?php echo esc_url( get_parent_theme_file_uri( '/images/favicon.ico' ) ); ?>" sizes="192x192">
			<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_parent_theme_file_uri( '/images/favicon.ico' ) ); ?>" />
			<meta name="msapplication-TileImage" content="<?php echo esc_url( get_parent_theme_file_uri( '/images/favicon.ico' ) ); ?>" />
		<?php endif; ?>
		<?php
	}
}
add_filter( 'wp_head', 'apexclinic_site_icon' );

add_filter(
	'wp_prepare_attachment_for_js',
	function( $response, $attachment, $meta ) {
		if (
			'image/x-icon' === $response['mime'] &&
			isset( $response['url'] ) &&
			! isset( $response['sizes']['full'] )
		) {
			$response['sizes'] = array(
				'full' => array(
					'url' => $response['url'],
				),
			);
		}
		return $response;
	},
	10,
	3
);

if ( ! function_exists( 'apexclinic_pagination' ) ) {

	/**
	 * Displays pagination on archive pages
	 */
	function apexclinic_pagination() {

		global $wp_query;

		$big = 999999999; // need an unlikely integer.

		$paginate_links = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'next_text' => esc_html__( 'Next Page &raquo;', 'apexclinic' ),
				'prev_text' => esc_html__( '&laquo; Previous Page', 'apexclinic' ),
				'end_size'  => 5,
				'mid_size'  => 5,
				'add_args'  => false,
			)
		);

		// Display the pagination if more than one page is found.
		if ( $paginate_links ) :
			?>

			<div class="pagination clearfix">
				<?php echo wp_kses_post( $paginate_links ); ?>
			</div>

			<?php
		endif;
	}
}

if ( ! function_exists( 'apexclinic_pagination' ) ) {

	/**
	 * Displays pagination on archive pages
	 */
	function apexclinic_pagination() {

		global $wp_query;

		$big = 999999999; // need an unlikely integer.

		$paginate_links = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'next_text' => esc_html__( 'Next Page &raquo;', 'apexclinic' ),
				'prev_text' => esc_html__( '&laquo; Previous Page', 'apexclinic' ),
				'end_size'  => 5,
				'mid_size'  => 5,
				'add_args'  => false,
			)
		);

		// Display the pagination if more than one page is found.
		if ( $paginate_links ) :
			?>

			<div class="pagination clearfix">
				<?php echo wp_kses_post( $paginate_links ); ?>
			</div>

			<?php
		endif;
	}
}


/**
 * Display the breadcrumbs.
 */
function apexclinic_breadcrumbs() {

	$show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	if ( ! apexclinic_global_var( 'breadcrumb_arrow_style', '', false ) ) {
		$delimiter = '<span class="gap"><i class="el el-chevron-right"></i></span>';
	} else {
		$delimiter = '<span class="gap"><i class="' . apexclinic_global_var( 'breadcrumb_arrow_style', '', false ) . '"></i></span>';
	}

	$home         = esc_html__( 'Home', 'apexclinic' ); // text for the 'Home' link.
	$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before       = '<span class="current">'; // tag before the current crumb.
	$after        = '</span>'; // tag after the current crumb.

	global $post;
	$home_link = get_home_url( 'url' );

	if ( is_home() && is_front_page() ) {

		if ( 1 === $show_on_home ) {
			echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'apexclinic' ) . '</a></div>';
		}
	} elseif ( class_exists( 'woocommerce' ) && ( is_shop() || is_singular( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) ) {

		/**
		 * Undocumented function
		 *
		 * @return void
		 */
		function my_woocommerce_breadcrumbs() {
			if ( ! apexclinic_global_var( 'breadcrumb_arrow_style', '', false ) ) {
				$delimiter = '<span class="gap"><i class="el el-chevron-right"></i></span>';
			} else {
				$delimiter = '<span class="gap"><i class="' . apexclinic_global_var( 'breadcrumb_arrow_style', '', false ) . '"></i></span>';
			}
			return array(
				'delimiter'   => $delimiter,
				'wrap_before' => '<div id="crumbs" itemprop="breadcrumb">',
				'wrap_after'  => '</div>',
				'before'      => '',
				'after'       => '',
				'home'        => _x( 'Home', 'breadcrumb', 'apexclinic' ),
			);
		}
		add_filter( 'woocommerce_breadcrumb_defaults', 'my_woocommerce_breadcrumbs' );
		woocommerce_breadcrumb();
	} else {

		echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'apexclinic' ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
		if ( is_home() ) {
			echo wp_kses_post( $before ) . get_the_title( get_option( 'page_for_posts', true ) ) . wp_kses_post( $after );
		} elseif ( is_category() ) {
			$this_cat = get_category( get_query_var( 'cat' ), false );
			if ( 0 != $this_cat->parent ) {
				echo get_category_parents( $this_cat->parent, true, ' ' . wp_kses_post( $delimiter ) . ' ' );
			}
			echo wp_kses_post( $before ) . esc_html__( 'Archive by category "', 'apexclinic' ) . single_cat_title( '', false ) . '"' . wp_kses_post( $after );
		} elseif ( is_search() ) {
			echo wp_kses_post( $before ) . esc_html__( 'Search results for "', 'apexclinic' ) . get_search_query() . '"' . wp_kses_post( $after );
		} elseif ( is_day() ) {
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
			echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
			echo wp_kses_post( $before ) . get_the_time( 'd' ) . wp_kses_post( $after );
		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
			echo wp_kses_post( $before ) . get_the_time( 'F' ) . wp_kses_post( $after );
		} elseif ( is_year() ) {
			echo wp_kses_post( $before ) . get_the_time( 'Y' ) . wp_kses_post( $after );
		} elseif ( class_exists( 'Tribe__Events__Main' ) && ( is_singular( 'tribe_events' ) || ( tribe_is_past() || tribe_is_upcoming() && ! is_tax() ) || ( tribe_is_month() && ! is_tax() ) || ( tribe_is_day() && ! is_tax() ) ) ) {
			echo wp_kses_post( $before ) . esc_html( apexclinic_global_var( 'event_banner_title', '', false ) ) . wp_kses_post( $after );
		} elseif ( is_single() && ! is_attachment() ) {
			if ( 'post' != get_post_type() ) {
				$post_type = get_post_type_object( get_post_type() );
				$slug      = $post_type->rewrite;

				$cpost_label = $slug['slug'];
				$cpost_label = implode( '-', array_map( 'ucfirst', explode( '-', $cpost_label ) ) );
				$cpost_label = str_replace( '-', ' ', $cpost_label );

				if ( 'team' == get_post_type() || 'case-studies' == get_post_type() ) {
					echo '<a href="' . esc_url( $home_link ) . '/' . esc_attr( $slug['slug'] ) . '/">' . esc_html( $cpost_label ) . '</a>';
				} else {
					echo '<a href="' . esc_url( $home_link ) . '/' . esc_attr( $slug['slug'] ) . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
				}

				if ( 1 == $show_current ) {
					echo ' ' . wp_kses_post( $delimiter ) . ' ' . wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
				}
			} else {
				$cat  = get_the_category();
				$cat  = $cat[0];
				$cats = get_category_parents( $cat, true, ' ' . wp_kses_post( $delimiter ) . ' ' );
				if ( 0 == $show_current ) {
					$cats = preg_replace( "#^(.+)\s$delimiter\s$#", '$1', $cats );
				}
				echo wp_kses_post( $cats );
				if ( 1 == $show_current ) {
					echo wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
				}
			}
		} elseif ( ! is_single() && ! is_page() && 'post' != get_post_type() && ! is_404() ) {
			$post_type = get_post_type_object( get_post_type() );
			echo wp_kses_post( $before ) . esc_html( $post_type->labels->singular_name ) . wp_kses_post( $after );
		} elseif ( is_attachment() ) {
			$parent = get_post( $post->post_parent );
			$cat    = get_the_category( $parent->ID );
			$cat    = $cat[0];
			echo wp_kses_post( get_category_parents( $cat, true, ' ' . $delimiter . ' ' ) );
			echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>';
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses_post( $delimiter ) . ' ' . wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
			}
		} elseif ( is_page() && ! $post->post_parent ) {
			if ( 1 == $show_current ) {
				echo wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
			}
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id   = $post->post_parent;
			$breadcrumbs = array();
			while ( $parent_id ) {
				$page          = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id     = $page->post_parent;
			}
			$breadcrumbs       = array_reverse( $breadcrumbs );
			$count_breadcrumbs = count( $breadcrumbs );
			for ( $i = 0; $i < $count_breadcrumbs; $i++ ) {
				echo wp_kses_post( $breadcrumbs[ $i ] );
				if ( ( count( $breadcrumbs ) - 1 ) != $i ) {
					echo ' ' . wp_kses_post( $delimiter ) . ' ';
				}
			}
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses_post( $delimiter ) . ' ' . wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
			}
		} elseif ( is_tag() ) {
			echo wp_kses_post( $before ) . esc_html__( 'Posts tagged "', 'apexclinic' ) . single_tag_title( '', false ) . '"' . wp_kses_post( $after );
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo wp_kses_post( $before ) . esc_html__( 'Articles posted by ', 'apexclinic' ) . esc_html( $userdata->display_name ) . wp_kses_post( $after );
		} elseif ( is_404() ) {
			echo wp_kses_post( $before ) . esc_html__( 'Error 404', 'apexclinic' ) . wp_kses_post( $after );
		}

		if ( get_query_var( 'paged' ) ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ' (';
			}
			echo esc_html_e( 'Page', 'apexclinic' ) . ' ' . get_query_var( 'paged' );
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ')';
			}
		}

		echo '</div>';
	}
}

/**
 * [apexclinic_template_caching description]
 *
 * @param  WP_Screen $current_screen description.
 */
function apexclinic_template_caching( WP_Screen $current_screen ) {
	// Only flush the file cache with each request to post list table, edit post screen, or theme editor.
	if ( ! in_array( $current_screen->base, array( 'post', 'edit', 'theme-editor' ), true ) ) {
		return;
	}
	$theme = wp_get_theme();
	if ( ! $theme ) {
		return;
	}
	$cache_hash    = md5( $theme->get_theme_root() . '/' . $theme->get_stylesheet() );
	$label         = sanitize_key( 'files_' . $cache_hash . '-' . $theme->get( 'Version' ) );
	$transient_key = substr( $label, 0, 29 ) . md5( $label );
	delete_transient( $transient_key );
}
add_action( 'current_screen', 'apexclinic_template_caching' );






/**
 * Change slug of custom post types
 *
 * @param  [type] $args      description.
 * @param  [type] $post_type description.
 * @return [string]
 */
function apexclinic_register_post_type_args( $args, $post_type ) {

	if ( 'portfolio' === $post_type ) {
		$args['rewrite']['slug'] = apexclinic_global_var( 'change_slug_portfolio', '', false );
	}

	if ( 'team' === $post_type ) {
		$args['rewrite']['slug'] = apexclinic_global_var( 'change_slug_team', '', false );
	}

	if ( 'case-studies' === $post_type ) {
		$args['rewrite']['slug'] = apexclinic_global_var( 'change_slug_casestudies', '', false );
	}

	return $args;
}
add_filter( 'register_post_type_args', 'apexclinic_register_post_type_args', 10, 2 );

/**
 * Add new mimes for custom font upload
 */
if ( ! function_exists( 'apexclinic_upload_mimes' ) ) {
	/**
	 * [apexclinic_upload_mimes description]
	 *
	 * @param array $existing_mimes description.
	 */
	function apexclinic_upload_mimes( $existing_mimes = array() ) {
		$existing_mimes['woff'] = 'font/woff';
		$existing_mimes['ttf']  = 'application/x-font-ttf';
		$existing_mimes['svg']  = 'font/svg';
		$existing_mimes['eot']  = 'font/eot';
		return $existing_mimes;
	}
}
add_filter( 'upload_mimes', 'apexclinic_upload_mimes' );

/**
 * UNWANTED NOTICE REMOVE
 *
 * @return void
 */
function radiantthemes_unwanted_notice_remove() {
	echo '<style type="text/css">.rs-update-notice-wrap,.vc_license-activation-notice{display:none;}</style>';
}
add_action( 'admin_head', 'radiantthemes_unwanted_notice_remove' );



/**
 * Unyson Demo Import
 *
 * @param FW_Ext_Backups_Demo[] $demos Demos.
 * @return FW_Ext_Backups_Demo[]
 */
function radiantthemes_fw_ext_backups_demos( $demos ) {
	$demos_array = array(
		
		'apexclinic1' => array(
			'title'        => __( 'Cosmetic Surgery', 'apexclinic' ),
			'screenshot'   => '//api.radiantthemes.com/demo-data/apexclinic/cosmetic-surgery/cosmetic-surgery.jpg',
			'preview_link' => 'https://apexclinic.radiantthemes.com/cosmetic-surgery/',
		),
		'apexclinic2'=> array(
			'title'        => __( 'Clinic','apexclinic' ),
			'screenshot'   => '//api.radiantthemes.com/demo-data/apexclinic/clinic/clinic.jpg',
			'preview_link' => 'https://apexclinic.radiantthemes.com/clinic/',
		),
		'apexclinic3'=> array(
			'title'        => __( 'Clinic Two','apexclinic' ),
			'screenshot'   => '//api.radiantthemes.com/demo-data/apexclinic/clinic-two/clinic-two.jpg',
			'preview_link' => 'https://apexclinic.radiantthemes.com/clinic-two/',
		),
		'apexclinic4'=> array(
			'title'        => __( 'Dentist','apexclinic' ),
			'screenshot'   => '//api.radiantthemes.com/demo-data/apexclinic/dentist/dentist.jpg',
			'preview_link' => 'https://apexclinic.radiantthemes.com/dentist/',
		),
		'apexclinic5'=> array(
			'title'        => __( 'Pediatric Clinic','apexclinic' ),
			'screenshot'   => '//api.radiantthemes.com/demo-data/apexclinic/pediatric-clinic/pediatric-clinic.jpg',
			'preview_link' => 'https://apexclinic.radiantthemes.com/pediatric-clinic/',
		),
		'apexclinic6'=> array(
			'title'        => __( 'Pharmacy','apexclinic' ),
			'screenshot'   => '//api.radiantthemes.com/demo-data/apexclinic/pharmacy/pharmacy.jpg',
			'preview_link' => 'https://apexclinic.radiantthemes.com/pharmacy/',
		),
		
	);
    for($i=1;$i<7;$i++) { 
    $d[$i]= 'https://apexclinic.radiantthemes.com/demo/'.$i;
	
    }
   $i=1;
	foreach ( $demos_array as $id => $data ) {
		$demo = new FW_Ext_Backups_Demo(
			$id,
			'piecemeal',
			array(
				'url'     => $d[$i],
				'file_id' => $id,
			)
		);
		
		$demo->set_title( $data['title'] );
		$demo->set_screenshot( $data['screenshot'] );
		$demo->set_preview_link( $data['preview_link'] );

		$demos[ $demo->get_id() ] = $demo;

		unset( $demo );
		$i++;
	}

	return $demos;
}
add_filter( 'fw:ext:backups-demo:demos', 'radiantthemes_fw_ext_backups_demos' );

/**
 * Check given purchase code
 */
function get_purchase_code() {

	check_ajax_referer( 'colorCategoriesNonce', 'nonce' );

	$purchase_code     = $_POST['purchaseCodeVal'];
	$purchase_code_val = trim( $purchase_code );
	$user_name         = $_POST['userNameVal'];
	$user_name_val     = trim( $user_name );

	update_option( 'radiant_purchase', $purchase_code_val );
	update_option( 'radiant_user_name', $user_name_val );

	$verify_url = "https://api.envato.com/v3/market/author/sale?code={$purchase_code_val}";

	$headers = array(
		'Authorization' => 'Bearer kJGTj79tKIlW6YuLVXHeKlTHRBpBc1At',
	);

	$request = array(
		'headers' => $headers,
	);

	$get_file = wp_remote_get( $verify_url, $request );

	$data = wp_remote_retrieve_body( $get_file );

	if ( is_wp_error( $data ) ) {
		return false;
	}

	$final_data = json_decode( $data, true );

	$result = ( ( $final_data['buyer'] === $user_name_val ) && 22433486 === $final_data['item']['id'] ) ? 'success' : 'failed';

	update_option( 'radiant_purchase_validation', $result );

	echo esc_html( $result );

	wp_die(); // this is required to terminate immediately and return a proper response.

}
add_action( 'wp_ajax_rtGetPurchaseCode', 'get_purchase_code' );
