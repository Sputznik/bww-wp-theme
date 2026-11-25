<?php

class BWW_POST_ADMIN {

  function __construct(){
    add_filter( 'manage_posts_columns', array( $this, 'manage_posts_columns' ), 10, 2 );
    add_filter( 'manage_posts_custom_column', array( $this, 'manage_posts_custom_column' ), 10, 2 );
	}

  function manage_posts_columns( $columns, $post_type ){
    if( 'post' == $post_type ){
      $columns['bww_post_id'] = 'ID';
    }

		return $columns;
	}

  function manage_posts_custom_column( $column, $post_id ){
    if( 'bww_post_id' == $column ){
      echo $post_id;
    }
  }

}

new BWW_POST_ADMIN;
