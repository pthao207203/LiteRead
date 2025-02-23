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
define( 'AUTH_KEY',         'kyB!Gw=<P7HN[FB=e){iGyC,qXii!onJ~/qG/6ma&+PnY0sVdq4#F KHQywe:O1$' );
define( 'SECURE_AUTH_KEY',  '`Caur9BMJzZ#McKN`wp*WWq$.=w_hc)uA?RW1{hx~;y^dV+cb.M6N0gl9;b){NOo' );
define( 'LOGGED_IN_KEY',    'VYN)pok!P)Y6i1kcSiKO]R}XU)Yt.&Mu6eUNVbh;jij<u`w&C$t@@Sg#:@_;GC|n' );
define( 'NONCE_KEY',        'G^O2`eCHUT8RVa?rzV/-rC,?i%yu|R$a@/,qqb%/7O2.?h*.0Q)F:Uf.qr:o!wK`' );
define( 'AUTH_SALT',        'A~{0i<I]1y7mPLiP2s:y{auaajVyN&8k& }Dr[OLB;#69.wtohn}zXsm0~)u&DWV' );
define( 'SECURE_AUTH_SALT', 'iDIYbfe`;7HB!_[3brxCH!hHTZDk`/v,#AcTteh@biIc/r/<v66B!ppj?T}!o_;C' );
define( 'LOGGED_IN_SALT',   '^U[>#Eo+7DPbUAFzu+Oe_~_-ct*8[Ew.BMa&`OL*0sCWDg!gkTTdus7(53=NR,2[' );
define( 'NONCE_SALT',       '(Ln&s:vfQ=+JwQtoUdwjP_eXYb@dnNefT9C,.(Q)W_rp6$G`n^(*@y_KcewQ# T0' );

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