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
define( 'DB_NAME', 'wp_theme_dev' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'nz0O<F9Uh~+f+b]>I82y0Mj}Wk?V7m#kG9Gr,%(+P>vk^o05L4nw%6$D,,[f%ou=' );
define( 'SECURE_AUTH_KEY',  'KDEjMLt0=A@+u,f?%3!x/.:zXRL:: 0{`xMP(o5wj`YE=G<pCx8T[pOxdcz]LP:K' );
define( 'LOGGED_IN_KEY',    '_NFcAfw7A0YkRhhv6*M2` BT6j7%a8;&;<J=|OB7&30Ybmr0p(~iwYErr)gt]g-p' );
define( 'NONCE_KEY',        'UU &^v+s6lf~=q8qv)3{}C|rek?il]?I?Df%T_STmogO58FY/De[EbOl$fH|r^4I' );
define( 'AUTH_SALT',        'Ov(|cWFTBA}k L|uYas9l(7yc1D:255 ?, q)pG9%sc&R0o48KHO,nT9y:I.?rHD' );
define( 'SECURE_AUTH_SALT', 'Rgu:k0AD}q}c[-_HBV53! Bxwl~BTCO|cuT#:2jT0-tqm6Q@LRp{Hd+:*{uH`n7u' );
define( 'LOGGED_IN_SALT',   'OiOv-/5m{;]H 9MwE22B;-F?_TsS+t)9Po?JyTfcq +R2LX:QH}*bXvYBGUwan8a' );
define( 'NONCE_SALT',       'v#?)&:VM&ozm+R4ZA~`0=i..rFnk*pH[GX`BXiz>+y-t!B&(cWg<ue*`~:bncsJN' );

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
