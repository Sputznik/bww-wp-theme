<div class="bww-panelist">
  <ul class="bww-panelist-speaker">
    <?php foreach ( $this->query->results as $user ):
      $avatar_url  = get_avatar_url( $user->ID );
      $user_link = get_author_posts_url( $user->ID );
      $designation = get_user_meta( $user->ID, 'bww_designation', true );
    ?>
    <li class="bww-speaker">
      <div class="author-avatar-parent">
        <a href="<?php _e( $user_link ); ?>" class="author-avatar" style="background-image: url(<?php _e( $avatar_url );?>);" aria-label="Avatar"></a>
      </div>
      <div class="author-info">
        <p class="author-name text-capitalize"><a href="<?php _e( $user_link ); ?>"><?php _e( $user->display_name ); ?></a></p>
        <?php if( $designation ):?>
          <p class="author-designation"><?php _e( $designation ); ?></p>
        <?php endif;?>
        <div class="author-bio"><?php _e( !empty( $user->description ) ? substr( $user->description, 0, 100).'...' : '' ); ?></div>
      </div>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
