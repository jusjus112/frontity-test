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
define( 'DB_NAME', 'react-test' );

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
define( 'AUTH_KEY',         'o`=A amyM9AZZ,!M`KDaeoaBgcr[K@GJcvWH7<.UsdOC(qmBYgwFK:qKnkimTXl ' );
define( 'SECURE_AUTH_KEY',  '</G@PNLc#s{dW{OrgLa3=wwZoO UUhsUuS&0?{Ow(PLA (qlo_ZKB-E.3<S4.$@:' );
define( 'LOGGED_IN_KEY',    '(f#>EH-(2jJ?tb+-xt}C j6M4qAjn):<i;!Q7KYT)IG4RP24r=>,JFz8nQ_&?P%q' );
define( 'NONCE_KEY',        '_@Eic/;3$G^VQribh9Y$z?m0j{GGZ{lI1sy*x;}mbs8}-:y@cLV2M<;Z8|CfJ{!u' );
define( 'AUTH_SALT',        ',NymNOw7+ %VUWI&kby/EW_2v>-@W[nIKo|MFPvPZV#(m@/~]43{au8R1#/A;xN;' );
define( 'SECURE_AUTH_SALT', 'LI2>/$y>P@3g[#yLaD)xtM&)8#cWvGU/=@q8tcfwF/]TZ<4n$O;2zx~C4^u)J{y1' );
define( 'LOGGED_IN_SALT',   'qa?4Ct@Wz|/.(!C6_]XmXr(:% 5w);f/|C?Kx<v/XCyFX*4;xyZpz#0dr%@bLNOf' );
define( 'NONCE_SALT',       'cq:=q?K!Hh,Lq:#,H|dNT`??_q Gv9hFqA/eJ[j!-LC9:_F>twoafbWd<pK<-C8[' );

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
