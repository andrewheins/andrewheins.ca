<?php 
	if( !empty( $post->content_layers ) ) {
		foreach( $post->content_layers as $layer ) {
			cl_embed_content_layer( $layer );
		}	
	} 
?>