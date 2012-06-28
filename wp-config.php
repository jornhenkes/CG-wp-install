<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'christengemeenschap_kampen');

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
define('AUTH_KEY',         '#i>edtMXhXgdgA;$k[kG,|3g6Q[X2PmZUY~d=%D*ed:J}+/![laVon_3#yM[&+jN');
define('SECURE_AUTH_KEY',  'GG|qweeUc1~VPEZ69V;N$r~JL?E[-&*Z?U=M0l:g+wUOPc0rZ]o^poZ>DvW9J]i ');
define('LOGGED_IN_KEY',    'qG5(w`EZTi1>Ld(2eul]*81~0OIUK[&,2 [kXXs>W8v#RR1.<d+-1R=G`hPYRkGv');
define('NONCE_KEY',        '_{Ss~w/!]9$eGQV[M#Zv#lh-_z,LYk;C16`.eI};u>cSI:kzX6;qBe2L?koVrTvC');
define('AUTH_SALT',        'rytgcdeLlat5m~=@Z3DfcL4V:Q3/uvT{[=VnaZle>5sIxbK%P4&.w4x$S`ZgcBWi');
define('SECURE_AUTH_SALT', ';QGs=$}P~RMB9hTTFUFC2F/&vuONUaMXXg=y]{Qzj{1vP^I3r+]J=4<$GaMI4>Ni');
define('LOGGED_IN_SALT',   'H%,Hfc&<(XaYVOqfMi( (E_j4dB4x-(c~fN<^/.w| 7C~A(0&J!&(a>BK^nBFH-e');
define('NONCE_SALT',       '}2+GQ<F`&[qt9)+&LtZ?~2jc#a}AGqj2@?_Z0$o6A1y )9b(^U<3-V(;$.at| Q.');

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
define('WPLANG', 'nl_NL');

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
