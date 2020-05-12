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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'digimarket' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@A/RZe56LG9gO2NiV,Q=Dv+#^7|CJZYpBO{#H?)IwgLfrTak0ld<=WEpXRm!Y|9M' );
define( 'SECURE_AUTH_KEY',  'g;bJfR-H{z9{ht/UsQB7ZS.c!SqR,wE4pX[]h!i=SgIjOE33&KON[y45fRZHNI{v' );
define( 'LOGGED_IN_KEY',    '<}.>@9]<DsrQQAxh5i3K2D5g@6!R-Vg$jJTK0@%5&)/3/I{itK_ipec:m7<QV2VN' );
define( 'NONCE_KEY',        'Wq,DKH;<50$HDu9O:H=N](aE40V-G33*k jP7B{#JkPhVtS)fj2k]SEb<~[d6cq+' );
define( 'AUTH_SALT',        '*T8$%pX.[%&n{+tSSS(Hi&.?68u<OnkY/;b_9>?e_DCP]Tt>^w7x,0qQJe?4]8sL' );
define( 'SECURE_AUTH_SALT', 'cv;?Fcgcf.B %H=6WCW61&/n8=nNL9/}ba$:0Ji!GBvdD00MFn+Dq w+wxSS-.7Q' );
define( 'LOGGED_IN_SALT',   '9#Ba4b=TWOSbZR2FO5E0Dqt8ZHYdiAYklHQc[3]J@{|BwjZ!O1E,|Pmz[)q8_J,7' );
define( 'NONCE_SALT',       ';BicyAy1j@RFbJ$NRT$&yGX~hJ:Z*P_GQMI_QsOz*p-Od4//oKf`]1$.1t9S|m{M' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
