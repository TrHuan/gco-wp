<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

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
define( 'DB_NAME', 'gco_bepbon' );

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
define( 'AUTH_KEY',         'mvkxQiN)iLIpRFt9[HSw(cf9h=*$l]MB1l`cCGA:4-IX.a#r7t>xz7zf7.TjF[@2' );
define( 'SECURE_AUTH_KEY',  'df=Z6;:vr=xy$7Nx3H10_ 1De@[Ndl[5sN?4=Hh!JPz]Mi(dh$={e/.|k{;MTn@U' );
define( 'LOGGED_IN_KEY',    '5p&v)=T+t0R@H%X/{y<M9#8d@8v7Q@.Bb$ftKC_6DRP^/R$=81?1`_Y^N]xbWGyO' );
define( 'NONCE_KEY',        '4FWH)%Ho>o,qrLY)&<>Zl@l#x,-To&y2b`BTImlw6}Q#j?Rm8+.93H 8D/OFt>lH' );
define( 'AUTH_SALT',        '37+%Dos<:6o^!Db86Q.[_Yt9/-LOOfmG*bv)[(9ZA*@7HAPNjAEacWy^:cHu@<Y^' );
define( 'SECURE_AUTH_SALT', ' f]4Eb2*4+f% d9J;9?6Rjd`aeF;0d3lqC33PMs=BC((9gy_Q^1}jumyK2ez[Ow}' );
define( 'LOGGED_IN_SALT',   'yXLR`%U)4Wk<) 74M1kPLO#F*oI0VOcc_0.7=xDNhhT^L{O8pp^q6rZ8p%$2f~5c' );
define( 'NONCE_SALT',       'EzLmwn1_Huhy_T%Euj)sdX$nt0aF;=P=iRV+JlIF+>F*0Dc<wdAOIzYsT79Bewh%' );

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
