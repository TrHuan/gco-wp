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
define( 'DB_NAME', 'gcoweb_woodmart' );

/** MySQL database username */
define( 'DB_USER', 'gcowe_woodmart' );

/** MySQL database password */
define( 'DB_PASSWORD', '!Ggg9j86' );

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
define( 'AUTH_KEY',         '<?ZK:/ n0;E!m05k0M6+wI9(ke+wn:X2wc`g|s5^`2y:5cp$ConaN$LE1>wM8!f#' );
define( 'SECURE_AUTH_KEY',  'jnJ*LU)`6Zii~_QgiX09H@AEM|l+;Ww._N(YrC{9`KXq;eMbg0%8av(+!`THBf[s' );
define( 'LOGGED_IN_KEY',    '4K#ITr#C,wK`yMeEhq8#lQz_{mF<z%8V)l}7#@fl(i]dmi:*&ePRby-_/!VfmGbB' );
define( 'NONCE_KEY',        '}o!VF,g1LgxqYtmgPt{OdGtj!AidGy]$~_bC!k?CDQoystn}vsU*.(G0d~e4[/y%' );
define( 'AUTH_SALT',        '|$#tlwEdlUw)q^&2;nhS,SR<<ss1o|QiZY1=*S>fc^+^}$bX[Tn#~z;bZ=1 G(G|' );
define( 'SECURE_AUTH_SALT', '*0#-r4|n!:{k5H78JleD[dAbPr6qQ!|r;z_&LpuGEjo7k&?r9w+T.p}$^{i} E*f' );
define( 'LOGGED_IN_SALT',   'z9[9:D!=(|2|#b~+qDyR0 wK44n~c-u*:c#L}^mCsh)IQG<,316!F$(91mJh~oP{' );
define( 'NONCE_SALT',       'd&WK2,hEQ>ch)4&S9Q<YSrrhq  tKK+(PSEsg=#}}(e}YKr-Vtk2 6;_7:[pu_X!' );

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

define( 'WP_CACHE', true );

define( 'ALLOW_UNFILTERED_UPLOADS', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
