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
define('DB_NAME', 'literead');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY', 'qRAP9;~9e@kIc2v/WZJIQC}~[,40BV^@:DUM=p294<8@K/RB$v`qqo$YmVMT<k#q');
define('SECURE_AUTH_KEY', 'fC/m|}W`y]5YK~w0J:_&,!Z)r+|W}eeu,Sb2pyMi:9@kG+!!UHI{o{Mq)Z&nUI2 ');
define('LOGGED_IN_KEY', 'RJu7ud28&HJfTowG VUWHC $a[{.R7^yQ*`iGq|z18sk^=lWMpj]a()rwPUhkgjF');
define('NONCE_KEY', 'W-ebP^ZQG~fA-?7F}cNjW{Sj=% 2wpJ]Q{IOdpGO=B%C`!<:D=ynRy2<.7~O92b6');
define('AUTH_SALT', 'Bq-3K;[eotqM90{KohqEQ`hm@-lrlEI(+k4s&OI|sm|l9}QWH7xO1^VT&Zz_ie4l');
define('SECURE_AUTH_SALT', 'j2*H=<6.?F* aWLN%a x5?;o**B3^GZPM~4^~wb] BxD*Vqx}rdJl:Ps_EVOZLsP');
define('LOGGED_IN_SALT', 'xF%1]YbX5V42NbM#sD$X)[-YCwdJcSwm}q(h5)sUw(3P:6&~^7-lL~6oAVs9|5#R');
define('NONCE_SALT', '+R|9r.[{(xGQdOK6!a}e2h^6l6B7IJ*o3:yK``}uQ s&v0jK]oSUT|J2&,b1)KV.');

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';