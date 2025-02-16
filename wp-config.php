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
define( 'DB_NAME', 'ht-assessment' );

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
define( 'AUTH_KEY',         ',$-LMY;xBm}g2NU|05MQ;~*_I0YS~94r<YCS^{vJ;4ox+`Vx&r&!bL6m>^G#R?Ek' );
define( 'SECURE_AUTH_KEY',  'd6aFyZWiF$muAeBu h;cn%E3_%h)gAa6?qPv![aNzfS3.g/P`ea({P.wK7oT!z_?' );
define( 'LOGGED_IN_KEY',    '^7EcFF:Aq$4@~le]te,mmRtmz%>^5qcIVzX_peu8,{dAaQFg!{0BX<%y,Y0r/INV' );
define( 'NONCE_KEY',        'B3qej3klDnb|{MLMa<DAwjbKds*xM=32.>GSxMoQt5snB<<($~K g7#GkcTR?M&h' );
define( 'AUTH_SALT',        'wL]|<5X-lFQEOVRf4u65i/lbriPDHsfOWschQ&ZFawPZJ6e6QI)nYOH,1U1lFC7P' );
define( 'SECURE_AUTH_SALT', '>0NX(tw=BH}p{o=hdoFC*F4Sn&uTAgW!C[N4)6p&{@=0,ND_1|$p:(Zpf,]V`B15' );
define( 'LOGGED_IN_SALT',   'c4`7i|Vx%.4=Z!BP=)|qAPFi4<]2xnFcfqH2~.YV_J|tLE0*fLjP30V?(?H;lF[5' );
define( 'NONCE_SALT',       's_y#$3LJ/_/(O>0s8.*=j5CveeRj>?;L]hWzeW8r[oCs%ghAPN[*Ys8q)HcfE5R1' );

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
