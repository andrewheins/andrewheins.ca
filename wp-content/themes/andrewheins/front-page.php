<?php 
	get_header(); 
	
	$recent_post_args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
	);
	
	$recent_posts = get_posts( $recent_post_args );
	
	
?>

<div class="row">
	<div class="inner">
		<div class="col" style-size="3of4">
			<?php if( !empty( $recent_posts ) ) : ?>
				<?php foreach( $recent_posts as $post ) : setup_postdata( $post ); ?>
					<?php cl_embed_post( $post->post_type ); ?>
				<?php wp_reset_postdata(); endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="col" style-size="1of4" style-context="secondary">
			<?php if( have_posts() ) : ?>
			<?php while( have_posts() ) : the_post(); ?>
				<?php cl_embed_post( $post->post_type ); ?>
			<?php endwhile; ?>
			<?php else : ?>
				<?php cl_embed_no_content(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>