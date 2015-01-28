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
			<div class="bd text-block">
				<?php echo( apply_filters( 'the_content', $layer['content'] ) ); ?>
			</div>
		</article>
	</div>
</div>