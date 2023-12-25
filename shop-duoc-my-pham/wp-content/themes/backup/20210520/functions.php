<?php
// đường dẫn trang chủ
define('HOME_URI', esc_url(home_url('/')));

// đường dẫn theme
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());
// define('THEME_PAR', get_template_part());

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

// khởi tạo widgets content
require_once(LIBS_DIR . '/widgets/show-widgets.php');

// remove widgets
require_once(LIBS_DIR . '/widgets/remove-widgets.php');

// khởi tạo các action hook
require_once(LIBS_DIR . '/hooks/acction.php');

// khởi tạo các functions hỗ trợ
require_once(LIBS_DIR . '/help.php');

// BFI_Thumb
require_once(LIBS_DIR . '/bfi_thumb/BFI_Thumb.php');

// smtp-gmail
// require_once(LIBS_DIR . '/smtp-gmail/smtp-gmail.php');

if ( class_exists( 'WooCommerce' ) ) {
	// woocommerce
	define('WOO_DIR', THEME_DIR . '/woocommerce');    

    require_once(LIBS_DIR . '/woocommerce/functions.php');
}