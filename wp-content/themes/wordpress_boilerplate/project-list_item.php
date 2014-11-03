		<article role="article" class="mod project-index-item post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="hd">
				<h2 class="h2"><a href="<? the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="meta aux"><?php _e("Posted", "andrewheins"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("in", "andrewheins"); ?> <?php the_terms( $post->ID, 'ah_roles', null, ', '); ?>.</p>
			</header>
			<div class="bd">
				<div class="infinite-horizontal-list">
					<ul class="horizontal-list list-opacity-hover">
					<?php
					$atts = get_all_attachments( $post->ID );
					foreach ( $atts as $att ) : ?>
						<li class="project-thumbnail">
							<a href="<?php the_permalink(); ?>"><?php echo( wp_get_attachment_image( $att->ID, 'thumbnail') ); ?></a>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</article>