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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'zr4m6_8jm4wt3t' );

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
define( 'AUTH_KEY',         '{*..?R1-LypUOm;m0y29M^oCm&(`jS&y5fKU@(_&qyYx&`s{*GWQpeX$Zom< uJY' );
define( 'SECURE_AUTH_KEY',  '|4!ezzGBjg/R8$w@o^o/qHJ(hCHk+_o@mhl} gus,pg,+!1SsY{E`cki Tt/R},G' );
define( 'LOGGED_IN_KEY',    'u}jZ,D&>653Z3zwJXt>-BgZT;c1G*Hf@E=.rHGy@lgz(`mt3*+KX8|L83c;9vZT:' );
define( 'NONCE_KEY',        '8aTD5`is(p@?SUR~9hB_zg*D>^~IO5KTKVA1|&1mV$}A!TQ8:pxQ8krQp+%vcC/e' );
define( 'AUTH_SALT',        'X>s<dKI&}@/rzbcl$b=$Wz[bF:GTgi#GA:PM/6i&x|Q)72:!QSJRzJDa*NAr5jHr' );
define( 'SECURE_AUTH_SALT', ';O=H*p`H)s}Z8T;%aL)qgEl>%@T(J=PNHcfq2o9jypXhg2g3SB)i8FDH7NFr4J8`' );
define( 'LOGGED_IN_SALT',   'BmX7LCvM&>PB^yK^R3yN=v[ ~&|@$iOBi4^=kDtAOMHD5{#}^Fw#5K@I~E&`!C>M' );
define( 'NONCE_SALT',       'RC>Wl$0->YT_(yWXap(I Xj3&g9$}_];X+>={X;07Oq =Z3%%KtMR-JI{_|n:d;`' );

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
