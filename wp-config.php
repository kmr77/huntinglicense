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
define( 'DB_NAME', 'licence' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'kXZil1xooQ3YX)>*{wlh?<oPo9F|l~4l%JTrBfb1W/M.S:<i9(D@u?F!R1[g>_=A' );
define( 'SECURE_AUTH_KEY',  'B]{%+s&FMm^p)oXep@tA45qQQKaf)j0x|8tFgKq63tp}87s?AtZd(ktJ&mqdjJ*Y' );
define( 'LOGGED_IN_KEY',    'fgqll78F>V#(iR~xjG{(`e1>D0}(lyqo#o4Gt5z;)+vh GeYWhk,vvr|D|^mXMjJ' );
define( 'NONCE_KEY',        'D_r*B|PN6_+;r D4y1i.(d<L}y9U`QeD.n-|p%.i?QX}6t75{G&/@bnr,WP}{l/G' );
define( 'AUTH_SALT',        'tN1_m$Yg]!&6HJ-X?WM./KXyGC|m09S3#,Vu |x.W8=2 dKV6K^1rVU|A]r+V~of' );
define( 'SECURE_AUTH_SALT', 'MgOoh}#A0g`?aK<8{Iy@$%$2,&<_yDxJCu>uL&#~c#}oo-)d[nzROI`Qg@u!Jf`i' );
define( 'LOGGED_IN_SALT',   'v0g25}1eTlN;].J<G0LGylTC6pZzVmdv:q5@Y)r,Dr>0|YWAxf4J3&(YM~s;R+o`' );
define( 'NONCE_SALT',       '!ai(79ZC-8O`G?QSvOp!oUp*;pesR)^?Mqe(aoO./{F@lo9{ycRnNbHQOQ)D+6_U' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
