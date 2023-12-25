<?php
// define( 'WP_CACHE', false ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gco_xuctiendautu' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'rN=Q|rQ2X*`k;dh*NLZ:py4Zj_xArRLbx`9o)!B%;</[+l;1$`9*9xG6#$UDEpp<' );
define( 'SECURE_AUTH_KEY',  '<hT8`--&7jC3H-+q-7[FSTPDXWY@}.:&<L/j+EBRk=ry Py.0)yhV@a>=QQ9a+! ' );
define( 'LOGGED_IN_KEY',    '51h)C Dz>THt@]nJzs*^/EdBGhKK-IXZ j9`I)M_X&n~#vgZV4rxM@z{Vte*6Agu' );
define( 'NONCE_KEY',        '~wC,$)&RAW @Z^7xT2&tMIA8mwCKO>nqrZ`1b }@Ax~%Z!`c|$%/N?d[8lPom[Ks' );
define( 'AUTH_SALT',        'H&5s1M1ki&Bkpw6Eurf:[;4/Ao/X18[JIq|{5V9;kHf^meJ~YQU4-rwPekxh+(AW' );
define( 'SECURE_AUTH_SALT', '{Xp&{-~4.y(DoWiV+dBQnY&~1DN^3!EjQEQ-mm^ V0tpFUl!NQm;LHlQENn~Y)mr' );
define( 'LOGGED_IN_SALT',   '8_ptA_8DInWoh5!+0c=@LRd1TJLLm,t0knw;Ama;K:diRyV,%m#ARNr:sIN+:W|i' );
define( 'NONCE_SALT',       '!L[Q67C4#H0%noK!+0ge_+rL,_r>CDV=0rO(E6~ZfWA23RG5J*o4KiCxhMi%tM!*' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'xtdtvn31102022_';

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
// define( 'WP_DEBUG', false );
// define( 'WP_DEBUG_LOG', false );
// define('WP_DEBUG_DISPLAY', false);
// define ('WP_POST_REVISIONS', false);
// define('AUTOSAVE_INTERVAL', 86400 );
// define( 'WP_MEMORY_LIMIT', '256M' );
// define( 'WP_MAX_MEMORY_LIMIT', '256M' );
// define( 'DISALLOW_FILE_EDIT', true );
// define('WP_AUTO_UPDATE_CORE', true);
// define( 'FORCE_SSL_ADMIN', true );
// define('DISABLE_WP_CRON', true);

define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */
// define( 'WP_SITEURL', 'https://xuctiendautu.vn' );
// define( 'WP_HOME', 'https://xuctiendautu.vn' );
// define( 'COOKIE_DOMAIN', 'xuctiendautu.vn' );
// define ( 'WP_CONTENT_FOLDERNAME', 'vn-data' );
// define( 'WP_CONTENT_DIR', '/home/xuctiendautuvn/domains/xuctiendautu.vn/public_html/vn-data' );
// define( 'WP_CONTENT_URL', 'https://xuctiendautu.vn/vn-data' );
// define ( 'WP_PLUGIN_FOLDERNAME', 'modules' );
// define( 'WP_PLUGIN_DIR', '/home/xuctiendautuvn/domains/xuctiendautu.vn/public_html/vn-data/modules' );
// define( 'WP_PLUGIN_URL', 'https://xuctiendautu.vn/vn-data/modules' );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
