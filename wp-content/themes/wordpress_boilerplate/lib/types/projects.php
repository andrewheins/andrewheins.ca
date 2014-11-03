<?php 
function ah_projects_post_type(){
	register_post_type( 'ah_projects',
		array(
			'labels' => array(
				'name' => 'Projects',
				'singular_name' => 'Project',
				'add_new' => 'Add New Project',
				'add_new_item' => 'Add New Project',
				'edit_item' => 'Edit Project',
				'new_item' => 'New Project'
			),
			'public' => true,
			'rewrite' => array(
				'slug' => 'projects'
			),
			'has_archive' => true,
			'supports' => array(
				'title',
				'editor',
				'page-attributes',
				'revisions',
				'thumbnail'
			)
		)
	);
}
 
add_action('init', 'ah_projects_post_type', 0);

function add_role_taxonomy() {
	// create a new taxonomy
	register_taxonomy(
		'ah_roles',
		'ah_projects',
		array(
			'label' => __( 'Roles' ),
			'rewrite' => array( 'slug' => 'services' ),
		)
	);
}
add_action( 'init', 'add_role_taxonomy' );