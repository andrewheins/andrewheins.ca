<?php 
	
	$latest_args = 	array(
		'posts_per_page' => empty( $layer['number_of_posts'] ) ? 3 : $layer['number_of_posts']
	);
	
	$latest = get_posts( $latest_args );
	
?>
<div class="row">
	<div class="inner<?php if( $layer['bordered'] ) : ?> row-bordered<?php endif; ?>">
		<article class="article">
			<div class="hd">
				<h2 class="h2">
					<?php if( !empty( $layer['title'] ) ) : ?>
						<?php echo( $layer['title'] ); ?>
					<?php else : ?>
						<?php the_title(); ?>
					<?php endif; ?>
				</h2>
			</div>
			<div class="bd">
				<?php foreach( $latest as $temp ) : ?>
					<h2 class="h4">
						<a href="<?php echo( get_permalink( $temp->ID ) ); ?>"><?php echo( $temp->post_title ); ?></a>
					</h2>
				<?php endforeach; ?>
			</div>
		</article>
	</div>
</div>