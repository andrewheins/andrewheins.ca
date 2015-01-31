<div class="row" layer-style="<?php echo( $layer['acf_fc_layout'] ); ?>">
	<div class="inner<?php if( $layer['bordered'] ) : ?> row-bordered<?php endif; ?>">
		<div class="mod">
			<?php if( !empty( $layer['title'] ) ) : ?>
			<div class="hd">
				<h2 class="h2"><?php echo( $layer['title'] ); ?></h2>
			</div>
			<?php endif; ?>
			<div class="bd">
				<?php gravity_form($layer['form_id'], false, false, false, '', false); ?>
				<?php gravity_form_enqueue_scripts($layer['form_id']); ?>
			</div>
		</div>
	</div>
</div>