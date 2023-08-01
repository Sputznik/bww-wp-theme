<?php
/**
* The template for displaying related posts based on post-categories.
*/

$post_id       = get_the_ID();
$categories    = wp_get_post_categories( $post_id, ['ids'] );
$cats_str      = implode(',', $categories);
$shortcode_str = do_shortcode("[orbit_query posts_per_page='4' style='grid4' cat='".$cats_str."' post__not_in='".$post_id."']");
if( $cats_str && strlen( $shortcode_str ) > 0 ): ?>
  <div class="related-posts">
    <div class="bww-headline-wrapper">
      <span class="related-posts-headline text-uppercase">Related Webinars</span>
    </div>
    <?php echo $shortcode_str;?>
  </div>
<?php endif;?>
