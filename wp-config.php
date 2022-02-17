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
define( 'DB_NAME', 'hkvitals_blog' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mysql' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '{w~[xi_+;Y#yG95; )kFozNyn;D!f./#u18bs<(=1 |8)9_``{qA~K?RH3>4A,=O' );
define( 'SECURE_AUTH_KEY',  'S.LkLnmll6,)#{EJ.^3s<}i|K<<igtarD5mC6!XptDwt;f&I`E2xCho=:`-Mw!h?' );
define( 'LOGGED_IN_KEY',    '7tb.(QAScLOe&%l5BtW,8rUZL{1m ~J75T%J:2KbZ^w1n/i39h6[ur}f!h8$DOX(' );
define( 'NONCE_KEY',        '9)6]%$(lql@xTWcROs2=-9JN%MNHkk2/`L&L6ls76>~Xul6}o9Re@1|ggU8<nC!G' );
define( 'AUTH_SALT',        '1WO3&vi,AG^2Z:uve=?4u:zO-B+C4VsabL8+QHOU dkoK#q^ g@y+ut`/k)hUx:@' );
define( 'SECURE_AUTH_SALT', ' c?i:V+HeqL;7BU|/6rMe.VjiPA]$6*x?}5P=0/ew2GrmeWi4Ft#~A1cDh{(.r%F' );
define( 'LOGGED_IN_SALT',   't94szyWQ;owHK:Uys9bpb&n)q<53%SM!bnpvTY2 #NWV~n/)r/Lu`lVgR;fQ: ?g' );
define( 'NONCE_SALT',       'B)25?,>B9tSag8Sr;80KSe]^pZQiAgRu@~7]?(=CS}#DD=_9Z7X8/BO4aG`Mk4AE' );

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
