<article class="article">
	<div class="hd">
		<h2 class="h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>
	<div class="bd">
		<?php the_content(); ?>
	</div>
	<div class="ft">
		Posted <?php echo( cl_format_date( $post->post_date ) ); ?>
	</div>
</article>