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
define( 'DB_NAME', 'gco_dogonamphat' );

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
define( 'AUTH_KEY',         'eep7nOY]8e*-GvT[u$Q:kqOHnI8<.5 |l5)*48w:x`; 2n3=bI;Crhy4hvl[(nZN' );
define( 'SECURE_AUTH_KEY',  'm4Yj@^+RfFrFDm}DT0=,G*PQF+[ >7R>LyvtXSDa_Q[k+P]*{Tid%mN,c&jB9*?X' );
define( 'LOGGED_IN_KEY',    'KaKMT|~>gs$ADKJ(hg:fKOZ7x91@Dg_eZNvZ|%N`incQ5.X`Jy:m8y:iRCeAHB5L' );
define( 'NONCE_KEY',        'q|&sDk,Z?=N[o+C?CE|X2ij{nu<4x1.e7X^4$xq2dKi4|)u>v`3Q2Be|N:%R+U{]' );
define( 'AUTH_SALT',        'vu0o9iPB#g?atc+>%^~$W4uRfuq D5D>HnM_>QjODOQE%stWG-J?_8iPTf6(q2% ' );
define( 'SECURE_AUTH_SALT', 'OF#x=<J5Gpz<L4!S,W m&>!>Q-R?1r^`kzw?U}2asnhR;1!*s{>]Y$zxFQ>]4b^_' );
define( 'LOGGED_IN_SALT',   '4GQd].3g`}0+sBZKzEfV_iZnSZZ^EEaMISioF{))v|lM6h}k>XcaLTmR76ruXk_m' );
define( 'NONCE_SALT',       'qh/Qwg6_s>i724C=v;[+k|2NmV2_gT%?VeL<o]m?v/r~2i%R%qs]Kusc}8b2$nI%' );

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
