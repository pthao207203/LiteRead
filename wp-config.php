<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'literead' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'vy12345' );

/** Database hostname */
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
define( 'AUTH_KEY',         '_L(Nx[BU[KZNat[|&Nxs@vhQP?W^6u=m;.&[F7bF./FWX|M1)?seCO3f`((7SC$Z' );
define( 'SECURE_AUTH_KEY',  '@/>fQzN|B;#PuPZ//dxlgAh6ta,&ElJSum`_%CC]$ Jgc{$ntirc)|,8V=/gf/BF' );
define( 'LOGGED_IN_KEY',    '&S=efx(6big J-2B+!/zT9qVcSyn?JeMi_W/F!oXq*M&3F/>g?^v#9:*4te-q0OR' );
define( 'NONCE_KEY',        'nVom5Zw9j0C?exht]*8H0@&/xJOaa~?vp-!3X>=MY_g8fP)c. D1I:;LfDU4tZC$' );
define( 'AUTH_SALT',        'eH`Z Q6$A;{Y #{1;*bWp9dPPDb ?0mD8{Rd>qTnN}71E9jIlSn,iAdaz;F7)N<F' );
define( 'SECURE_AUTH_SALT', '*Nw2cAi9kr?nBG<$N0=8sc>_/5F5rc)7wW&pj.?%j=,B$O,rpUYJlB=W>Ktfo_LY' );
define( 'LOGGED_IN_SALT',   '*f)1ECuk(y(lAS_*:hX0}IHoVK]7j%Fx.:,`E(rf>>A!-2<RA^34P.Mc@JvlU}`}' );
define( 'NONCE_SALT',       'bhU|m%-SF1_yL.^o:i GOGFy,&%yoz68hpOU;B.}+-C9z3([h%sn>e-ojV?r4r7p' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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