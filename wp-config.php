<?php
/**
 * Correct for load balancer
 */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' )
    $_SERVER['HTTPS'] = 'on';
/**
 * WordPress constants are overridden in local-config.php
 */
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	include( dirname( __FILE__ ) . '/local-config.php' );
}

if ( ! defined( 'COOKIEHASH' ) )
	define( 'COOKIEHASH', md5( 'sctc.io' ) );

$config_defaults = array(

	// Basic WP
	'WP_CONTENT_URL'     => 'http://' . $_SERVER['HTTP_HOST'] . '/content',
	'WP_CONTENT_DIR'     => dirname( __FILE__ ) . '/content',
	'DB_HOST'            => 'localhost',
	'DB_CHARSET'         => 'utf8',
	'DB_COLLATE'         => '',
	'WPLANG'             => '',
	'WP_POST_REVISIONS'  => true,

	// Security Hashes
	'AUTH_KEY'           => 'uPXEE?WfVPHSi{&E9nZ8}f0T}f%QxG:}-&Gm+U g/Vy^x},YkZEz`*|--K>8/`9+',
	'SECURE_AUTH_KEY'    => 'ijy!RHzqkcXAco,gc|R6>|+XBS/O2,`RJUP&b*1kXiLue^ht r`,/ Dyp9E$nxFL',
	'LOGGED_IN_KEY'      => 'N+EW5;Hh~GWG+95o*Y6Kd7&E+OP<|aAh|v#MdP+VSrgnax>|W^(Y8RG:*ZRHt+:i',
	'NONCE_KEY'          => '`Qral/yv]+I[d#3~~WV[z(1}5+}8NIRL+A~!-d!#RQW NJ=;|`cn!@jJA3UF8*Z)',
	'AUTH_SALT'          => '+DoFmfEIm)G<t(l)x*v@k tE|MY~]&l/H~5|bn~|(18hRNn{kDI2O|J:gz-%:VtH',
	'SECURE_AUTH_SALT'   => '|at&b>nXp|_l`d>x+D&wb3X]bhm4Zr~JR.DFuX@arL5~tksD!NN!YeTZ@>D/`E}:',
	'LOGGED_IN_SALT'     => '$F8E|kYQ;p-6aw[GlI){ibhF,,6;}Bo~A)pywl0LP#C+EgKCA7ntI[,Yr0NL7CbQ',
	'NONCE_SALT'         => '.j#VGj-^s<<*8J*<I%&f_ -d$*Dm@d_y|@;jR[.lH9-Hf+v6>86SSWtYH]u.vx|>',

	// Prevent manual file changes and updates
	'DISALLOW_FILE_EDIT' => true,
	'DISALLOW_FILE_MODS' => true,

	// Performance
	'DISABLE_WP_CRON'    => true,
	'WP_CACHE' 	         => true,

	// Debug
	'WP_DEBUG'           => false,
	'WP_DEBUG_LOG'       => false,
	'WP_DEBUG_DISPLAY'   => false,
	'SAVEQUERIES'        => false,
	'SCRIPT_DEBUG'       => false,
);

foreach ( $config_defaults AS $config_default_key => $config_default_value ) {
	if ( ! defined( $config_default_key ) )
		define( $config_default_key, $config_default_value );
}

// Manually back up the WP_DEBUG_DISPLAY directive.
if ( ! defined( 'WP_DEBUG_DISPLAY' ) || WP_DEBUG_DISPLAY == false ) {
	ini_set( 'display_errors', 0 );
}

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
if ( empty( $table_prefix ) ) {
	$table_prefix = 'wp_';
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

