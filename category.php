<?php
/**
 * The template for displaying category page
 */
get_header();
$category = $wp_query->get_queried_object();
?>
<div class="container">
  <div class="category-header archive-header">
    <h1 class="page-title text-capitalize text-center"><?php _e( $category->name ); ?></h1>
  </div>
  <div class="articles-post-list-wrap">
    <?php echo do_shortcode("[orbit_query posts_per_page='8' style='grid4' cat='".$category->term_id."' pagination='1']"); ?>
  </div>
</div>
<?php get_footer(); ?>
