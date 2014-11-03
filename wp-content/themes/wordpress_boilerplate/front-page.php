<?php get_header(); ?>

<section id="main">

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<div class="row">
		<div class="wrapper wrapper-inset">
			<article role="article" class="mod article post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="flag right">
					<div class="img">
						<?php if( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'box-200', array( 'class' => 'img--round' ) ); ?>
							
						<?php endif; ?>
					</div>
					<div class="bd" data-context="text">
						<?php the_content(); ?>
					</div>
				</div>
			</article>
		</div>
	</div>
	<?php endwhile; ?>
	
	<div class="row">
	<nav class="wp-prev-next mod">
		<ul class="clearfix">
			<li class="next-link"><?php next_posts_link(__('&laquo; Older Entries', "andrewheins")) ?></li>
			<li class="prev-link"><?php previous_posts_link(__('Newer Entries &raquo;', "andrewheins")) ?></li>
		</ul>
	</nav>
	</div>
	
	<?php else: ?>
	
	<div class="row">
			<article role="article" class="mod post-not-found">
				<header class="hd">
					<h2 class="h2">Oops! No Posts Found</h2>
				</header>
				<section data-context="text" class="bd">
					<p>Hmm... I'm having trouble finding any posts to display. This shouldn't happen.</p>
					<p>If you have the patience, please try again in a few minutes and hopefully I'll have fixed this. Otherwise, I really have to apologize. I've sent myself an email, hopefully I can get this sorted out shortly.</p>
				</section>
			</article>
	</div>
	
	<?php endif; ?>
	
	

</section>

<?php get_footer(); ?>
