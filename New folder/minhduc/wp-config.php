<?php
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
define( 'DB_NAME', 'gco_minhduc' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ':+24]]L2u&zC5b<X@~xjPGy14n:4=<>npCyeP|fq(L0Pl3#pfL5Tk_*jaT]Mwy9|' );
define( 'SECURE_AUTH_KEY',  '^kzD0LXX:w;{5m`dqsfOcaWnPO1j8X.9>fg`5)HoSz@Z!7J2g3#1X<iz8GBRq<bD' );
define( 'LOGGED_IN_KEY',    'Mtsdy}r$Ma$d0eI_ImBrSGX9j((|Cm-!1/!I|2q~Gs##_PkG9w,v}oi4ih2M<zUj' );
define( 'NONCE_KEY',        'TfaDn=slw42sPx<2+H+>DNG8yW!T}GpPw//dnZ_DPnt8LEjIutdMPd?4%7YVBQ/ ' );
define( 'AUTH_SALT',        'ACE42NP3PtX+gGhZ{dC{]qg5&V^dC1N}(4cy)5=5!T#+p~;,%4NX$-kh=1ydd4??' );
define( 'SECURE_AUTH_SALT', ':?z8xx>WYFcoD}7#hZiR2CKb^7`sYvA^esIH}d10p3F,b To=Y>R$n3]r}b<7q|0' );
define( 'LOGGED_IN_SALT',   'xqT>YC0*-{rbj~OjUx:hR9NhEliftZo17WMOyZ3l%AUQmMU{urpX.#+:.{=nywvb' );
define( 'NONCE_SALT',       't/|C~Ct,L6VT!.Tl5ymN6KfNE}LQ9Z%p27Qi}vJ5s>p4R #IW4sU`PeUNHP(8frq' );

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
