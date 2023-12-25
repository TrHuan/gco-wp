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
define( 'DB_NAME', 'gco_tpcn' );

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
define( 'AUTH_KEY',         'NG2U8otxP.OyHRq-Llg$o[u93wFcLnR/iX@v$0m+o6<r#F|kp>`.cnv1//f!}RzW' );
define( 'SECURE_AUTH_KEY',  '@=E*)sH#bo_XRdz/eCa`]JA:,n!H-1;,V1@c|B}]>aY/8sv`fGO1ebx<~6Po71_k' );
define( 'LOGGED_IN_KEY',    '@^%kt bOJKJI0Y%M/t+-Z[c26d!2ke<[e>>a5G;01apia?!Gh_A@-VSLjO)TE{=b' );
define( 'NONCE_KEY',        '.n7^vb/Mb2/::Ua0NC<7nK`G[Diq+ ObU0J^mTuLK#rLBAW`NN&Etqg{.BKC#nT4' );
define( 'AUTH_SALT',        '^UvIH{gTkCD4Kndj)V1Z&$G<[&JFkq7/2+S;qsX KE0;0Rh5 G8e`O7!o=B@+3,`' );
define( 'SECURE_AUTH_SALT', 'D@me_.xnc~;[G<fMi#QZ&w(RM1S@}:;nWg!XVXwkQiJVMK<TzTE-uQrqa8vKA)R8' );
define( 'LOGGED_IN_SALT',   '->3,V8}^?4(y>QS*Bb&y!HN{r&Oaj-:%C6d?l_>])AhIj6eHdv9:ME$cK..jMBIX' );
define( 'NONCE_SALT',       'Qg>r,[:1ln`aM7|OU+(/$8-HQJCp5L)_EeAfdlv+T)&nXF3:+#:#HjJJ^ehro:Lf' );

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
