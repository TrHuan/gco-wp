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
define( 'DB_NAME', 'gco_medhanoi' );

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
define( 'AUTH_KEY',         '$p:?*^Pa#_3^4_${+|J&$m65]g,xU;ZGP]^x|w>9# t#ig>{=M2KB94uklsw3k:B' );
define( 'SECURE_AUTH_KEY',  'S_t HK?V)@kvLvOT&<<CycPn.7f3XJ=-bq)V{~P?5<?.*Qq]>^Ex+BB =9o/od1/' );
define( 'LOGGED_IN_KEY',    '+S#KtVc$#.KaE9/}8NDG)28AF!p2!i$v1RJ+U=zsVj^wFo2.(bC}]@Iz@0Rq=Wzo' );
define( 'NONCE_KEY',        '#:q|Z7ZD6ZfA2dr=w,Ng1f6Z1fH~:(kLxN^Uio:hnn`((pe!>Wqq5t`[TLtS1^wy' );
define( 'AUTH_SALT',        '#NTVT[y]`s%Vg^.8fOK!J5<Dpf2c^?bw|+]?i_>EX[xYr4A.OI24+VCu@2C^[vpu' );
define( 'SECURE_AUTH_SALT', '`_ysZHViWSRNi,4RXs~g^[m9 ^H:Bq21 uX;UY6~5CWls[77XouFT<;nvZ``2,zz' );
define( 'LOGGED_IN_SALT',   'C_=W<#f+d0mq0ipWaZpwHQ5Ss*b6x;NCnm+jbKS^w];-He,a.||c!csio(OC##nS' );
define( 'NONCE_SALT',       'UaxU8tYvWT...3}Q!f`rnby`:TmH^tc7d$1%Ms9iDD*a}{./{k:{ )vp aD&jM$l' );

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
