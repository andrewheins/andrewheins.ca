<?php get_header(); ?>

<div class="row">
	<div class="inner">
		<?php if( have_posts() ) : ?>
			<?php while( have_posts() ) : the_post(); ?>
				<?php cl_embed_post( $post->post_type ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php cl_embed_no_content(); ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>