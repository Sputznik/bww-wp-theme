jQuery(document).ready(function(){

  var $bww_post_stats = jQuery('[data-behaviour="post-view-stat"]');

  if( $bww_post_stats.length > 0 ){ updatePostViewCount(); }

  function updatePostViewCount(){

    var id = $bww_post_stats.data('id');
    var url = BWW_POST_VIEW.ajaxurl;

    jQuery.ajax({
      type:'post',
      url	: url,
      data : {
        action  : 'bww_view_count',
        post_id : id,
        token   : BWW_POST_VIEW.token
      }
    });
    
  }

});
