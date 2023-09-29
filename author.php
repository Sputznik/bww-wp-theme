<?php
/**
 * The template for displaying author page
 */
get_header();
$author      = $wp_query->get_queried_object();
$avatar_url  = get_avatar_url( $author->ID );
$designation = get_user_meta( $author->ID, 'bww_designation', true );
?>
<div class="container">
  <div class="author-header bww-panelist">
    <div class="bww-panelist-moderator">
      <h1 class="author-name text-capitalize"><?php _e( $author->display_name ); ?></h1>
      <p class="author-designation"><?php _e( $designation ); ?></p>
      <div class="bww-moderator">
        <div class="author-avatar-parent">
          <div class="author-avatar" style="background-image: url(<?php _e( $avatar_url );?>);" role="image" aria-label="Avatar"></div>
        </div>
        <div class="author-info">
          <div class="author-bio"><?php _e( $author->description ); ?></div>
        </div>
      </div>
    </div>
  </div>
  <?php $shortcode_str = do_shortcode("[orbit_query posts_per_page='4' posts_per_page='6' style='grid3' author='".$author->ID."' pagination='1']");
  if( strlen( $shortcode_str ) > 0 ): ?>
    <div class="author-posts">
      <div class="bww-headline-wrapper">
        <span class="text-uppercase">CONTRIBUTIONS</span>
      </div>
      <?php echo $shortcode_str;?>
    </div>
  <?php endif;?>
</div>
<?php get_footer(); ?>
