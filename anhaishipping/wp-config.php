<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'gco_anhaishipping' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'UJ dYIM|Y5I29daiA_n;]:rc%;4:=Kv7*W#etL`f:Zn-Qo#$D#Ey3>geSD/&b+!1' );
define( 'SECURE_AUTH_KEY',  'Gv?#[?[iW{:))=??X(3r$MmX%E2/xto?VYApnkq@fM&@)g-r(Z;}N=-gOQOIKTnQ' );
define( 'LOGGED_IN_KEY',    '!b5MTXL:~lojVPdp&R8}OC q~fAXX#+^I4O9rt<S4f`-N{/?]yA1(nK~w/V#:`8I' );
define( 'NONCE_KEY',        'E-h8RtKy`Y7y`javQHwO*Id^w_V5v}9C7j cx,NNX{GuqB_V~o.Z<f*:0cN7[3g:' );
define( 'AUTH_SALT',        'j%.jT.7!Qp@f*>Z=8RWt/tRCM>M)x7ab4>5oHh|9,+&V73$KDL-niMe4{w6GQE^L' );
define( 'SECURE_AUTH_SALT', 'Fo@A5nqqYA*PI?es/Vxkk;VgcucoK`)H9:]ZgfS,zHw>q&BRh.<Spv|</p9HaC]x' );
define( 'LOGGED_IN_SALT',   '!m}0a[b;ibF|Q$1U;VT:Dbj_U>NQ?8 _k:tjXO6!kZ!I@2~6{m9?[agBJ3LU#~P5' );
define( 'NONCE_SALT',       'C>:(yodK(OIocMzGOl:m%u&9~[qipz:f?)G~+ 52W)`(;%DV[nNtj-x+G91HrakC' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
