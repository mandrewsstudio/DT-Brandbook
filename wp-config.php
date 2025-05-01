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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mandrews_wp_vkhos' );

/** Database username */
define( 'DB_USER', 'mandrews_wp_oscfb' );

/** Database password */
define( 'DB_PASSWORD', 'Z93Xm~4hXHzC#LTg' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', 'zMQ)1#8MPTk[10WpcV;&*zVJuz/As3#wCRTFK|4_3I3[5eJCq%(rW44vVChQN_pB');
define('SECURE_AUTH_KEY', 'o/_SJ*g/q14mqC&8088Bo7AW8jl6KN1jt)iI#Yz6NJ4b%idCF6@y3!78HDOn@_3%');
define('LOGGED_IN_KEY', '/Klu-:16d5]ipMVTB;!75|dQY(y939n6ENewV5%l8W_1r+D2MR99f2w:G@NOur4!');
define('NONCE_KEY', '-]fR9O6C8+7Bx+6j6At8A9k(v5z7I[bZ3!@01(]!BVQ0P[2S2I#*F9#SXs14&bJT');
define('AUTH_SALT', 'SLO7~U2V;nSl67d-uH87B[p[4vQk@9(GeM6Lj4~1DmJkJ*248W737P)Ov]laOAMJ');
define('SECURE_AUTH_SALT', 'LuT3r5#q;e5FSa8z(H;39iEa5G*/22vUeibUnNEB#|I3GN@~)@HYf**bFA%mYQ!&');
define('LOGGED_IN_SALT', '1[/b/A1G5WwgdME@9CkkJ-h|X_Sqa%V@R8!l1!9NFGFST8xUHZ_j6*/Ei9#@!7)%');
define('NONCE_SALT', '(wub@a3E0fEPD8ORO-gE8-a_djn7m4||p-OJ~_u]LN;489r)~iQ[Nz82)e74rSgZ');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rc5fwRQ_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
