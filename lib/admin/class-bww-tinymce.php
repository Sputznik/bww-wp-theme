<?php

class BWW_TINYMCE {

  function __construct(){
    add_action( 'init', array( $this, 'bww_mce_buttons' ) );
	}

	function bww_mce_buttons(){
    add_filter( 'mce_external_plugins', array( $this, 'add_mce_buttons' ) );
    add_filter( 'mce_buttons', array( $this, 'register_mce_buttons') );
  }

  function add_mce_buttons( $plugin_array ) {
    $plugin_array['bww_panelist_shortcode_script'] = BWW_THEME_URI.'/assets/js/bww-mce-btn.js';
    return $plugin_array;
  }

  function register_mce_buttons( $buttons ) {
    array_push( $buttons, 'bww_panelist_shortcode_btn' );
    return $buttons;
  }

}

new BWW_TINYMCE;
