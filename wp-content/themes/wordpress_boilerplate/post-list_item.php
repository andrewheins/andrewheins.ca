		<article role="article" class="mod article post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="hd">
				<h2 class="h2"><a href="<? the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="meta aux"><?php _e("Posted", "andrewheins"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("in", "andrewheins"); ?> <?php the_category(', '); ?>.</p>
			</header>
			<div data-context="text" class="bd">
				<p><?php the_excerpt(); ?></p>
				
			</div>
		</article>