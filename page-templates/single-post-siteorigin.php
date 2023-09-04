<?php
/*
Template Name: SiteOrigin Template
Template Post Type: post
*/
get_header();
?>
<div id="bww-single-post-sow">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>
