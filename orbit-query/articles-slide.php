<div id="<?php _e( $atts['id'] );?>" data-target="<?php _e('div.bww-slide-body');?>" data-url="<?php _e( $atts['url'] );?>" class="articles-bww-slide">
  <?php while( $this->query->have_posts() ) : $this->query->the_post(); ?>
    <?php
      $permalink      = get_the_permalink();
      $thumbnail      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
      $background_img = !empty( $thumbnail ) ? 'style="background-image:url('.$thumbnail.');"' : "";
    ?>
    <div class="bww-slide-body">
      <div class="orbit-thumbnail-bg" <?php _e( $background_img ); ?>>
        <a href="<?php _e( $permalink );?>"></a>
      </div>
      <div class="post-desc">
        <div class="bww-headline-wrapper">
          <span class="slide-headline">UPCOMING WEBINAR</span>
        </div>
        <h3 class="post-title"><a href="<?php _e( $permalink );?>"><?php the_title();?></a></h3>
        <p class="meta"><strong><?php the_time( 'F j, Y' );?></strong></p>
        <div class="post-excerpt"><?php the_excerpt(); ?></div>
      </div>
    </div>
  <?php endwhile;?>
</div>
