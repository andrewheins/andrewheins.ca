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

<div class="row">
	<div class="inner">
		<div class="mod mod-inset">
			<div class="pagination split">
				<div class="left">
					<?php if( get_previous_posts_link() ) : ?>
						<?php echo( previous_posts_link( 'Newer' ) ); ?>
					<?php endif; ?>
				</div>
				<div class="right">
					<?php if( get_next_posts_link() ) : ?>
						<?php echo( next_posts_link( 'Older' ) ); ?>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>