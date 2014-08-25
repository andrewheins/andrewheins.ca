<?php get_header(); ?>

<div class="row">
	<div class="inner">
		<?php if( have_posts() ) : ?>
			<?php while( have_posts() ) : the_post(); ?>
			<div class="mod text-block">
				content
			</div>
			<?php endwhile; ?>
		<?php else : ?>
			<?php cl_embed_no_content(); ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>