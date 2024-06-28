<?php

class BWW_POST_VIEWS {

	private $count_meta_key;

	function __construct() {

		$this->count_meta_key = 'post_views_count';

		add_action( 'wp_ajax_bww_view_count', array( $this, 'update_count_ajax' ) );
		add_action( 'wp_ajax_nopriv_bww_view_count', array( $this, 'update_count_ajax' ) );

		// SHORTCODE
		add_shortcode( 'bww_popular_posts', array( $this, 'bww_popular_posts' ) );

	}

	function update_count_ajax(){

		// CHECK TOKEN / NONCE
	  if( !check_ajax_referer('bww_post_view_count', 'token') ){
	    return wp_send_json_error( 'Invalid Token' );
	  }

		if( isset( $_POST['post_id'] ) && !empty( $_POST['post_id'] ) ){

			$cookie_id = 'bww-pc-'.$_POST['post_id'];

			if( !isset( $_COOKIE[$cookie_id] ) ) {

				$this->update_count( $_POST['post_id'] ); // UPDATE COUNT

				setcookie( $cookie_id, "incremented", time() + ( 60 * 30 ) ); // SET COOKIE FOR 30MIN TO PREVENT INCREMENT ON REFRESH

			}

		}

		wp_die();

	}

	function update_count( $postid ){
		$count = $this->get_count( $postid );

		if ( !$count ) {
			add_post_meta( $postid, $this->count_meta_key, 1 );
		}
		else {
			$count ++;
			update_post_meta( $postid, $this->count_meta_key, $count );
		}

	}

	// RETURNS POST VIEWS COUNT
	function get_count( $postid ){
		$count = get_post_meta( $postid, $this->count_meta_key, true );
		return (int) ( !empty( $count ) ? $count : 0 );
	}

	function bww_popular_posts( $atts ){
		$args = shortcode_atts( array(
			'posts_per_page' 	=> '10',
		), $atts, 'bww_popular_posts' );


		$query = new WP_Query( array(
			'posts_per_page' => !empty( $args['posts_per_page'] ) ? (int) $args['posts_per_page'] : 10,
			'meta_key'       => $this->count_meta_key,
			'order'          => 'DESC',
			'orderby'        => 'meta_value_num'
		) );

		ob_start();
		include( BWW_THEME_PATH.'/partials/shortcode-templates/bww-popular-posts.php' );
		return ob_get_clean();
	}

}

new BWW_POST_VIEWS;
