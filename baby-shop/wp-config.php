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
define( 'DB_NAME', 'gco_baby_shop' );

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
define( 'AUTH_KEY',         ')cx,f<lu^()OK_bnX ]_DE=2y[9;E~(_-W0N3zF4Q}f4/*KbZ`4jhIpA|(WxB: {' );
define( 'SECURE_AUTH_KEY',  'WF!8hE$+<UOSK5e.1hu(k`AE0nRT9N<JyoyY!N5(Q40#{x[O]joR3MbUiDDE_(00' );
define( 'LOGGED_IN_KEY',    '}+SlPcyv*>ks#_/^<P]_s&JX p3Bfy#a5XF8ZK2`DXnKVDLg;~l%!CSMtTy@J`9G' );
define( 'NONCE_KEY',        'mCN[== v<6XkaNKb|2`RWCJ3mg8g<bq/^i(u}9Kd*,p$F;s.Rmd$2E*z5;Rl%a@z' );
define( 'AUTH_SALT',        '#j{q.ZV7w}[l]HGN9g%4g<Ik~f>hWvS3MBHBxAul-gr348P:ps|b$S-6ea(6s|)%' );
define( 'SECURE_AUTH_SALT', 'l;R==^KxI pa@)nMw[FOpc .bDQDr/&mg#nOcA{Kf|DV>]/yhkTUr6;SbW+-Pxdo' );
define( 'LOGGED_IN_SALT',   '*<vcyA5&kngp=h-`Q5,7LsKi H~~VV^M{.i>)XV=S9%H8AN32>|(b+y0EStf^^[?' );
define( 'NONCE_SALT',       '[atE+MzyBt&rU@C(=[R$xx|O`rc~r=StAm>0.Owc]Sb.Ddb}jN^:bht21$G{(sHn' );

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
