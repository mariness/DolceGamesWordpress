<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home4/mallenus/public_html/www.dolcegames.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager

define('DB_NAME', 'mallenus_wrdp5');

/** MySQL database username */
define('DB_USER', 'mallenus_wrdp5');

/** MySQL database password */
define('DB_PASSWORD', 'wnvTmiHeOJ5V4I');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xMlL2nEk=8?=RfJiUX8wuu8gk>fIEL#*-#rBHeQb^|?FRh=8Yr03Q1EjlogWq\`tMTlE@*c2Ep/F0nXc/molh');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '>fiT;_2SJ?q7>W;gLBq-Mv^W0fgpt1*t$yU7Xzo9<yQPi7/AA(y!-C8x1)B!bNb~j8eZMT\`P7S');
define('NONCE_KEY',        'n@C9XF|bMk9D>aREFIFZR5QQN_?SgUKsTpjY?eto!FecJZjpIVw|a~u8EyGrB(BV|zXP(x');
define('AUTH_SALT',        'Bu~<K\`4O<hd2g~?-\`kHcCSW|/2I/Jh@OcZv>/\`@(zb;ow-cNA?k^s3qgWa8eWj-U<ad');
define('SECURE_AUTH_SALT', '7A7F<t$6OpL;h6?xME@n^c1F84G4@Cg<=:Hy-spWDI6Z^fQj\`9eDd556W81N2qo9');
define('LOGGED_IN_SALT',   'tYS3En4O/8>R6K^mL5<#AGZixonMK?!/i)Ci0Tk;B6l3PZ#7#49kh#G0Q/YW(\`50R\`y');
define('NONCE_SALT',       '4#u^mo$#AUBA=BWE*7:QtBIzbB#c_:Y7xy_fzTD5xe/cV5\`bLXvTYHjhCsGzN6V$=^gU((j');

/**#@-*/
define('AUTOSAVE_INTERVAL', 600 );
define('WP_POST_REVISIONS', 1);
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
define( 'WP_AUTO_UPDATE_CORE', true );
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
