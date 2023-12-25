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
define( 'DB_NAME', 'gco_yuna' );

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
define( 'AUTH_KEY',         '_zv*~m#]PQP,tarpn,I+t(!duGh`WnyFO{rqvjahz8Y=j(nmBsY,AnMplsa9`U_$' );
define( 'SECURE_AUTH_KEY',  'U=C4:thnuy@;1n:I$FI<h|Our*2WLm!+S;mRa9N]& khuTj7;+uK*xLfu$zGlcfW' );
define( 'LOGGED_IN_KEY',    've%&TP)$[D2O/u=3Ag3uQGleF^Ed#O<666IwI{3N:=|G*~6i=MH<sl+QKx(z[G]S' );
define( 'NONCE_KEY',        'o$TB-SBM:?l?aF-vj8u78A+tTOAk]#Cr7r(6}>9adN{W+N?byuKliUuNF0Ff]44o' );
define( 'AUTH_SALT',        ':lvxf^>_kP!-,OC&(VL>L9-$3Xa~bhq{}2<j;W<+cB1Jil+vNXMjx6`Gzo}|`7a_' );
define( 'SECURE_AUTH_SALT', '6^T}ISg52H>Sm,43sB (AomHVU;|.MjMm{?i4bG/}F.]@|!x`-?`7re;izs/XgNN' );
define( 'LOGGED_IN_SALT',   'd1Y+~[:}]g/Z.=w}Sg+*Y^)]h=d,S~l|DkJ{po]^-F?yNdJYn;_5q.UJVtXOt9#(' );
define( 'NONCE_SALT',       ' i>,ls,[v6MHm$F;1m^!(+V`n0tZJ6wF&T%WKnz[~FzR#_<vi)>jO_1cn.)d0:~V' );

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
