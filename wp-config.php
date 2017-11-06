<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/var/www/_caitiemarie.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'caitiemarie_com');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Monkey105!');

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
define('AUTH_KEY',         'szVh"wqpfK*r:Rk^ghDKqx+Xxr$Fb3L`j#1dbBYm*UlUcwKBMh78Hy&v8lXo`Q:L');
define('SECURE_AUTH_KEY',  'JIC/rx%iKd7a5H#iDpt$1ib|/z;0C3x4nwee%|af&9VzjrXvsxYsgF~GOSC/vsf9');
define('LOGGED_IN_KEY',    'vU?7)r7&wU(MxuVbcmDqr8"*xrSW~@OP!DN:yuV5pdKzk1#3r)#?cllzzCFHtQ8+');
define('NONCE_KEY',        'MpnCW?I~LRCzmNBO%amsQ*AjiUK^D1^6Li_l(XBD99s^(Yn94%+pM`EO%1k:QI*1');
define('AUTH_SALT',        ':erm%VeJe7JHZ%UL2*V:XKtXg`Br&Mh$+#P+he7!odH@t;(g8eKrnE9hqxT&);pu');
define('SECURE_AUTH_SALT', '/%obVXMzk!O%%Mtt$3i$U%#rSh^*DQISCVXFv@!/L2+aW+3R)m`GpN?/3%A*j^U;');
define('LOGGED_IN_SALT',   ';A#wTj?w)pq$HVGV?WPOytLj"Q:66@duT%RiFERmPBMGUIxnwYvB1M&O&QH@u(Fq');
define('NONCE_SALT',       'm;F:~TheO(WVf2:7CnmsXwzz*YKo^e88Q^VN*g(2h$m_0e8^Ebyx(zGdmaC;b!TZ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_ttcwug_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
