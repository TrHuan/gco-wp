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
define( 'DB_NAME', 'gco_blueeyes_tek' );

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
define( 'AUTH_KEY',         '/T$$?o[7g0+_J&uG:e]NC93|&^cf$hv%L@Y-02 H&j4n12#wgjh$d#[D:sH;c.WZ' );
define( 'SECURE_AUTH_KEY',  'e>JY#]JZZEqN|_9m|tZ+dU@&*U:HILS1(J:#4COMZ?6NW1<`9H!D`Qn@P8;*~VBU' );
define( 'LOGGED_IN_KEY',    '8EYwcT U(~>fBhe<NDFx!@0VCb3`akV}iXN!-WcR1D#n[R^YaVd _P4W@4)V.x7r' );
define( 'NONCE_KEY',        'v`6n%~M>QhCq+$VOsmFk#[-r$|7$Xbhe!KJqx8QQ2c4ITR[VPC4@^6wN`):IN`ka' );
define( 'AUTH_SALT',        'fX4|BAGZY^9*{MV`J+08!_m8T0;OJF&Ulx;!tk?k3}  ~@#lSXGtBtGkqH]6:^Od' );
define( 'SECURE_AUTH_SALT', 'J`S/$F+o~P@%/vES{vE8Jf]in&s1`A27Wj7E8gSbVM6;b~4pBO28mK!Qk!0*3MQP' );
define( 'LOGGED_IN_SALT',   'OWV[bNS7vzE+rDOAg$w5&%+AH4C-w;,pd1)}c? OQ_-Ec&mZ5q,~rT0{!#6.F-X=' );
define( 'NONCE_SALT',       'p;EZFLLpyS=v$+EVNo%y|.A}YQ[8sIe|G3><Q[-o0|VP/)-GW8:Lmma`^5$<E5!5' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
define('WP_MEMORY_LIMIT', '256M');
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
