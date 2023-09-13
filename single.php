<?php
/**
 * The template for displaying all single posts
 */
get_header();
$post_date = get_the_time( 'M j, Y' );
?>
<div id="bww-single-post">
  <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
    <?php get_template_part("partials/post/post-header"); ?>
    <div class="content-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="post-title"><?php the_title();?></h1>
            <p class="post-date">
              <?php
                if( $post->post_status == 'publish' ){ _e( $post_date ); }
                else{ _e( $post_date ); ?> | <?php the_time('g:i A T'); }
              ?>
            </p>
            <?php get_template_part( 'partials/post/bww-register-btn' ); ?>
            <div class="post-content <?php _e( "post-".$post->post_status )?>"><?php the_content(); ?></div>
            <?php get_template_part( 'partials/post/bww-register-btn' ); ?>
            <?php get_template_part( 'partials/post/related-posts' ); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; endif; ?>
</div>
<?php get_footer();?>
