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
define( 'DB_NAME', 'gco_heroba' );

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
define( 'AUTH_KEY',         'b{&HE.=?[=Ey1Qhm2Gw);NCI5y#L}1je1MiuyN.|u&70&02@lx@(c)cuF?}]ca3+' );
define( 'SECURE_AUTH_KEY',  '8Smgo]GF0o`BU,/0$fX+vI$vzQ;^$8Od;5c5 BO9^GR5*W(H2@0${easdSV.ytj/' );
define( 'LOGGED_IN_KEY',    '2UKxrf~w&B&aXp@&=[LM>k$K<rF|DP0g-;-=o31(VF0:RVq_p!!Da[Hxp!Vg5+R^' );
define( 'NONCE_KEY',        'hMt>5RK[lBR~i?-96v[UkIm}X9io4n)tU?ScS)~$Tq*0Rr:VDrRk+``!S&qp1P|d' );
define( 'AUTH_SALT',        '}Sx}]I<YXrF0Jl6:Xrq|M945Z3S&B`)HVij]jjg(FlppI}BBdATD<XDwFqw>}8si' );
define( 'SECURE_AUTH_SALT', 'qq?NLOGq`J!i) VyD>e=#=xo,PN_21%)}CuCW9IZ]d5dWb[K=10~dc$.Iyo3]Evm' );
define( 'LOGGED_IN_SALT',   '/*ShJqz~y3.jIG4bAt=2jwL2z(_>rDIa?j;Z|)xYR$.91#V}jk{q-PsVO`}_lf=7' );
define( 'NONCE_SALT',       '7|u_vfX/_kR<v+s Pm])Ia6?e*>/X={|>W#d%VhcCtrfT03T~vfe^`a~`}9(j{cF' );

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
