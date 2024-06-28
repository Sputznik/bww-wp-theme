<?php if( $query->have_posts() ): ?>
<ul class="popular-posts orbit-list-db">
  <?php while ( $query->have_posts() ): $query->the_post(); ?>
    <?php
      $post_id = get_the_ID();
      $permalink = get_the_permalink();
      $thumbnail      = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0];
      $background_img = !empty( $thumbnail ) ? 'style="background-image:url('.$thumbnail.');"' : "";
    ?>
    <li class="orbit-article-db">
      <h4 class="title"><a href="<?php _e( $permalink ); ?>"><?php the_title(); ?></a></h4>
      <div class="orbit-thumbnail-bg" <?php _e( $background_img ); ?>>
        <a href="<?php _e( $permalink );?>"></a>
      </div>
    </li>
  <?php endwhile; wp_reset_postdata(); ?>
</ul>
<?php endif;?>
