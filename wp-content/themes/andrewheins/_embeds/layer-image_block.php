<div class="row">
	<div class="inner<?php if( $layer['bordered'] ) : ?> row-bordered<?php endif; ?>">
		<div class="mod">
			<?php if( !empty( $layer['title'] ) ) : ?>
			<div class="hd">
				<h2 class="h2"><?php echo( $layer['title'] ); ?></h2>
			</div>
			<?php endif; ?>
			<div class="bd">
				<div class="media-block" style-alignment="<?php echo( $layer['image_alignment'] ); ?>">
					<div class="media">
						<?php echo( wp_get_attachment_image( $layer['image']['id'], 'full' ) ); ?>
					</div>		
					<div class="bd text-block">
						<?php echo( apply_filters( 'the_content', $layer['content'] ) ); ?>
					</div>			
				</div>
			</div>
		</div>
	</div>
</div>