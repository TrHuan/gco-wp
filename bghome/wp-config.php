<?php
define( 'WP_CACHE', true );


/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'bghome.vn' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'bghomevn_db' );

/** MySQL database username */
define( 'DB_USER', 'bghomevn_db' );

/** MySQL database password */
define( 'DB_PASSWORD', 'BKXb8OPqp' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ';x+y{t]*er(~gtn>I#%u958Prp:5%^rr3[jg*&&yaIorZ0eRG/{v9<xz{CJ$l$t?' );
define( 'SECURE_AUTH_KEY',  '5>ACnX-zG,j6XpGc,,1 >IA`OW,/AOV xR9fA0^B5dl[js-#n)-(It{Sl Z+ngZa' );
define( 'LOGGED_IN_KEY',    'vN5]kueY_)*Xu_M<Vh5 %{S[6zjQ}A#+*Wm5WmEqC-GY+*Bmqgp[EKMc+Yc~]5mT' );
define( 'NONCE_KEY',        's@T$r>ylKJgelq^Ar6&V8)/q3A&a7c(L:Mw1PDX?h767emUb1@2A*z6@y3[0.ILd' );
define( 'AUTH_SALT',        'TIIpyy}|@QAHbLb:[Yich -0pyPRkDwr#a! pFN-8(_I>UivQ=g};HTG{WwO`**n' );
define( 'SECURE_AUTH_SALT', 'j]_j1R8EU@kU95G7F#X%dY6=Opx-K!D7t#+ioMmB41gY[_RWyY$UpIt.e/G:R0?-' );
define( 'LOGGED_IN_SALT',   'x-i7[UpOyYg^80eb$Ku<lu6[[!asHUXC4>UIW@}GPefj8}}f3 BOSBXpDN+-lBb8' );
define( 'NONCE_SALT',       'gs<{Ev:doo=`*`9iL=Y@HZ50Gn7H/(O^l^4cY+xq-U,#kJi6%-*woc@#fxR_dI6+' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
