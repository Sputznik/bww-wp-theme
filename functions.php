<?php

/*  CONSTANTS */
if( !defined( 'BWW_THEME_VERSION' ) ) {
  define( 'BWW_THEME_VERSION', time() );
}

if( !defined( 'BWW_THEME_URI' ) ) {
  define( 'BWW_THEME_URI', get_stylesheet_directory_uri() );
}

// INCLUDE FILES
$inc_files = array(
  'lib/class-bww-theme.php',
  'lib/bww-orbit-cf.php',
  'lib/class-bww-user-profile.php',
  'lib/class-bww-shortcodes.php'
);

foreach( $inc_files as $inc_file ){ require_once( $inc_file ); }
