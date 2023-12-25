<?php
ob_start();
session_start();

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

// Readmore
// require_once(LIBS_DIR . '/custom-admin.php');

// BFI_Thumb
require_once(LIBS_DIR . '/BFI_Thumb/BFI_Thumb.php');
if (wp_is_mobile()) {
    require_once(LIBS_DIR . '/BFI_Thumb/setting.php');
} else {
    require_once(LIBS_DIR . '/BFI_Thumb/setting-desktop.php');
}

// Cài đặt những plugins cần thiết
require_once(LIBS_DIR . '/plugins/class-tgm-plugin-activation.php');
require_once(LIBS_DIR . '/plugins/plugins.php');

if (class_exists('ACF')) {
    // theme options
    require_once(LIBS_DIR . '/theme-options.php');
}

if (class_exists('WooCommerce')) {
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

add_action('init', 'wp_cookies_mobile_view');
function wp_cookies_mobile_view()
{
    ob_start();
    session_start();
    if ($_POST['mobileView']) {
        $mobileView = $_POST['mobileView'];
        $_SESSION['mobileView'] = $mobileView;
        setcookie('mobileView', $mobileView, time() + (86400 * 10), "/");
    }
    
    if (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // Many mobile devices (all iPhone, iPad, etc.)
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false
    ) {
        $is_mobile = true;
        return;
    }
    
    if (((isset($_COOKIE['mobileView']) && $_COOKIE['mobileView'] == 1) || (isset($_SESSION['mobileView']) && $_SESSION['mobileView'] == 1)) && (isset($_SESSION['mobileView']) && $_SESSION['mobileView'] != -1) ) {
        add_filter('wp_is_mobile', 'custom_wp_is_mobile');
    }
}



function custom_wp_is_mobile($is_mobile)
{
 
    $is_mobile = true;

    return $is_mobile;
}




function mobile_view_html_func($atts)
{
    ob_start();
    session_start();
    if (((isset($_COOKIE['mobileView']) && $_COOKIE['mobileView'] == 1) || (isset($_SESSION['mobileView']) && $_SESSION['mobileView'] == 1)) && $_SESSION['mobileView'] != -1) {
        $is_mobile = -1;
        $mobile_button = 'Xem phiên bản desktop';
    } else {
        $is_mobile = 1;
        $mobile_button = 'Xem phiên bản mobile';
    }
    $html = '<form method="post" name="state_form">
                <a class="btn btn-mobile" href="javascript:void(0)" onclick="document.state_form.submit()" rel="nofollow" title="' . $mobile_button . '">' . $mobile_button . '</a>
                <input type="hidden" name="mobileView" value="' . $is_mobile . '">
                <input type="submit" name="mobile-submit" style="display: none">
            </form>';



    return $html;
}
add_shortcode('mobile_view', 'mobile_view_html_func');

add_action('init','add_get_val');
function add_get_val() { 
    global $wp; 
    $wp->add_query_var('thuong-hieu'); 
}

add_action('after_setup_theme', function() {
    global $wp_query_count;
    $wp_query_count = null;
});


/**
 * SMTP
 */
// add_action( 'phpmailer_init', function( $phpmailer ) {
//     if ( !is_object( $phpmailer ) )
//     $phpmailer = (object) $phpmailer;
//     $phpmailer->Mailer     = 'smtp';
//     $phpmailer->Host       = 'smtp.gmail.com';
//     $phpmailer->SMTPAuth   = 1;
//     $phpmailer->Port       = 587;
//     $phpmailer->Username   = 'phamthekiem193@gmail.com';
//     $phpmailer->Password   = 'hcmlmsmbmregblhf';
//     $phpmailer->SMTPSecure = 'TLS';
//     $phpmailer->From       = 'phamthekiem193@gmail.com';
//     $phpmailer->FromName   = 'Bếp Việt Đức - bepvietduc.vn';
// });


/**
 * Custom Woocommerce
 */
if ( class_exists( 'WooCommerce' ) ) {


}
/**
 * Hide Menu Page If User Not admin3b
**/
function remove_menus() {
    remove_menu_page( 'plugins.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'themes.php' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'edit.php?post_type=acf-field-group' );
    remove_menu_page( 'admin.php?page=asp_settings' );
}
// add_action( 'admin_menu', 'remove_menus', 999 );

// add_filter( 'wpseo_remove_reply_to_com', '__return_false' );

require_once(THEME_DIR . '/single-product-comments.php');

