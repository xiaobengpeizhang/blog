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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'Yw8$1,I(l_,D+ )6-HQ~B3Tv+:]*M>7l5)[uiTN8GvR6t9A67Vnl5Pj=NfT1*TB)');
define('SECURE_AUTH_KEY',  'BU:{](3A>mnmuEo%/~#p^g{+B$=BZy0f;fl]BL=)9uI(W/>hb05/SjS#?wb5Y^Fe');
define('LOGGED_IN_KEY',    'YEGBc%lXcP<:3A}8(f!_`Ea>~v:O^<vj_-<(+|xS{{uj{IHAn[59;!!!Km!M;bXK');
define('NONCE_KEY',        'a<0y=ES5Ac_$)&_#2WC5vpdqM$NMOmmcC10=N^{w+lb`R}C)fS:~[^i%4~NZFFRq');
define('AUTH_SALT',        'nYz&G[1ve:-*[InsC}?h*PwY|vic,5A?`If1I#a*y.9PR|gVR]->ADk:bzG/+#7)');
define('SECURE_AUTH_SALT', '.:d6%eP}=Sbr9JZZ}PIgA@&Xey9ax:s}[GfdoZ}y>(!d}(UF8L!MN[dTx;&#G(Nh');
define('LOGGED_IN_SALT',   'x#c&M$.mY)&b:`@1.[UPo8q!BFy8!Hen{LgI^Bl8;9W`YudN|`V&;{#vs{d<f~n,');
define('NONCE_SALT',       '6On,u|wle:bc#Zi<n7pxy*dbebK!.d:BBQt>+P>nHRnI0xg^Px7}u}V7QL?lyrcY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dm_';

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
