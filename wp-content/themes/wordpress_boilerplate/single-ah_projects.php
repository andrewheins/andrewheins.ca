<?php get_header(); ?>
<section id="main">

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<div class="row">
			<article role="article" class="article post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="wrapper wrapper-inset">
					<div class="mod">
						<header class="hd">
							<h2 class="h2"><?php the_title(); ?></h2>
							<p class="meta aux">Launched <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time>.</p>
						</header>
					</div>
				</div>
				<div class="flexslider">
					<ul class="slides">
					<?php
						$gallery_images = get_all_attachments( $post->ID );
						
						foreach ( $gallery_images as $post ) : setup_postdata( $post ); ?>
						<li>
							<?php echo( wp_get_attachment_image( $post->ID, 'full' ) ); ?>
							<a class="slide-caption" href="<?php the_field('project_url'); ?>">Visit the site!</a>
						</li>	
						<?php endforeach; 
						wp_reset_postdata(); ?>
					</ul>
				</div>
				<div class="wrapper wrapper-medium">
					<div class="mod">
						<section data-context="text" class="bd">
							<?php the_content(); ?>
						</section>
					</div>
					<div class="project-details">
						<div class="mod">
							<ul class="roles-list">
							<?php 
								$roles = get_the_terms( $post->ID, 'ah_roles' );
								foreach( $roles as $role ) :?>
								<li class="project-role" data-id="<?php echo( $role->slug ); ?>"><a href="<?php echo( get_term_link( $role ) ); ?>"><?php echo( $role->name ); ?></a></li>
								<? endforeach; ?>
							</ul>
						</div>
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
