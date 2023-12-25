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
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'D:\wamp64\www\job\gco\wp\kho\2018\web-thuc-pham\shop-duoc-my-pham\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'gco_shop_duoc_my_pham' );

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
define( 'AUTH_KEY',         'ng|J$6|0c9~YEy?y:szlAC&?W4/#BHDSX6NvYg=}Zgc$J*jy,ws#c+b:>j=J?!BS' );
define( 'SECURE_AUTH_KEY',  'b2t=_}+RPFCJC*(28zy5*D~1,w/E*n^N y0B# xOUCxJU|y^BsxKdm/X,)M3)^BJ' );
define( 'LOGGED_IN_KEY',    ' #>boK91EJdhfN;Wn|@8-&h<R%o^)$1-E8Ra:#`fg-XVC1)4,,X=,Yo^UV{m3dt{' );
define( 'NONCE_KEY',        '?k`LL!h2&+r+.f@]SfPT`0Pq%{FeHiOddsI8<AcI|5CVw.T:?UX|>6nT5%_>BrgJ' );
define( 'AUTH_SALT',        'LD:ydK?`.|Og/0pUk#mr JS0A79MB.@Dd7cplqTixN~v.zhk&-NLC<*Je#ImzX-v' );
define( 'SECURE_AUTH_SALT', 'vc3zrmT1]qcz#=T2QguZAh!D>hN~5^f|/$5Q[4[I<d4dY{see~X1aGtm<BjM!@6f' );
define( 'LOGGED_IN_SALT',   'yt@gPMh!B+1-$tj<q?HM*op*h>Zv% joW6~&j1[z=/O_.2(U3M+<wJ(OpOV;91h}' );
define( 'NONCE_SALT',       'F~P#w.B3+0S>]6g-sD8)-SFBz=v/*@A%uAd$XLRB9lO.V#Lc4dF@5|5z;|s-@qJP' );

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
// define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
