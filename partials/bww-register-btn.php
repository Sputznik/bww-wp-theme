<?php
/**
 * The template for displaying register button
 */
$registration_url  = get_post_meta( $post->ID, 'registration_url', true );
$show_register_btn = !empty( $registration_url ) && ( $post->post_status == 'future' );
?>
<?php if( $show_register_btn ): ?>
  <a href="<?php _e( $registration_url );?>" class="bww-register-btn">Register now</a>
<?php endif;?>
