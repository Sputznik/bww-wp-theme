<?php
/**
 * The Template for displaying all single posts
 */
get_header();
$registration_url  = get_post_meta( $post->ID, 'registration_url', true );
$show_register_btn = !empty( $registration_url ) && ( $post->post_status == 'future' );
?>
<div id="bww-single-post">
  <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
    <?php get_template_part("partials/post/post-header"); ?>
    <div class="content-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="post-title"><?php the_title();?></h1>
            <p class="post-date"><?php the_time( 'M j, Y' );?> | <?php the_time('g:i A'); ?></p>
            <?php if( $show_register_btn ): ?>
              <a href="<?php _e( $registration_url );?>" class="bww-register-btn">Register now</a>
            <?php endif;?>
            <div class="post-content"><?php the_content(); ?></div>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; endif; ?>
</div>
<?php get_footer();?>
