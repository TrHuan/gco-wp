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
define( 'DB_NAME', 'gco_handmade' );

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
define( 'AUTH_KEY',         'XzftZD!KZ;m<yI(dltgG#kg6e_P=P]r0XystCbX%cykm)c6tuHajwPo*aZLKUQ;+' );
define( 'SECURE_AUTH_KEY',  'hA9g{ |SPY50u$W}b2BfMRalE`H2h/:?u:|.G~vcmDT!mHyB.a(KK-C=KTEN|sMa' );
define( 'LOGGED_IN_KEY',    'Gf&TP?g*]#a<04?QmD.6rPf <&9PXdm&ypX=]cJCMKYP|)gl 17!+h0u$wtF[Ej%' );
define( 'NONCE_KEY',        'MgoF|8*4S^%Ih9#se^+g:QgARVg##?y@5z,lvlbf|rdATPm[bfr_+i*39Th*&: 1' );
define( 'AUTH_SALT',        'dDnI[^wCu}yNG4,=)422dX,H+bU,xI**A54-&_k_dgHE8&(@U+|ASDkY?pCC$q+*' );
define( 'SECURE_AUTH_SALT', '5f:gju9V${c}h[YECdGJV&=@k^;*23CxKS#?a<<Wl.QlKp.F,og|3oTdf5p@sR9Z' );
define( 'LOGGED_IN_SALT',   'Xj^e&z}?CB7|Q7V l#q!<Rv#hn$]BmH(+l<h_4,H:o?6,,m0uB,(f#4eKNb5BIXV' );
define( 'NONCE_SALT',       '6[nuz>:;{5uOk4Q/hrr$Qe9fTSp1DtI*jSa3rcc<FbP p[vE!@&qU)65Y]n-w&7K' );

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
