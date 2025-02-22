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
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'o(znYiAFe$zN?II%&8rnvs>geJw9v62H@)g^Vu_TctO|UkjSmCur]_qC?)pzv+p>' );
define( 'SECURE_AUTH_KEY',  '=%)k}O<}41*6DqR%@Gt+>s-Z>t,kPoCOiv1t8Mj(s);^@Si(=we)VhfgCkF3jMe_' );
define( 'LOGGED_IN_KEY',    'Z?f<S},+!`n7u5vyr/MqYlpa|bxY;-{DW&L.<|o(pc5|f!,FXMYna:S/kkvXnWCw' );
define( 'NONCE_KEY',        '!u3[a-f?)at>P$B_)RA(VWVZ!Gm+eZqOH_Ma)yK<CWy=:F^QBPw3xMr2} n@j&YZ' );
define( 'AUTH_SALT',        'ItJSY_u}2]0c: 3`JA5%{jK2RmWU1OcF}<t-Eqmy~SgDca|7.J=MvstJ3~3dj-hv' );
define( 'SECURE_AUTH_SALT', 'nr;|jh}dExnue% JApz*s`DzkMcGOb$<*CB%+bfqX3LX-l3HK> ve8 kDtRz6lVg' );
define( 'LOGGED_IN_SALT',   '>YhI*Ji~k3T8PGB3aP>(:e .ySk fBjwH*6;a.vlhU{9plQ~T@=|+Aw`HJVlBqj=' );
define( 'NONCE_SALT',       'UUX2=k4j40.UOwP>!D6NwG2fJVV(ZT%0y,7b1K%NdO 15=$R)@eK,Ag-)M[&N]5N' );

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