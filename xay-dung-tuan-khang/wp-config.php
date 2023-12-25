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
define( 'DB_NAME', 'gco_xay_dung_tuan_khang' );

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
define( 'AUTH_KEY',         '|/%D [i;Z;s_y^yb0t7_}SS&v3dT%WZN#6IGTc{A~;[Nur4%~w%&#A/l!`jRy.8$' );
define( 'SECURE_AUTH_KEY',  'S ^#@cXO iKVZSxJV%S;lXb^0O^lwK7tA$,Y_FP3J:0;6mZ+]rHv_*0|io1:EP2F' );
define( 'LOGGED_IN_KEY',    'Pm_%epFz4b]{wlAVme3x+AZk.3x;?[U!JatFueu)u!I9SQ7.vQ_?D!?Bx8CijWDp' );
define( 'NONCE_KEY',        '*GQeg$>wk%*uXgFDe A(X0L,?DJvb0i =}9Z:QKH/mhJh@ZRM^9x1[C]p[+0|oZ5' );
define( 'AUTH_SALT',        'nz{;B6VO/ %b[{]qxI?:u!17n%= |K5]__SWZ/8[QGsD~/;l/i<#s ;+-oRxmdfw' );
define( 'SECURE_AUTH_SALT', '$phCB!Q>Fg`{(-y$MDm@N<mlSxu:44W}wS.l^(1<#ZVeIO0Z1*0<8s-S6=K {e[|' );
define( 'LOGGED_IN_SALT',   'r=R[p=fce5R_0#+QM+HgmFsAL.?V>6CAu8Ue5(Ycu/v}=Z)`.kApi}CggfW?S?in' );
define( 'NONCE_SALT',       'Q?ooo 3]1_LdRf:-gvtk?eQu@=],rh/l%mX<X&RB@wYqvY_G(`XQG=6U$Bgzj?W3' );

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
