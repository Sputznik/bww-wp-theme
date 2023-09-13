<?php
/**
 * The template for displaying panelist
 */
$headline      = !empty( $args['headline'] ) ? $args['headline'] : '';
$panelist_type = !empty( $args['type'] ) ? $args['type'] : '';
?>
<div class="bww-panelist <?php _e( $args['class'] );?>">
  <?php if( $headline ): ?>
    <div class="bww-headline-wrapper">
      <span class="text-uppercase"><?php _e( $headline );?></span>
    </div>
  <?php endif;?>
  <ul class="<?php _e( "bww-panelist-".$args['type'] );?>">
    <?php foreach( $authors->results as $author ):
      $avatar_url  = get_avatar_url( $author->ID );
      $author_link = get_author_posts_url( $author->ID );
      $designation = get_user_meta( $author->ID, 'bww_designation', true );
    ?>
      <li class="<?php _e( "bww-".$args['type'] );?>">
        <div class="author-avatar-parent">
          <a href="<?php _e( $author_link ); ?>" class="author-avatar" style="background-image: url(<?php _e( $avatar_url );?>);" aria-label="Avatar"></a>
        </div>
        <div class="author-info">
          <p class="author-name text-capitalize"><a href="<?php _e( $author_link ); ?>"><?php _e( $author->display_name ); ?></a></p>
          <?php if( $designation ):?>
            <p class="author-designation"><?php _e( $designation ); ?></p>
          <?php endif;?>
          <?php //if( $panelist_type === 'moderator' ):?>
            <!-- <div class="author-bio"><?php //_e( $author->description ); ?></div> -->
          <?php //endif;?>
          <?php if( $panelist_type === 'speaker' ):?>
            <div class="author-bio"><?php _e( !empty( $author->description ) ? substr( $author->description, 0, 100).'...' : '' ); ?></div>
          <?php endif;?>
        </div>
      </li>
    <?php endforeach;?>
  </ul>
</div>
