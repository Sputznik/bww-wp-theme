<?php
/**
 * The template for displaying tag page
 */
get_header();
$tag = get_queried_object();
?>
<div class="container">
  <div class="tag-header archive-header">
    <h1 class="page-title text-capitalize text-center"><?php _e( $tag->name ); ?></h1>
  </div>
  <div class="articles-post-list-wrap">
    <?php echo do_shortcode("[orbit_query posts_per_page='8' style='grid4' tag='".$tag->slug."' pagination='1']"); ?>
  </div>
</div>
<?php get_footer(); ?>
