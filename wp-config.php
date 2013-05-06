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
define('DB_NAME', 'nwc_production');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'N2rZ5sfWK-b8:V0aB]p.TV+Adwxy$vm>/FZHh4bZo+04UnG[K|<|=1U?rm(*t{@9');
define('SECURE_AUTH_KEY',  'Qk-8Q-]O!KlEq3nH`kGM0@pp4+QD|v_l F53+7F+Y*HUmr)yYI9SD&i8a:%nG{L6');
define('LOGGED_IN_KEY',    '-EVKy_*u+oe.n1#P+$T{}+~>EY-EqhkEdr~pw7<A4dvIy^Ft5NNs4chAlw8,%rbK');
define('NONCE_KEY',        ':9k{3k2O;y=ZuNg,&&*Ut6K7:fo&;qMsKcj!a>+P(1-S*bYz5Z4%V|2,c-6hM8u]');
define('AUTH_SALT',        'ecW~n)+ 1~OWvlt0s^-B;RthI-q=&EeSGz?ZM[Rk{Tkkb$|8NdoLTqe.J~H4Xw^t');
define('SECURE_AUTH_SALT', 'z!yLXn>yLY4[I|1ocHAY+pR$YW!%JvUV.owLq_qI|MLnX.@B+/n/c^]2(7zh%pEh');
define('LOGGED_IN_SALT',   'mPrZ3s#%QHX7pO/FLx!R#K>jiLuA?RFc0x,+8_TwrN0s4GM8ca]_><J[jrsN?+#9');
define('NONCE_SALT',       'E?@|WV^ y:.>S+e?|@q[+z-*-+]k(2|Xt>&RY[$5BltpaD}VC]Oe(|Old$;@CDzN');

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
