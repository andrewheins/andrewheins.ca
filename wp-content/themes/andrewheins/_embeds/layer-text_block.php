<div class="row" layer-style="<?php echo( $layer['acf_fc_layout'] ); ?>">
	<div class="inner<?php if( $layer['bordered'] ) : ?> row-bordered<?php endif; ?>">
		<div class="mod">
			<?php if( !empty( $layer['title'] ) ) : ?>
			<div class="hd">
				<h2 class="h2"><?php echo( $layer['title'] ); ?></h2>
			</div>
			<?php endif; ?>
			<div class="bd text-block">
				<?php echo( apply_filters( 'the_content', $layer['content'] ) ); ?>
			</div>
		</div>
	</div>
</div>