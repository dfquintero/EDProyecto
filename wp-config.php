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
define( 'DB_NAME', 'EDProyectoBD' );

/** MySQL database username */
define( 'DB_USER', 'soyeladmin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'notieneclave' );

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
define( 'AUTH_KEY',         '=@.c;$:}~f|j3/JkFOl0GlY1_/TUP}Fcj?M+1~x_in=4 MY~4PP  $&=pV_g;H6k' );
define( 'SECURE_AUTH_KEY',  'HCO,IRY%zev[%BB{eU:/^F](!eC] ^e!}{waouUXEF<8sI2m)%F=ZVWvaPO w!Z<' );
define( 'LOGGED_IN_KEY',    'NEo%Wwp3K#>K]#f0s[J6KBPsf=hQwE]ma[;I6@pM1K-%g3n+WiF[e*kwH7zd]W-w' );
define( 'NONCE_KEY',        '+ybiS{djy$#WD$s3&(tfR+MxR!z4<ZSny}o^do%hEHILd~`zN% @r]cK,dh}N:pZ' );
define( 'AUTH_SALT',        'w]?z6#s_$g+Sv$f5.*w1MY5+i2JP=y*0?[Vke.Re9c5I@VKS6Z~ES Z$/^y!^1{B' );
define( 'SECURE_AUTH_SALT', 'G}=- {^vabiT`b)$Vt|-X4sBf.EVt5&[A2#036/2f[vS,1hazO[QP~O2TAkcK7d(' );
define( 'LOGGED_IN_SALT',   'G?STRJJ}d_p3r@f#?ki2);K9@:`TgPD=|r01KBi)4ktb:V }L6&mX}z{GwMq/]$~' );
define( 'NONCE_SALT',       '22hp9iM= Ez6_L<^`qH$:<4&tkQY]VJbnDeS-36),E h?~gsLPIz0J8d3>XetzG]' );

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
