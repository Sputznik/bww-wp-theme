<?php

/**
 * BOOTSTRAPS THEME SPECIFIC FUNCTIONALITIES
 */
class BWW_THEME {

  public function __construct() {

    add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );  // LOAD ASSETS

  }

  function assets() {

    // ENQUEUE STYLES
    wp_enqueue_style('bww-core-css', BWW_THEME_URI.'/assets/css/main.css', array('sp-core-style'), BWW_THEME_VERSION );

  }

}

new BWW_THEME;
