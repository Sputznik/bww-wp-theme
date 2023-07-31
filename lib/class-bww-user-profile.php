<?php

class BWW_USER_PROFILE {

  function __construct() {
    add_filter( 'manage_users_columns', array( $this, 'manage_users_columns' ) ); // ADD CUSTOM COLUMN TO USER LIST TABLE
    add_action( 'manage_users_custom_column', array( $this, 'manage_users_custom_column' ), 10, 3 ); // ADD CONTENT TO CUSTOM COLUMN
    add_action( 'wp_ajax_bww_add_user_roles', array( $this, 'add_user_roles' ) ); // ADD CUSTOM USER ROLES
    add_filter( 'user_contactmethods', array( $this, 'add_user_contact_methods' ) ); // ADD CUSTOM CONTACT METHODS
  }

  function manage_users_columns( $columns ){
    $columns['user_id'] = 'User ID';
    return $columns;
  }

  function manage_users_custom_column( $value, $column_name, $user_id ){
    if ( 'user_id' === $column_name ){ return $user_id; }
    return $value;
  }

  function add_user_roles(){
    $capabilities = get_role( 'author' )->capabilities; // GET AUTHOR CAPABILITIES

    $roles = array(
      'bww_speaker'   => 'Speaker',
      'bww_moderator' => 'Moderator'
    );

    if( $capabilities && count( $capabilities ) > 0 ){
      foreach ( $roles as $role => $name ){
        // CHECK IF ROLE ALREADY EXISTS
        if( !$GLOBALS['wp_roles']->is_role( $role ) ){
          $is_role_added = add_role( $role, $name, $capabilities ); // ADDS A ROLE IF IT DOES NOT EXIST

          if( $is_role_added ){
            echo "Role: <strong>$name</strong> has been created <br/>";
          } else{
            echo "Role: <strong>$name</strong> could not be created <br/>";
          }
        } else {
          echo "Role: <strong>$name</strong> has been already created <br/>";
        }
      }
    }
    wp_die();
  }

  function add_user_contact_methods( $methods ){
    $methods['bww_designation'] = "Designation";
    return $methods;
  }

}

new BWW_USER_PROFILE;
