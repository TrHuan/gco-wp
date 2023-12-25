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
define( 'DB_NAME', 'gco_the_home_pizza' );

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
define( 'AUTH_KEY',         '%-us9r)yFb6atn7neKIZ}<^ 7AGnevVH[^9ub|]=s26lK/Xv [0]Ld(UC2uL>N9`' );
define( 'SECURE_AUTH_KEY',  '%T<{uq7`#~y6ei{yX~Loq~5}Uim.<>lxd[;;{QMKJ^T-RQ+yl^a_{}Axk}rH,pGg' );
define( 'LOGGED_IN_KEY',    '%:8=q,b/|*mC#n:(Qx/gR+1,YAeJ+yhc2bT3xuBi!G9y8C-_e[;f2-}0x/=I$ o?' );
define( 'NONCE_KEY',        'Z^|(<^[~A~_Du0by`<*c/J.OUlx_EXr![fq%/XM?LDM{WERW:2gm]c{GRDKgF:(W' );
define( 'AUTH_SALT',        '`]HLPolm3h 0 7^7LU7_:^1IM<yyd!T`d:2%3x8<7q*m#!zNji~r7>|i}Hb<t_ e' );
define( 'SECURE_AUTH_SALT', '64Bk8r(rBR$JJ-U[OWN 1`_Q4A(IoZHsv1cYu- $gAvxwp;;{}uiViU_K[A=4QCG' );
define( 'LOGGED_IN_SALT',   'I6MV?vBv_}}l1u%J5c`-YM>fFuE5_u%%g9`RDlyTBPK|-`ZDtlv<=Uw/,=Lh_&q-' );
define( 'NONCE_SALT',       '1B+~r<Z[ADCsq`$XT1=ex-mL;JWuw6, .0?lpOvMtpEEAC[E@rVmI%)LG{Da_,.5' );

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
