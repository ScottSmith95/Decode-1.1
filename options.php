<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$theme_color_array = array(
		'warm' => __('Warm', 'melville'),
		'light' => __('Light', 'melville'),
		'white' => __('White', 'melville'),
		'dark' => __('Dark', 'melville')
	);
	
	$type_array = array(
		'serif' => __('Serif', 'melville'),
		'sans' => __('San-Serif', 'melville'),
		'monospace' => __('Monospace', 'melville')
	);
/*

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'melville'),
		'two' => __('Pancake', 'melville'),
		'three' => __('Omelette', 'melville'),
		'four' => __('Crepe', 'melville'),
		'five' => __('Waffle', 'melville')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	); 

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	} */

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'melville'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => "Select your layout",
		'desc' => "Customize your theme layout",
		'id' => "layout",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'2c-l-fixed' => $imagepath . '2cl.png',
			'1col-fixed' => $imagepath . '1col.png',
			'2c-r-fixed' => $imagepath . '2cr.png')
	);
	
	$options[] = array(
		'name' => __('Base color scheme', 'melville'),
		'desc' => __('These are the base color settings for the theme. You can customize these later.', 'melville'),
		'id' => 'color_scheme',
		'std' => 'warm',
		'type' => 'select',
		'class' => 'mini', //mini
		'options' => $theme_color_array);
		
	$options[] = array(
		'name' => __('Typography', 'melville'),
		'desc' => __('Select the typographic settings for the theme.', 'melville'),
		'id' => 'type_scheme',
		'std' => 'serif',
		'type' => 'select',
		'class' => 'mini', //mini
		'options' => $type_array);


/*
	$options[] = array(
		'name' => __('Input Text', 'melville'),
		'desc' => __('A text input field.', 'melville'),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Textarea', 'melville'),
		'desc' => __('Textarea description.', 'melville'),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea');

	

	$options[] = array(
		'name' => __('Input Select Wide', 'melville'),
		'desc' => __('A wider select box.', 'melville'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $theme_color_array);

	$options[] = array(
		'name' => __('Select a Category', 'melville'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'melville'),
		'id' => 'example_select_categories',
		'type' => 'select',
		'options' => $options_categories);
		
	$options[] = array(
		'name' => __('Select a Tag', 'options_check'),
		'desc' => __('Passed an array of tags with term_id and term_name', 'options_check'),
		'id' => 'example_select_tags',
		'type' => 'select',
		'options' => $options_tags);

	$options[] = array(
		'name' => __('Select a Page', 'melville'),
		'desc' => __('Passed an pages with ID and post_title', 'melville'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Input Radio (one)', 'melville'),
		'desc' => __('Radio select with default options "one".', 'melville'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $theme_color_array);

	$options[] = array(
		'name' => __('Example Info', 'melville'),
		'desc' => __('This is just some example information you can put in the panel.', 'melville'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Input Checkbox', 'melville'),
		'desc' => __('Example checkbox, defaults to true.', 'melville'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');
*/

	$options[] = array(
		'name' => __('Advanced Settings', 'melville'),
		'type' => 'heading');
	
	
	$options[] = array(
		'name' => __('Google Analytics', 'melville'),
		'desc' => __('Enter your analytics ID here to enable Google Analytics. Format: UA-XXXXXXXX-1.', 'melville'),
		'id' => 'analytics',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Custom CSS', 'melville'),
		'desc' => __('Any custom CSS entered here will be output in the head of your theme.', 'melville'),
		'id' => 'css_textarea',
		'std' => '',
		'type' => 'textarea');
/*
	$options[] = array(
		'name' => __('Check to Show a Hidden Text Input', 'melville'),
		'desc' => __('Click here and see what happens.', 'melville'),
		'id' => 'example_showhidden',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Hidden Text Input', 'melville'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'melville'),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Uploader Test', 'melville'),
		'desc' => __('This creates a full size uploader that previews the image.', 'melville'),
		'id' => 'example_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' =>  __('Example Background', 'melville'),
		'desc' => __('Change the background CSS.', 'melville'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Multicheck', 'melville'),
		'desc' => __('Multicheck description.', 'melville'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);

	$options[] = array(
		'name' => __('Colorpicker', 'melville'),
		'desc' => __('No color selected by default.', 'melville'),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color' );
		
	$options[] = array( 'name' => __('Typography', 'melville'),
		'desc' => __('Example typography.', 'melville'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );
		
	$options[] = array(
		'name' => __('Custom Typography', 'melville'),
		'desc' => __('Custom typography options.', 'melville'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );

	$options[] = array(
		'name' => __('Text Editor', 'melville'),
		'type' => 'heading' );
	*/

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	 /* 
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Default Text Editor', 'melville'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'melville' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
*/
	return $options;
}


/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */
/*
add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}*/