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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'show_case' );

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
define( 'AUTH_KEY',         'T<Ew252O/3:0@*riRV6oA>udfnP>i_>t[U:v+~>g]Sr|U3Iz9$}r>2^A7i!3VfEv' );
define( 'SECURE_AUTH_KEY',  'X#.H^X}N-(gRUM$H#a*qqJ>y&NqN>JKcaP@Ps$^<-w[:_vy`X#s)x(8 PG/HO3xe' );
define( 'LOGGED_IN_KEY',    ',0v c8(;h9!#=[v@xH~C[e!4owlxZFwJ~#?Tc40!vYFrJ;5jCj1|Sj/;9`x,a&|6' );
define( 'NONCE_KEY',        'WYU|2w&d~9v0YH/I<b]& n_.-jK-!pXE3=X`.dGrhsj.$ow=)SBD<Zog41aU*{{2' );
define( 'AUTH_SALT',        '9yc8hngx^ep?Q2sCYoIs,*qkzCdSL]l|t,xkx:u?-Z=EZ4jXgp:hQDj9Bf%o);Cx' );
define( 'SECURE_AUTH_SALT', '&o?rjPYPNBFm9miWJ/ A>hV[}f64=Hc2r08|e}W+MG}1;`{Zz.3.Llo<3(tlQH~u' );
define( 'LOGGED_IN_SALT',   '4Z.OostJ7T8g@Nk@.:FQcg7gi3sh8MW2Kp4+e[n.yR|WA1yXPAMo`:EV19coZ|Gz' );
define( 'NONCE_SALT',       ' 9Zi4Hsx7q,{o5G|4Q.[BV4q?~WTI9s9eP KKMLhf0v|*9];smK!-~kTF;ayS3 /' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
