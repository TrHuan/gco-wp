<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gco_minh_quy_glass' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'gr.T5??0]vG-!{)nd)~C<5Z]ur<EbB@km3:T1V##uo>2XPOA$b/8t9zo|=LGtfu[' );
define( 'SECURE_AUTH_KEY',  'uLo> C-h[wNvjw^Hv%Uy-q?P%lQt/AFM}}UD_[YCu |vaM#.J&~6Fqg*6;iWH>w{' );
define( 'LOGGED_IN_KEY',    '=LWN/iJl-=i_kYD.$Hbw,BZc8I[E;M}0#z>PglwGEz^(i|_mRYXbOWwiclGPZ=?<' );
define( 'NONCE_KEY',        '`c1_q*bYT(Y.g5+UensQ8d!)TaZ{#ljQNOY2}G:si!ayq)WmRlHq,r17N5PQGL:]' );
define( 'AUTH_SALT',        'kQRUDd)VwvRCWw|*D~D4|c;fE.|36(}C?*s=r,d@#@f|VM,!bORG-W;l.WCh7rL@' );
define( 'SECURE_AUTH_SALT', '[y9}57z4F8e@z-<.~s#ysH*YMKirUxe#8;(dp1,T(lPd,MF*j$;zO!9] !6iIZ1o' );
define( 'LOGGED_IN_SALT',   'H>Z`x3!Wb*9$UyV>o&HVP3M+2{=x#QOw:zwj?R)*g>08t:~B3-qC3~i.;$nEz8Ao' );
define( 'NONCE_SALT',       '[d~X6`w): n)dQKYR]a.%dw6BVS.HO&X7s;8FB(E2Eg8B.c#])XeaF:bu{8c?Sg@' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
