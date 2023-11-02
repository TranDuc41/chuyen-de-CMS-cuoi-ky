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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'rG,f<_opKBSA)txg^^gVm?yPMDYdzUdN.[`P$57D:8LG!=D^{szL~sI;?)[zWz2X' );
define( 'SECURE_AUTH_KEY',  'C_Eztp<pvoelR%KckL|IK=IyW*J)^(VQ<o|3$pHZ+]+UC~_;e>RMMNa7QDnQ2aH(' );
define( 'LOGGED_IN_KEY',    'DX7E-_C#6z>kLiz95/g0Cl`LcbiI?.Ge%G:3imWdm-cfOK{@5-*pQb1TuiC>s{r+' );
define( 'NONCE_KEY',        'ZpI]JX)qj?@4Y_>`,B$[ dSvwuYD{I=r+*.WO8m&5hdYNdK?Jq[BLw9v2I:+G@r;' );
define( 'AUTH_SALT',        'TUUh*<`38}|2=$}pTbp >8z~&?c|*DR9Y2@yx^pmBZ@T21U&Ex,%CV`Q5i%G?~<@' );
define( 'SECURE_AUTH_SALT', '4C]likJ*Yxt|Rm{y&J7RAy1<NQX<f=6;9R1WhBy7q*<v1;Gp_4|O(9!5Y.]~do!~' );
define( 'LOGGED_IN_SALT',   't5D6H[P%N{D7w$U}Vr*COLihRF_&{rxnt!Sn4y% JD{u4,Md)j+%]~}-RRH&UNA$' );
define( 'NONCE_SALT',       'GAtn*g[%g@s!E.UB.9Sw[CSI@{?:R]nb^S?vW+6q/)fhE>}4I!d`.C>WizEQ+,9n' );

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
