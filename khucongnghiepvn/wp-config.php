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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "gco_khucongnghiepvn" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         'm2t>y8N=Dz=K-#s67cLD9&>#llNiI^=9(!u:*{p=GqU_62Z/0<YV^ec+*%H>,9Yn' );
define( 'SECURE_AUTH_KEY',  'ihGI&g,N]Q[`_nYIx@PtwZ(p-!|} -)&pWkR_`unnQ&NR5DGL*H6[O5=!h~G7fT.' );
define( 'LOGGED_IN_KEY',    'D9[/apzr`MGmBigoiiYL1X}nG/y&!A39aIYdRH=b0)+Wps~BAhg%o0tup{J^/-s-' );
define( 'NONCE_KEY',        '&bp*w,T.3*boORuiOdl_AP|k)Gg;8R1fFoF[}j}xRfv+>+C$%38x(67CM9]n%U]#' );
define( 'AUTH_SALT',        '*1ktQQ1s;8yA+rS:kx$11($v{UOTweY$swy!1S/dmE8Zc(ZTPHj?>_:2PkVg`9x2' );
define( 'SECURE_AUTH_SALT', 'l%E-}5/VD8Vfh1Ke$PcZ|?o`Vnd~{h]&TLm{r1}Ihah}:8SgIe^5:ks]uo|!~Txl' );
define( 'LOGGED_IN_SALT',   'O D^kFv^$@At@3*u?d}>zbmG?3zVhjz!&d.k(LCBTYQFP`4{<J;beTotQl#}W3wT' );
define( 'NONCE_SALT',       '45;.Ns@%a(GU3ncd%,r6#*rAp8(Knu:ap%7PFPL*DqQ;cZMN}t-rqUpH54-:HgE9' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kcnvncom_';

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
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
