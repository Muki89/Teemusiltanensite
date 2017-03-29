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
define('DB_NAME', 'teemusiltanencom');

/** MySQL database username */
define('DB_USER', 'teemusiltanencom');

/** MySQL database password */
define('DB_PASSWORD', 'yno3YZ8&vC');

/** MySQL hostname */
define('DB_HOST', '213.171.200.91');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ARW YHs!OTl(0H$jt&#vCg1u$a)B5)FK#**Ay8E&8,X%`Vt}cRM>czkMC8M}YT~B');
define('SECURE_AUTH_KEY',  '2w]P;,Tjlbh8/,)BKK__a8-zqhzNth@P!RXV>s.uEalkNAm:s^H`&d3rr$@]=J<!');
define('LOGGED_IN_KEY',    'bI1%5v>IxhC%.B.eQP]z<yWz``)w5mTS;,PS!8Q(n+y~_;V]2~XV=[5#u%j#wF[a');
define('NONCE_KEY',        'j|u92|4$(ff?vi64poLLDiv!py5uFd!]PnLvJJr8aZ5QL: +^>5IUk<GjTRnA2&g');
define('AUTH_SALT',        'gr,9p$V^Cgud<|n&Pyk`kB=c(>HkeqA*iSuxM? +95g<qRmiX6z#Bbw34vFx6<cA');
define('SECURE_AUTH_SALT', 'i(F&%38dDEaLR*)d%_6zyq?cr[A$^l-PDFrNeTj](JrgA-2tZ~#!y(vfMP->_RIQ');
define('LOGGED_IN_SALT',   'p8{1_PdG&sw1;<CF+n14],JD7-wv|J<89nLI=s@>l#7zkfrfh[v1m$G+aG@F_Bk$');
define('NONCE_SALT',       '3t>M.h~xC=AcTqB2wpi73Tt5<ZK6kkk/%9[BY:,pmRX`1zF:kR(.$f0 acA]6KhK');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'xbubble_';

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
