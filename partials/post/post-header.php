<?php
/**
 * The template for displaying single post header.
 */
 $featured_img       = false;
 $youtube_url     = get_post_meta( $post->ID, 'youtube_url', true );
 $show_video = ( strlen( trim( $youtube_url ) ) > 0 ) && ( $post->post_status == 'publish' );

 if( !$show_video ){
   $featured_img = get_the_post_thumbnail( $post->ID, 'full', array( 'alt'=> 'Featured Image' ) );
 }
?>
<?php if( $show_video ): ?>
  <div class="video-container">
    <div class="container">
      <div class="youtube-video-wrapper">
        <?php if ( wp_oembed_get( $youtube_url ) ) : ?>
          <?php echo wp_oembed_get( $youtube_url ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if( !$show_video && $featured_img ): ?>
  <div class="featured-image-container">
    <div class="container">
      <div class="featured-img"><?php echo $featured_img; ?></div>
    </div>
  </div>
<?php endif;?>
