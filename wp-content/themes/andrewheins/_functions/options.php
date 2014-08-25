<?php
/**
 * _s Theme Options
 *
 * @package _s
 * @since _s 1.0
 */

/**
 * Register the form setting for our _s_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, _s_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly
 * formatted, and safe.
 *
 * @since _s 1.0
 */
function _s_theme_options_init() {
	register_setting(
		'_s_options', // Options group, see settings_fields() call in _s_theme_options_render_page()
		'_s_theme_options', // Database option, see _s_get_theme_options()
		'_s_theme_options_validate' // The sanitization callback, see _s_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see _s_theme_options_add_page()
	);

	add_settings_field( 'no_content_title', "No Content Title", '_s_settings_field_no_content_title', 'theme_options', 'general' );

	add_settings_field( 'no_content_body', "No Content Body", '_s_settings_field_no_content_body', 'theme_options', 'general' );
}
add_action( 'admin_init', '_s_theme_options_init' );

/**
 * Change the capability required to save the '_s_options' options group.
 *
 * @see _s_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see _s_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function _s_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability__s_options', '_s_option_page_capability' );

/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since _s 1.0
 */
function _s_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', '_s' ),   // Name of page
		__( 'Theme Options', '_s' ),   // Label in menu
		'edit_theme_options',          // Capability required
		'theme_options',               // Menu slug, used to uniquely identify the page
		'_s_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', '_s_theme_options_add_page' );


/**
 * Returns the options array for _s.
 *
 * @since _s 1.0
 */
function _s_get_theme_options() {
	$saved = (array) get_option( '_s_theme_options' );
	$unescaped = array();
	
	foreach( $saved as $k => $v ) {
		$unescaped[$k] = stripcslashes( $v ); 
	}
	
	$defaults = array(
		'no_content_title'     => '',
		'no_content_body' => '',
	);

	$defaults = apply_filters( '_s_default_theme_options', $defaults );

	$options = wp_parse_args( $unescaped, $defaults );
	$options = array_intersect_key( $options, $defaults );

	return $options;
}

/**
 * Renders the No Content Title setting field.
 */
function _s_settings_field_no_content_title() {
	$options = _s_get_theme_options();
	?>
	<input type="text" name="_s_theme_options[no_content_title]" id="no-content-title" value="<?php echo esc_attr( $options['no_content_title'] ); ?>" />
	<?php
}

/**
 * Renders the No Content Body setting field.
 */
function _s_settings_field_no_content_body() {
	$options = _s_get_theme_options();
	?>
	<textarea class="large-text" type="text" name="_s_theme_options[no_content_body]" id="no-content-body" cols="50" rows="10"><?php echo esc_textarea( $options['no_content_body'] ); ?></textarea>
	<?php
}

/**
 * Renders the Theme Options administration screen.
 *
 * @since _s 1.0
 */
function _s_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', '_s' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( '_s_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see _s_theme_options_init()
 * @todo set up Reset Options action
 *
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 *
 * @since _s 1.0
 */
function _s_theme_options_validate( $input ) {
	$output = array();

	// The sample text input must be safe text with no HTML tags
	if ( isset( $input['no_content_title'] ) && ! empty( $input['no_content_title'] ) )
		$output['no_content_title'] = wp_filter_nohtml_kses( $input['no_content_title'] );

	// The sample textarea must be safe text with the allowed tags for posts
	if ( isset( $input['no_content_body'] ) && ! empty( $input['no_content_body'] ) )
		$output['no_content_body'] = wp_filter_nohtml_kses( $input['no_content_body'] );

	return apply_filters( '_s_theme_options_validate', $output, $input );
}