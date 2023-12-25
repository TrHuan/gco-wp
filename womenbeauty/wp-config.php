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
define( 'DB_NAME', 'gco_women_beauty' );

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
define( 'AUTH_KEY',         'v{/A84dnhu3 f|yA6vq}6KzY1b4f+CDuczVB3yv_ELTW1bwXr_Q)`DLure%KRh<h' );
define( 'SECURE_AUTH_KEY',  '_taVliUQCNKmf!Ouvp-A:A:8?9jl%mcz-=JTQ0Qlulk;r_6+3LmE7ibwg{<G]|Q:' );
define( 'LOGGED_IN_KEY',    'geS2G|KLJeeKh+O4iNk57PKfc.X/9bdX(s.Iwp_6C9`@?+~sQeraJzIC90io[:NF' );
define( 'NONCE_KEY',        '8n<atPk2u^N;|SsY9{1#6=&fRK&kL3=).UXP3M`r]8o[3H0Zp!@W+K@#@W3tHvLj' );
define( 'AUTH_SALT',        'u[KLz Nb[=qN?t.ng :jVMQ6U#Ex 3hgPE&rqY?q;I:UX&o>c :=u/&~p)2)<-&#' );
define( 'SECURE_AUTH_SALT', 'WIn^13cc5?/1?FkgSUcnod:Q+k3/;Q6sfu4=udu_)B&wh`!xITVrO7L:7Hin0,Z`' );
define( 'LOGGED_IN_SALT',   '!{!:(lV@u?/]hpTxZ2QlXn+,Dph&qkiP[i|Sww6/cL7XCejuNqFfjhsJh6X!Q;lF' );
define( 'NONCE_SALT',       'o52PAWdGtc!pfQ?KzTU8t8z%Es,Bsn(,8#ZE**+RWf{fJT 2x/fs6VAr{R_IrVsr' );

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
