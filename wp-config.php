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
define( 'DB_NAME', 'belvi_db' );

/** Database username */
define( 'DB_USER', 'belvi_user' );

/** Database password */
define( 'DB_PASSWORD', 'Codcod.44' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'ZtFf^ dXHumdn&#w{}Q|,3!`MT[jzI($?p[&xr)|DtMo|atWv``cpFE?(u:F^44D');
define('SECURE_AUTH_KEY',  '++WD7vy~cIr1Xb}n;vklio~tgkPUf/[r{f!9W$?HUza6x O]BVhC87a6(hoi+AAw');
define('LOGGED_IN_KEY',    ';q%T1)e?z^t??:OIJB0r+!TKFSxr2m EWdt;HcyyoF*/[ZvAn[4vJ|iuaV3_of*u');
define('NONCE_KEY',        'aB([Fo#upOpL702V=|+&1@p)`HKbi2o(U77dTHpT+0Y;+TRxLqhjuK8t7r@94c_I');
define('AUTH_SALT',        'eA0kgNe53nS!T&GHo]Dv8f(2{hw/vuT+ti+Cz4|)7bd,aRXV@(?MxLiv*3&=2d{L');
define('SECURE_AUTH_SALT', 'GO]*|8:(Q4DZpN2:Ku%W$1A%&`%&|6Ra{1{/ E<x-#,ucpr0h6Pwx|#/]21Yg+lw');
define('LOGGED_IN_SALT',   'IpDz%(-.&O1@+xOVV-V~Xl`sTExLgMqbCRR|?`:iM r}6w0qEhrjK+K4gmm^*7z(');
define('NONCE_SALT',       'PRzu|a#1;w]?W9rWdm8*hK}/y_a5z+.a:.&HA9_.{yZ}|35b-qYb{(7M10GJA-/y');

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
