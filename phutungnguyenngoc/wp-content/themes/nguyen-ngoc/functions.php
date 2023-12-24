<?php
// đường dẫn trang chủ
define('HOME_URI', esc_url(home_url('/')));

// đường dẫn theme
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

// thông tin theme
$my_theme = wp_get_theme();
define('THEME_NAME', sanitize_title($my_theme->get('Name')));
define('THEME_VERSION', $my_theme->get('Version)'));

// đường dẫn chứa các tài liệu css/js/images/fonts
define('ASSETS_URI', THEME_URI . '/assets');

// đường dẫn thư viện
define('LIBS_DIR', THEME_DIR . '/inc');

// khởi tạo theme
require_once(LIBS_DIR . '/setup.php');

// thiết lập files css + js
require_once(LIBS_DIR . '/head.php');

// khởi tạo các action hook
require_once(LIBS_DIR . '/hooks/action.php');

// khởi tạo các functions hỗ trợ
require_once(LIBS_DIR . '/help.php');

// BFI_Thumb
require_once(LIBS_DIR . '/BFI_Thumb/BFI_Thumb.php');
require_once(LIBS_DIR . '/BFI_Thumb/setting.php');

// Cài đặt những plugins cần thiết
require_once(LIBS_DIR . '/plugins/class-tgm-plugin-activation.php');
require_once(LIBS_DIR . '/plugins/plugins.php');

if ( class_exists( 'ACF' ) ) {
	// theme options
	require_once(LIBS_DIR . '/theme-options.php');
}

if ( class_exists( 'WooCommerce' ) ) {
	// woocommerce
	define('WOO_DIR', THEME_DIR . '/woocommerce');
	
    require_once(LIBS_DIR . '/woocommerce.php');
}

// Custom post types
require_once(LIBS_DIR . '/post-types.php');

// khởi tạo widgets content
require_once(LIBS_DIR . '/widgets/show-widgets.php');

// remove widgets
require_once(LIBS_DIR . '/widgets/remove-widgets.php');

// remove update plugins
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', '__return_null');
define('DISALLOW_FILE_MODS', true);

// remove update themes
remove_action('load-update-core.php', 'wp_update_themes');
add_filter('pre_site_transient_update_themes', create_function('$a', "return null;"));

// remove update core wordpress
add_action('after_setup_theme', 'remove_core_updates');
function remove_core_updates()
{
	if (!current_user_can('update_core')) {
		return;
	}

	//fadd_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
	add_filter('pre_option_update_core', '__return_null');
	add_filter('pre_site_transient_update_core', '__return_null');
}

// xoá chỉnh sửa code theme, plugin trong admin
define('DISALLOW_FILE_EDIT', true);