<?php
/**
 * The template for displaying single post header.
 */
 $image_url       = false;
 $youtube_url     = get_post_meta( $post->ID, 'youtube_url', true );
 $has_youtube_url = strlen( trim( $youtube_url ) ) > 0;

 if( !$has_youtube_url ){
   $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
 }
?>
<?php if( $has_youtube_url ): ?>
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
<?php if( !$has_youtube_url && $image_url ): ?>
  <div class="featured-image-container">
    <div class="container">
      <div class="featured-img" style="background-image:url(<?php _e( $image_url );?>);" role="img" aria-label="Featured Image"></div>
    </div>
  </div>
<?php endif;?>
