<?php

/**
 * BOOTSTRAPS THEME SPECIFIC FUNCTIONALITIES
 */
class BWW_THEME {

  public function __construct() {

    add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );  // LOAD ASSETS
    add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );  // LOAD ADMIN ASSETS
    add_filter('the_posts', array( $this, 'show_scheduled_posts' ) ); // SHOW SCHEDULED POSTS IN SINGLE.PHP

  }

  function assets() {

    // ENQUEUE STYLES
    wp_enqueue_style('bww-core-css', BWW_THEME_URI.'/assets/css/main.css', array('sp-core-style'), BWW_THEME_VERSION );

    // POST VIEWS COUNT
		if( is_singular( 'post' ) ){
			wp_enqueue_script('bww-post-views', BWW_THEME_URI.'/assets/js/bww-post-view-count.js', array('jquery'), BWW_THEME_VERSION, true );
			wp_localize_script( 'bww-post-views', 'BWW_POST_VIEW', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
		    'token' =>  wp_create_nonce('bww_post_view_count')
		  ) );
		}

  }

  function admin_assets(){
    // ENQUEUE SCRIPTS
    wp_enqueue_style( 'bww-mce-btn', BWW_THEME_URI."/assets/css/bww-mce-btn.css", array(), BWW_THEME_VERSION );
  }

  function show_scheduled_posts( $posts ){
    global $wp_query, $wpdb;

    if( is_single() && $wp_query->post_count == 0 ){
      $posts = $wpdb->get_results( $wp_query->request );
    }

    return $posts;
  }

}

new BWW_THEME;
