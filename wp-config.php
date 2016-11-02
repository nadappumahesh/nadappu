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
define( 'WP_AUTO_UPDATE_CORE', false );
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/var/www/nadappu/www/nadappu/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'nada_ada2');
//define('DB_NAME', 'nada_nada1');

/** MySQL database username */
define('DB_USER', 'nada_nada1');

/** MySQL database password */
define('DB_PASSWORD', 'media!@#');

/** MySQL hostname */
define('DB_HOST', 'localhost');
//define('DB_HOST', '10.128.208.233');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('DISABLE_WP_CRON', 'true');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p5FGCtFtL$uAC>gQnb#RgZob4~ul|f%v|CWy(k`A@Kpq7Hbc_96!DT|f%GS<>%ZU');
define('SECURE_AUTH_KEY',  'TLk um@: #O6P&+f=&]bdNKd}R>D$AfV#l>TfE-7O ?q!+x<?6$?g)u_-2oqmMuW');
define('LOGGED_IN_KEY',    '=Zz]Kx|+%P0v}F1ZDs0U/7`>0C}(hyVhfVjO)z56NO9}>)[GivFNu(oEOA$|ZOmw');
define('NONCE_KEY',        'V&Iu%bUY . ukVw!?NE,:o{3>R`-cxn}_6cq3%:-jBIj%;ec3KY3fn~p6?D}c}`d');
define('AUTH_SALT',        '.Z$+{s]q-Rd3@PFLI;s(QL<pO4D:!X^3}Si8G%VI=[ I@szClM--@n0,;2u>>ViY');
define('SECURE_AUTH_SALT', 'VVYR{zd%!1I@#)^)fIMVbVHQ-%~tuL6oPY&iz|%FSvkS~SaZ*:v&qRmBqRFuu/Ue');
define('LOGGED_IN_SALT',   'N(8eU,|PD%ODbq{fjL>G.01Z5/2EO^q{+cor**T5gu |0V{r3Sdk0XOp+c?yI8i9');
define('NONCE_SALT',       '%ZR8VcY$@OG:.</?~b~WCxb$f!h-h[au|O+%?W0Ll5`p;6 .&)B3A*Wbk:up84-9');

/**#@-*/

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

define( 'AUTOSAVE_INTERVAL', 100 ); // Seconds
//define( 'COOKIE_DOMAIN', '*.nadappu.com' );

//define('WP_HOME','http://nadappu.com');
//define('WP_SITEURL','http://nadappu.com');

