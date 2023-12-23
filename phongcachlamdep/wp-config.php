<?php
define( 'WP_HOME', 'http://localhost/gco/projects/phongcachlamdep/' );
define( 'WP_SITEURL', 'http://localhost/gco/projects/phongcachlamdep/' );
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
define( 'DB_NAME', 'gco_phongcachlamdep' );
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
define( 'AUTH_KEY',         'yny~@Fv)!~+@0aI7i7K79;Ni.bSUv 8By#m:_6fPV#-s3%s!;zbPqx|g@zT<Tz~5' );
define( 'SECURE_AUTH_KEY',  'e{7I8!; q5<vw~4,/lI6$a>(#Yxy;D|En5}48ED|?q3lzz`:S4]|xBurKjLci1 )' );
define( 'LOGGED_IN_KEY',    'Z!_=ewtzLQ1@q[KK6p#~[N?s@a3-J_%yH^LRwN[P4*bQVlNi%pIl6*k?^q6>RWXB' );
define( 'NONCE_KEY',        '#:h~qT#GD{1;bB0iE9Ou.;rnQn^7,En2u:@7vp3C@&#@=>FM|/7v-3:Fyv6 hO`8' );
define( 'AUTH_SALT',        ' QGEBR}1pbfA6QUZ1 4UjEFV{B<cghB&L{{n=1_Kg##;K,/L>c)_f%(KGmY/]]Wv' );
define( 'SECURE_AUTH_SALT', 'CEUrXf=0yC(:=<_w;YOk-45nSC?W[NtIu;<W.`z<VKFqB[,t:%w]jZn1s[(4!kLu' );
define( 'LOGGED_IN_SALT',   's3z}oiiBnd]k@LK{rBzFsa$RtesJ4VRmb!)/bS]<7>#gXi1CfjOFog[r=g-KiDa=' );
define( 'NONCE_SALT',       '?QjL^sf-G5l|cFJLxe;fJcW{D&![Kb@~Y.%)eA2:YgMpq*&J|R`J+HUd{(9peYTK' );
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