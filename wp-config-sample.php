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
define( 'AUTH_KEY',         '1.EO^[>1a<Td/:Xid8iTvg?q/p,m1H`uUQ@fx2!M |${s-h3}sd_l|mqMdjt!5*/' );
define( 'SECURE_AUTH_KEY',  '$G|Px9qeej3Hw0tX;gYkFrZB-P8vfsiahLJO*5WY3lsLFeR$h b&P<[o8NLI(|aa' );
define( 'LOGGED_IN_KEY',    '<Rj<t&p9pO(:sD8c*jx;Ju8;}*bpHpd-s:r`LUfj }I<!MEST),vwg?hF^VHdj}t' );
define( 'NONCE_KEY',        'WBFT[_IWL~(YLRyD=Ha3C(#tG_OlD5Mbo-pp9udt `.5TnflDI*4/6!Q _B5@Y&N' );
define( 'AUTH_SALT',        'mww>(x_u{ jt&cP90DW}U?_wwMLmw@vdnPC|iZV%WKX^OSI34lKR 3k&Of>O2F%:' );
define( 'SECURE_AUTH_SALT', 'ylp`dJUjpPVPv^vf6T.:q@:qb,b?A/J~#kZFIOEbq/yvCyos;jY=BF=%V~:xbz7}' );
define( 'LOGGED_IN_SALT',   'Gr|0t[59)K[IIVS0}xRsO*$j||F@.COq/cxHH^tI2-yG_+[i0%lHDAY4H,&.bF<M' );
define( 'NONCE_SALT',       '<$8d_r^8HVm,trx;SN;bP^29UV_*od~(Z_}]:Jd%VQI 4-x@k7 o7VbBMXr#5oJs' );

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