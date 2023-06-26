<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'glamping' );

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
define( 'AUTH_KEY',         'Ko(?SreB&VPCVei<33#gl8M`|X<{rSa_#!6,C]#`vT(^JN j,UuKfn*g7u^}4<$m' );
define( 'SECURE_AUTH_KEY',  ']lPY!Y[_9,sO`;sLg#-uPTRcwiwrVq*Z=p_vP=u.Tv[pc0z]f)&>r|f?;+DX`-gT' );
define( 'LOGGED_IN_KEY',    'Gj/O];[>s-@H-iOimF2Pk pj6C}Ax|_y1@:V0lR3)2xggcC)w0T1Z<+?2jm,5+au' );
define( 'NONCE_KEY',        'x5_]S$aj.Oq){GZLApOM{(!l-XzP-yg%Ru,f=bawW:~d633bFtE0]EPs,nftC{0-' );
define( 'AUTH_SALT',        '*s%ZL1ao(NyQf;{wX+nVzWW,IaVxmB*E@a7gbjr2E7i^lI/3e170F*?F6LBK]KoP' );
define( 'SECURE_AUTH_SALT', 'RRk:tX0[_5<tY0<<[|8upI7IL0o9!3fll-nxdUDP430;!{GtV>zRTp!>GlR##tpV' );
define( 'LOGGED_IN_SALT',   'x{F<$ejHCCqQFb<+x.=Q85OgJzIG$8a$h#D4g&;NiW4vR]YjwkM835tS{Owzc^$g' );
define( 'NONCE_SALT',       '(DVWeiRE.[+&B>Kj/cr^iw=^<j*&`V|`;8><GAj]dfvqhTJ2{Q0BL*LW]I(2_.%4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
