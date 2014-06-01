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

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
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
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	/*----------------------------------------------------------
	Theme Options
	----------------------------------------------------------*/
	$options[] = array(
		'name' => __('Basics', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'options_framework_theme'),
		'desc' => __('Select a logo file', 'options_framework_theme'),
		'id' => 'logo_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Footer Location Info', 'options_framework_theme'),
		'desc' => __('Footer Location Info', 'options_framework_theme'),
		'id' => 'footer_location',
		'std' => '2077 Miner, Suite 204 Des Plaines, IL 60016<br />224.563.3800 / <a href="mailto:sales@axiomtechgroup.com">sales@axiomtechgroup.com</a>',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Show Twitter Feed in Footer', 'options_framework_theme'),
		'desc' => __('If checked, each page will display your latest tweet'),
		'id' => 'show_twitter',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Twitter Handle', 'options_framework_theme'),
		'desc' => __('Twitter Handle', 'options_framework_theme'),
		'id' => 'twitter_handle',
		'std' => 'axiomtechgroup',
		'type' => 'text');

	$options[] = array(
		'name' => __('Blog Topper', 'options_framework_theme'),
		'desc' => __('Large Image at the Top of the Blog', 'options_framework_theme'),
		'id' => 'blog_topper',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Blog Icon', 'options_framework_theme'),
		'desc' => __('Icon at the top of the Blog', 'options_framework_theme'),
		'id' => 'blog_icon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Blog Title', 'options_framework_theme'),
		'desc' => __('Blog Title', 'options_framework_theme'),
		'id' => 'blog_title',
		'std' => 'Axiom Blog',
		'type' => 'text');

	/*----------------------------------------------------------
	Rotator Images
	----------------------------------------------------------*/
	$options[] = array(
		'name' => __('Rotator', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Rotator 1', 'options_framework_theme'),
		'desc' => __('Rotator Image 1', 'options_framework_theme'),
		'id' => 'rotator1',
		'type' => 'upload');

	/*----------------------------------------------------------
	Homepage Settings
	----------------------------------------------------------*/
	$options[] = array(
		'name' => __('Home', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Partner 1', 'options_framework_theme'),
		'desc' => __('Partner 1', 'options_framework_theme'),
		'id' => 'partner1',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Partner 2', 'options_framework_theme'),
		'desc' => __('Partner 2', 'options_framework_theme'),
		'id' => 'partner2',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Partner 3', 'options_framework_theme'),
		'desc' => __('Partner 3', 'options_framework_theme'),
		'id' => 'partner3',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Partner 4', 'options_framework_theme'),
		'desc' => __('Partner 4', 'options_framework_theme'),
		'id' => 'partner4',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Partner 5', 'options_framework_theme'),
		'desc' => __('Partner 5', 'options_framework_theme'),
		'id' => 'partner5',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Partner 6', 'options_framework_theme'),
		'desc' => __('Partner 6', 'options_framework_theme'),
		'id' => 'partner6',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Rotator 1 Alt', 'options_framework_theme'),
		'desc' => __('Rotator 1 Alt Text', 'options_framework_theme'),
		'id' => 'alt1',
		'std' => 'Partner 1',
		'type' => 'text');

	$options[] = array(
		'name' => __('Rotator 2 Alt', 'options_framework_theme'),
		'desc' => __('Rotator 2 Alt Text', 'options_framework_theme'),
		'id' => 'alt2',
		'std' => 'Partner 2',
		'type' => 'text');

	$options[] = array(
		'name' => __('Rotator 3 Alt', 'options_framework_theme'),
		'desc' => __('Rotator 3 Alt Text', 'options_framework_theme'),
		'id' => 'alt3',
		'std' => 'Partner 3',
		'type' => 'text');

	$options[] = array(
		'name' => __('Rotator 4 Alt', 'options_framework_theme'),
		'desc' => __('Rotator 4 Alt Text', 'options_framework_theme'),
		'id' => 'alt4',
		'std' => 'Partner 4',
		'type' => 'text');

	$options[] = array(
		'name' => __('Rotator 5 Alt', 'options_framework_theme'),
		'desc' => __('Rotator 5 Alt Text', 'options_framework_theme'),
		'id' => 'alt5',
		'std' => 'Partner 5',
		'type' => 'text');

	$options[] = array(
		'name' => __('Rotator 6 Alt', 'options_framework_theme'),
		'desc' => __('Rotator 6 Alt Text', 'options_framework_theme'),
		'id' => 'alt6',
		'std' => 'Partner 6',
		'type' => 'text');

	$options[] = array(
		'name' => __('Recent Project Title', 'options_framework_theme'),
		'desc' => __('Recent Project Title', 'options_framework_theme'),
		'id' => 'recent_title',
		'std' => 'Recent Projects',
		'type' => 'text');

	$options[] = array(
		'name' => __('Recent Project Link', 'options_framework_theme'),
		'desc' => __('Recent Project Link', 'options_framework_theme'),
		'id' => 'recent_link',
		'std' => 'Recent Project Link',
		'type' => 'text');

	$options[] = array(
		'name' => __('Recent Project Image', 'options_framework_theme'),
		'desc' => __('Recent Project Image', 'options_framework_theme'),
		'id' => 'recent_image',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Recent Project Image Hover', 'options_framework_theme'),
		'desc' => __('Recent Project Image Hover', 'options_framework_theme'),
		'id' => 'recent_image_hover',
		'type' => 'upload');

	/*----------------------------------------------------------
	Basic Settings
	----------------------------------------------------------*/
	$options[] = array(
		'name' => __('Page Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Page Heading Titles?', 'options_framework_theme'),
		'desc' => __('If checked, each page will display the title as a heading'),
		'id' => 'show_headings',
		'std' => '1',
		'type' => 'checkbox');

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Default Text Editor', 'options_framework_theme'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_framework_theme' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

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
}