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
define( 'DB_NAME', 'gco_psd_furniture' );

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
define( 'AUTH_KEY',         '/p(&ndb?=5SKgVt[RqXxXS%jh~@}W,.sMtB^NQjRo}qn{:0l4 ?[RLu_cis_;._E' );
define( 'SECURE_AUTH_KEY',  '{qu9d/]%+8EG^Yr<ulF<tn^52*ActR q<g}ud[gdZpwpMN@/d;:mMs;}XH,I^gIW' );
define( 'LOGGED_IN_KEY',    '!!:3(q$7q}|MDcP29],P%j8`sP-L?+P,sJ[r@pqnS4.8V#RIRvgIQM7MH2;|d^E ' );
define( 'NONCE_KEY',        'eWz?WL!RL^B]ZH`?Ytf,f/sm 6*Ky 0?`qKD>]hecvs TLuR0sfHol1C#<Bl4IES' );
define( 'AUTH_SALT',        'wzezBl`zMEwP0Ro0@7#7Dm<R#)luDj.TCB%2C9BUzZ.oT50IqIRuxQEV%kJ0r9x;' );
define( 'SECURE_AUTH_SALT', 'E6]d A@u7^ IADdyYrL2|s$F32)%`1g hE,zZ=|pjBq;Qw;42<sgUfK1C6a):,)k' );
define( 'LOGGED_IN_SALT',   'AyTW2z[,lq_!keR;<t.#jsq+u=U;Tld@@Iw~!i;qoNmaQjrSmlvsO!g=$1mbi&ln' );
define( 'NONCE_SALT',       'A?@:rg}n|;:@/B&U1(+^gZzchNlN5-cBu&<t:NFNvl3#-Wb:%:JEn#mU-/iLtRjf' );

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
// define( 'WP_DEBUG', true );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
