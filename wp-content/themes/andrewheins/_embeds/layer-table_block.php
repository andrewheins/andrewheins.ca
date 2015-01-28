<div class="row">
	<div class="inner<?php if( $layer['bordered'] ) : ?> row-bordered<?php endif; ?>">
		<div class="mod">
			<?php if( !empty( $layer['title'] ) ) : ?>
			<div class="hd">
				<h2 class="h2">
						<?php echo( $layer['title'] ); ?>
				</h2>
			</div>
			<?php endif; ?>
			<div class="bd">
				<ul class="item-list" style-cols="<?php echo( $layer['columns'] ); ?>">
					<?php foreach( $layer['items'] as $item ) : ?><li class="item">
						<?php echo( wp_get_attachment_image( $item['image']['id'], 'thumbnail' ) ); ?>
						<div class="item-label"><?php echo( $item['label'] ); ?></div>
					</li><?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>