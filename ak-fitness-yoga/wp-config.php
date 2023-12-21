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
define( 'DB_NAME', 'gco_ak_fitness_yoga' );

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
define( 'AUTH_KEY',         'CM(%=3;8^,y3Cq~^}-&vg*c<:,RX>1L114?7RK#|C,NpI*??8q=1@im]>@>]v]~k' );
define( 'SECURE_AUTH_KEY',  'xBlYi[mqGLo<R4fg8c@tzx]>57Jap:@(x88@+`,fTWpe2PT4r>JZi$LA 7qS-(3k' );
define( 'LOGGED_IN_KEY',    '7Wt8F;_x2y|K7KJ Ugi>rs7`%i(7C94&LvRHR 0 j67P-Wde^kg`z]D?RvR^/[NM' );
define( 'NONCE_KEY',        '|Rr q_-7$0#E|dw<!s.;I)d iz] E&jbO]fIjkUZFphTQgR)y z*9~P8,us/U:S<' );
define( 'AUTH_SALT',        'a77NF FgsT>o=QlDYyL[Irwr5gSzn0fM2vq(/QyGbB:dOe=%IFgvd:q %T91y^Rd' );
define( 'SECURE_AUTH_SALT', '=o<4zX_ob;+K_3k,mR#29MFZ9Pyi]Nj:%eHUUJi%5]$:|%KCEPE[L{tPpv}|}RW8' );
define( 'LOGGED_IN_SALT',   'o>k{`TD>@L#Cf s2w$z(|:W,N5_zA<z@FcU`injy9]/W2?J{?D!wL]k=y;Cb%Arf' );
define( 'NONCE_SALT',       'H0>[u={N_w;I:5P#L;9O&]Z y%`97BoMqx>1lIXocE8oK4;%4f]z:CNg%AI:!VEE' );

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
