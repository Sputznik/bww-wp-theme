<?php

class BWW_USER_PROFILE {

  function __construct() {
    add_filter( 'manage_users_columns', array( $this, 'manage_users_columns' ) ); // ADD CUSTOM COLUMN TO USER LIST TABLE
    add_action( 'manage_users_custom_column', array( $this, 'manage_users_custom_column' ), 10, 3 ); // ADD CONTENT TO CUSTOM COLUMN
  }

  function manage_users_columns( $columns ){
    $columns['user_id'] = 'User ID';
    return $columns;
  }

  function manage_users_custom_column( $value, $column_name, $user_id ){
    if ( 'user_id' === $column_name ){ return $user_id; }
    return $value;
  }

}

new BWW_USER_PROFILE;
