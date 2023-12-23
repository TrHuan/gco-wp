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
define( 'DB_NAME', 'gco_kitchenhome' );

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
define( 'AUTH_KEY',         '``DS[x/5_Y7v]FPNu^nIT`p7LW;>kQcGI4i:wz;}pms_]G=LKnR~22=@iiFM*qE(' );
define( 'SECURE_AUTH_KEY',  'UQe<G{6Z(!BkSn8?-up0=)|S,Z!S5t|cGaaR1Qzm^H3Gu.uu3gHR_=f825(.L;=/' );
define( 'LOGGED_IN_KEY',    'a{~H&|d3:yMrUmelXB<;v5FQM-2XpP7g$HH>OE9q|_m5OEa2FK<!zC{./?9Kqs:S' );
define( 'NONCE_KEY',        'y3t<.kVJlnnog>aOqi3D5j#J]+pm#TSS16J;}5 ~Bt3 RHH@+Y:k/|w3H83p(n(S' );
define( 'AUTH_SALT',        'P5!+#2kgg3]wpL+&oCMK~2K*Hg1fTVk~Z$$-[nw}oC|9>FJ]am=uVj2WMK&Y<_]a' );
define( 'SECURE_AUTH_SALT', '0Ln3ii[{u>UbKwo<zVEU=E,~uCqh1*8N2M`F1|HX@2uM}J8LW;@x *^*`&N/p/J8' );
define( 'LOGGED_IN_SALT',   'lwL=jH}!%M: BrFp:_6~|fc]q(XF#!4nBcO_m|Sdaq!ZXU0V?lguAL0MWf8[hHF ' );
define( 'NONCE_SALT',       'zt ZA[E6NBpebC%D3&!{#)M>$:^xJcJ|4nr na{LwMmC)a2K^w+[.b Z>r9-1+R^' );

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
