<?php

// CREATES META FIELD
add_filter( 'orbit_meta_box_vars', function( $meta_box ){

  $meta_box['post'] = array(
    array(
			'id'			=> 'bww-post-metafield',
			'title'		=> 'Additional Information',
			'fields'	=> array(
				'registration_url'	=> array(
					'type' => 'text',
					'text' => 'Registration URL'
				),
        'youtube_url'	=> array(
					'type' => 'text',
					'text' => 'Youtube Video URL'
				)
			)
		)
	);

	return $meta_box;

});
