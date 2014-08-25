<?php global $data; ?>
<div class="mod text-block">
	<div class="hd">
		<?= !empty( $data['no_content_title'] ) ? $data['no_content_title'] : __( "No Posts Found", "andrewheins" ); ?>
	</div>
	<div class="bd">
		<?= !empty( $data['no_content_body'] ) ? $data['no_content_body'] : __( "We could not find any posts.", "andrewheins" ); ?>
	</div>
</div>