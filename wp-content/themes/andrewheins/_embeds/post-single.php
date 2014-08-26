<article class="article">
	<div class="hd">
		<h1 class="h1"><?php the_title(); ?></h1>
	</div>
	<div class="bd">
		<?php the_content(); ?>
	</div>
	<div class="ft">
		Posted <?php echo( cl_format_date( $post->post_date ) ); ?>
	</div>
</article>