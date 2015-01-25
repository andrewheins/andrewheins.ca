<?php
	
/*
 *	The default Nav Walker adds a lot to a menu we don't need.
 *	No magic here, just simplification.
 */
class Walker_Simple_Menu extends Walker_Nav_Menu {
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {	
		$output .= sprintf( "\n<li><a href='%s'%s>%s</a></li>\n",
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );		
	}
	
}