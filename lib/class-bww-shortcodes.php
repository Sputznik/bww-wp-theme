<?php

class BWW_SHORTCODES {

    function __construct(){
      add_shortcode( 'bww_panelist', array( $this, 'bww_panelist' ) );
    }

    function bww_panelist( $atts ){

      $args = shortcode_atts( array(
        'id'       => '',
        'type'     => 'moderator',
        'headline' => ''
      ), $atts );

      // WRAPPER CLASS TO CHANGE THE LAYOUT
      $args['class'] = $args['type'] ? $args['type'].'-panelist-wrap' : '';

      // ORIGINAL MODERATOR LAYOUT IS NOT BEING USED ANYMORE
      // CHANGE TYPE TO USE SPEAKER LAYOUT INSTEAD OF MODERATOR LAYOUT
      if( $args['type'] == 'moderator' ){
        $args['type'] = 'speaker';
      }

      $authors = array();
      $author_ids = !empty( $args['id'] ) ? explode( ',', $args['id'] ) : '';

      if( $author_ids && count( $author_ids ) > 0 ){

        $authors = new WP_User_Query(
           array(
            'include' => $author_ids
           )
        );

        if( !empty( $authors->results ) ){
          ob_start();
          include( locate_template( "partials/bww-panelist.php" ) );
          return ob_get_clean();
        }

      }

    }
}

new BWW_SHORTCODES;
