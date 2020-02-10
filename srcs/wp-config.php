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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Q9i&z^kfd:6_P^>9{aF>o/je)o:<G;W~Jm5P(O+~yGR;#J6NLZ-AQ0)9I?!_aHWf');
define('SECURE_AUTH_KEY',  '2wS,u=o[eQ{<s`cd#xCvn7CS|a%yT|Z/u+xy;Ml0o `k7&DmzFEn0E:-XDVpj}Y|');
define('LOGGED_IN_KEY',    ',++oL[}qA4ECCvOstU9N]0-`u|[bw~srwPe8*3SmOw5hYf7C4$s6:pO--/RR|frA');
define('NONCE_KEY',        '_IzL R6)l^WRe.rPbGYi.ol%9#X3jPiHIO!Ve7i Udpo.+7Awyl<p9%jce1hR0Y|');
define('AUTH_SALT',        'so1/5u@-v}z.o]7j-_)6nT{PO[t`| -ZCn,5?W{zQWE6ota9c$Gm`W|j+M2|i<Yp');
define('SECURE_AUTH_SALT', 'b3m!w::))Io.qhlRV!aRf-%-)MW-/Y+lZ FrB2+7lu+2VG%j7B+Z|j-vB:<)En8X');
define('LOGGED_IN_SALT',   'o+*V/F~2P<X+N/l|gwmw6`^z,piB6R0FLP2=jMw71t|[@!8g4i!C4mx/NYwttlf[');
define('NONCE_SALT',       ']-J,g|<[_ qbYmMoI|5D*so,n1F-n:`p+dXd3^X|IDKnTB.kq:7F*}Q[a60ni^0d');
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
