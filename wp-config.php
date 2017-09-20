<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'WPCACHEHOME', '/home/formulagrowth/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

//define('WP_CACHE', true); //Added by WP-Cache Manager
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */


define('WP_MEMORY_LIMIT', '512M' );
define( 'WP_MAX_MEMORY_LIMIT', '1024M' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'formulagrowth_new');

/** MySQL database username */
define('DB_USER', 'formulagrowth'); // RajeshKumar

/** MySQL database password */
define('DB_PASSWORD', '@jV!A2tQ563U'); // kumar@321  +3oFL=Ch0KRe

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/* define('UPLOADS', 'wp-content/'.'files' ); */


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':El;-OMy;CU/|js%BAgt!+7N^+(WQLVfln99a.9NT!EwuEG8>eML?/!DQ31wh/Uw');
define('SECURE_AUTH_KEY',  'IE1WW)V|Y v$pCDAL_*8*Y2i>5b810(y=j(N<?oG--D+G2g)vOaeWPF~F3fQchNY');
define('LOGGED_IN_KEY',    'h)MRf]bE(NvEjv68eT+nyy6R>{C5.B]+Gz4]RT4jywm8+-:Sxymhektu8z/K%:ru');
define('NONCE_KEY',        'Q}ni8L;EBL<T#g1ug|~ZQ]ZCK,,PR^7uK]WGc? {zB1?|KZTcfoF2+i$E_6zL88:');
define('AUTH_SALT',        'XZ2X%!z]IuD8d@%B2|Kj+zbB rcQYT:_-G<)e|q+p:5rBw@_$Sv++sxe{>j#sI4M');
define('SECURE_AUTH_SALT', 'm9su@ v+nfi1r=n_s#7U@b?=BJ2-&jxneDRE!=O9NZTg%ukq7`x|qc_G,Ftk#?,N');
define('LOGGED_IN_SALT',   'KVmi:s)L =H 6*GJPO-?PD=naI)1UcGc6otEsItL#uQ:I:]eTy9g,0_&{o6&e&vr');
define('NONCE_SALT',       'AXg}b7~Pl3,G0b+q&3R;cfp?Opdq+Mjxb-0WhB,LVYaTV[e+a-Mz~LD|,!<6f;ti');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
/* error_reporting(E_ALL); ini_set('display_errors', 1);
define( 'WP_DEBUG', true);  */

define('WP_DEBUG', FALSE);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
