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
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '.3@O^wEwDLp|]JcC/^Av_RT9{xj+$30:!(x+fjJmp6=gM:Odf5B]rI<x9BVRDIU!');
define('SECURE_AUTH_KEY',  '}*(#xn-J;:z!?$}t!Z}Y#}~8y)k8{pH)S>U9_;Dn:bo?c M4!wyyG)@2jAo,FluK');
define('LOGGED_IN_KEY',    ')K9LZ~eZv:^-LKx]bnunM;0(ww;Jkc|/iVH>$NVg(=;O|)/uj4nbdc:vT3p_txjy');
define('NONCE_KEY',        'kX7;v7avM`l.7S)1U#NU:zB{ks*<:>_ |;]C&wVg@%y,>GgCm{4Q)DF<Ned=!=&Q');
define('AUTH_SALT',        ']6_>o3y(~XpFWQU$e,4{XL!o#RKVo||Den,kjbF%;5@/&Mx=Nl_N$I_xT2Lc]A#.');
define('SECURE_AUTH_SALT', ']ZHR[m^JW1*nTZ,QX:I7AMMwaHQ#}uOT?SxhKO.Md+4=2U0a~-f2Hnxb+Iq_BlqS');
define('LOGGED_IN_SALT',   '_q<q5Nd+h$VfGwrco|Z&ED2wmxj3}{~pB@;Lw/EV|c2:/9W?e}%nGa^h&X)(Wuc|');
define('NONCE_SALT',       ';Y{6ixY9#,1FQ+B|2}QZ`C*g+g0>r)VO&LdUpQLP`B(Ig@]9.R.Ek|:-n5|?[FD)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
