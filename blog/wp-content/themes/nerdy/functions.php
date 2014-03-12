<?php
/*
Author: Brian Dausman
URL: htp://nerdswithcharisma.com/themes/nerdy/
*/

/*----------------------------------------------------------
Theme options framework
----------------------------------------------------------*/
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

/*----------------------------------------------------------
Custom Meta Boxes
----------------------------------------------------------*/
//init
add_action( 'load-post.php', 'nwc_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'nwc_post_meta_boxes_setup' );

function nwc_post_meta_boxes_setup(){
	//ad meta boxes hook
	add_action( 'add_meta_boxes', 'nwc_add_post_meta_boxes' );

	//save post meta hook
	add_action( 'save_post', 'nwc_save_post_meta', 10, 2 );
}

//create the meta box
function nwc_add_post_meta_boxes(){
	add_meta_box(
		'nwc-post-title',
		'Post Title',
		'nwc_post_title_meta_box',
		'Page',
		'side',
		'default'
	);

	add_meta_box(
		'nwc-post-icon',
		'Post Icon',
		'nwc_post_icon_meta_box',
		'Page',
		'side',
		'default'	
	);

	add_meta_box(
		'nwc-post-tagline',
		'Post Tagline',
		'nwc_post_tagline_meta_box',
		'Page',
		'side',
		'default'
	);
}

//display the meta boxes

//Page Title
function nwc_post_title_meta_box( $object, $box ){ ?>
	
	<?php wp_nonce_field( basename(__FILE__), 'nwc_post_title_nonce' ); ?>

	<p>
		<label for="nwc-post-title"><?php _e("A Title to Display in the Featured Image", 'nwc' ); ?></label>
		<br />
		<input class="widefat" type="text" name="nwc-post-title" id="nwc-post-title" value="<?php echo get_post_meta( $object->ID, 'nwc_post_title', true ); ?>" size="30" />
	</p>

<?php
}

//Page Icon
function nwc_post_icon_meta_box( $object, $box ){ ?>
	
	<?php wp_nonce_field( basename(__FILE__), 'nwc_post_icon_nonce' ); ?>

	<p>
		<label for="nwc-post-icon"><?php _e("An Icon to Display in the Featured Image", 'nwc' ); ?></label>
		<br />
		<input class="widefat" type="text" name="nwc-post-icon" id="nwc-post-icon" value="<?php echo get_post_meta( $object->ID, 'nwc_post_icon', true ); ?>" size="30" />
	</p>

<?php
}

//Post Tagline
function nwc_post_tagline_meta_box( $object, $box ){ ?>
	
	<?php wp_nonce_field( basename(__FILE__), 'nwc_post_tagline_nonce' ); ?>

	<p>
		<label for="nwc-post-tagline"><?php _e("The Tagline at the Top of the Page", 'nwc' ); ?></label>
		<br />
		<input class="widefat" type="text" name="nwc-post-tagline" id="nwc-post-tagline" value="<?php echo get_post_meta( $object->ID, 'nwc_post_tagline', true ); ?>" size="30" />
	</p>

<?php
}

//save the meta box
function nwc_save_post_meta( $post_id, $post ){

	//verify the nonces
	if( !isset( $_POST['nwc_post_title_nonce'] ) || !wp_verify_nonce( $_POST['nwc_post_title_nonce'], basename( __FILE__ ) ) || !isset( $_POST['nwc_post_icon_nonce'] ) || !wp_verify_nonce( $_POST['nwc_post_icon_nonce'], basename( __FILE__ ) ) || !isset( $_POST['nwc_post_tagline_nonce'] ) || !wp_verify_nonce( $_POST['nwc_post_tagline_nonce'], basename( __FILE__ ) ) ){
		return $post_id;
	}

	//get post type object
	$post_type = get_post_type_object( $post->post_type );

	//check if current user has permission
	 if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ){
        return $post_id;
    }

    //get posted date and sanitize
	$new_meta_value = ( isset( $_POST['nwc-post-title'] ) ? sanitize_text_field( $_POST['nwc-post-title'] ) : ' ' );
	$new_meta_value2 = ( isset( $_POST['nwc-post-icon'] ) ? sanitize_text_field( $_POST['nwc-post-icon'] ) : ' ' );
	$new_meta_value3 = ( isset( $_POST['nwc-post-tagline'] ) ? sanitize_text_field( $_POST['nwc-post-tagline'] ) : ' ' );

	//get the meta key.
	$meta_key = 'nwc_post_title';
	$meta_key2 = 'nwc_post_icon';
	$meta_key3 = 'nwc_post_tagline';

	//get the meta value key.
	$meta_value = get_post_meta( $post_id, $meta_key, true );
	$meta_value2 = get_post_meta( $post_id, $meta_key2, true );
	$meta_value3 = get_post_meta( $post_id, $meta_key3, true );

	//use old value
	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );

	if ( $new_meta_value2 && '' == $meta_value2 )
		add_post_meta( $post_id, $meta_key2, $new_meta_value2, true );

	if ( $new_meta_value3 && '' == $meta_value3 )
		add_post_meta( $post_id, $meta_key3, $new_meta_value3, true );

	//update value if new
	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );

	elseif ( $new_meta_value2 && $new_meta_value2 != $meta_value2 )
		update_post_meta( $post_id, $meta_key2, $new_meta_value2 );

	elseif ( $new_meta_value3 && $new_meta_value3 != $meta_value3 )
		update_post_meta( $post_id, $meta_key3, $new_meta_value3 );

	//empty if no new value
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );

	elseif ( '' == $new_meta_value2 && $meta_value2 )
		delete_post_meta( $post_id, $meta_key2, $meta_value2 );

	elseif ( '' == $new_meta_value3 && $meta_value3 )
		delete_post_meta( $post_id, $meta_key3, $meta_value3 );
}

/*----------------------------------------------------------
Remove Dimensions from Thumbnails
----------------------------------------------------------*/
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/*----------------------------------------------------------
Page Navi if more than one page
----------------------------------------------------------*/
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/*----------------------------------------------------------
Featured Image
----------------------------------------------------------*/
add_theme_support('post-thumbnails'); 
set_post_thumbnail_size(704, 350); 
add_image_size( 'loop_thumbnail',   1600, 700, true );


/*----------------------------------------------------------
Shortcodes
----------------------------------------------------------*/
//first lets register any js thats going to be needed
function nwc_scripts_basic()  
{    
    wp_register_script( 'rotator_script', get_template_directory_uri() . '/library/js/libs/jquery.cycle.plugin.js' );   
    wp_enqueue_script( 'rotator_script' );  
}  
add_action( 'wp_footer', 'nwc_scripts_basic' );  

/** remove p's around short codes */
/* thanks goes to - http://www.wpexplorer.com/snippet/clean-wordpress-shortcodes */
function wpex_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');


/** columns **/
function columns( $atts, $content = null ){
	extract(shortcode_atts(array(
		"columns"   => 'one',
		"placement"  => ''
	), $atts));
	return '<div class="' . $columns . 'col ' . $placement . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('columns', 'columns');

/** caption **/
function captioned( $atts, $content = null ){
	extract(shortcode_atts(array(
		"columns"   => 'one',
		"placement"  => '',
		"caption" => '',
		"link" => '',
	), $atts));
	return '<div class="' . $columns . 'col caption ' . $placement . '"><a href="' . $link . '">' . do_shortcode($content) . '</a><aside class="nwc-caption">' . $caption . '</aside></div>';
}
add_shortcode('captioned', 'captioned');



/** buttons **/
function button( $atts, $content = null ){
	extract(shortcode_atts(array(
		"color"   => '',
		"link" => '#'
	), $atts));
	return '<a href="' . $link . '" class="button '. $color . '">' .$content . '</a>';
}
add_shortcode('button', 'button');

/** alerts **/
function alert( $atts, $content = null ){
	extract(shortcode_atts(array(
		"type"   => ''
	), $atts));
	return '<div class="'. $type . '">' . $content . '</div>';
}
add_shortcode('alert', 'alert');

/** custom blockquote **/
function blocked( $atts, $content = null ){
	extract(shortcode_atts(array(
		'padding' => '25',
		'border_color' => '#ccc',
		'background' => 'whitesmoke',
		'alignment' => 'left',
		'font_color' => '#333',
		'font_size' => '1em',
		'extras' => '',
		'margin' => '20'
	), $atts));

	return "<div style='{$extras}; margin-bottom:{$margin}px; padding: {$padding}px; text-align: {$alignment}; background: {$background}; border: 1px solid {$border_color};'><span style='color: {$font_color}; font-size: {$font_size};'>{$content}</span></div>";
}
add_shortcode( 'blocked', 'blocked' );

/** accordians **/
function accordion( $atts, $content = null ){
	extract(shortcode_atts(array(
		"class=" => ''
	), $atts));
	return '<div class="accordion '. $class . '">' .  do_shortcode($content) . '</div>';
}
add_shortcode('accordion', 'accordion');

function panel( $atts, $content = null ){
	extract(shortcode_atts(array(
		"name"   => 'name'
	), $atts));
	return '<h6 class="accordionTitle">' . $name . '</h6><div class="accordionContent"><div>' . $content . '</div></div>';
}
add_shortcode('panel', 'panel');

/** tabs **/
//thanks to michael sender - http://michaelwender.com/blog/2010/11/01/creating-wordpress-shortcodes-for-jquery-tools-tabs/
add_shortcode( 'tabgroup', 'jqtools_tab_group' );
function jqtools_tab_group( $atts, $content ){
$GLOBALS['tab_count'] = 0;

do_shortcode( $content );

if( is_array( $GLOBALS['tabs'] ) ){
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '<li><a class="" href="#">'.$tab['title'].'</a></li>';
$panes[] = '<div class="pane">'.$tab['content'].'</div>';
}
$return = "\n".'<!-- the tabs --><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><div class="panes">'.implode( "\n", $panes ).'</div>'."\n";
}
return $return;
}

add_shortcode( 'tab', 'jqtools_tab' );
function jqtools_tab( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Tab %d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

$GLOBALS['tab_count']++;
}

/* social icons */
function social( $atts = null ){
	extract(shortcode_atts(array(
		"logo"   => '',
		"link" => '#'
	), $atts));
	return '<a href="' . $link . '" class="socialBtn" target="_blank"><img src="' .  get_template_directory_uri() . '/library/images/'  .  $logo . '.png" /></a>';
}
add_shortcode('social', 'social');


/* google maps */
function map( $atts ){
	extract(shortcode_atts(array(
		"location"     => 'Area 51',
		"width"        => '100%',
		"height"       => '350px',
		"frameborder"  => '0',
		"marginheight" => '0',
		"marginwidth"  => '0',
		"type"		   => 'm',
		"zoom" 		   => '14'
		
	), $atts));
	return '<iframe width="' . $width . '" height="' . $height .'" frameborder="' . $frameborder .'" scrolling="no" marginheight="' . $marginheight .'" marginwidth="' . $marginwidth .'" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=' . $location . '&amp;aq=0&amp;ie=UTF8&amp;hq=&amp;hnear=' . $location . '&amp;t=' . $type . '&amp;z=' .$zoom . '&amp;output=embed&amp;iwloc=near"></iframe>';
}
add_shortcode('map', 'map');

/** tables **/
//thanks to Kevin Chard @ http://wpsnipp.com/index.php/functions-php/shortcode-tables-with-multiple-rows-and-columns/
function simple_table( $atts ) {
    extract( shortcode_atts( array(
        'cols' => 'none',
        'data' => 'none',
        'type'   => 'table'
    ), $atts ) );
    $cols = explode(',',$cols);
    $data = explode(',',$data);
    $total = count($cols);
    $output .= '<table class="' . $type .'"><tr class="th">';
    foreach($cols as $col):
        $output .= '<th>'.$col.'</th>';
    endforeach;
    $output .= '</tr><tr>';
    $counter = 1;
    foreach($data as $datum):
        $output .= '<td>'.$datum.'</td>';
        if($counter%$total==0):
            $output .= '</tr>';
        endif;
        $counter++;
    endforeach;
        $output .= '</table>';
    return $output;
}
add_shortcode( 'table', 'simple_table' );


/** pricing table **/
add_shortcode('pricing_table', 'nwc_pricing_table');
function nwc_pricing_table( $atts, $content = null){

	$output = "
				<div class='nwc-pricing'>
					{$content}
				</div><!-- nwc-pricing -->
			";

	return do_shortcode($output);
}

add_shortcode('pricing', 'nwc_pricing');
function nwc_pricing( $atts, $content = null) {
	extract( shortcode_atts(array(
		'title' => 'Option',
		'price' => '1.00',
		'tagline' => 'Here is an option',
		'btn_text' => 'Find Out More',
		'url' => 'index.php',
		'target' => 'self',
		'size' => ''
	), $atts));

	$output = "
			<div class='pricing_table {$size}'>
				<div class='pricing_wrap'>
					
					<div class='pricing_heading'>
						<h2 class='pricing_title'>{$title}</h2>
						<p>{$tagline}</p>
					</div> <!-- pricing_heading -->


					<div class='pricing-content'>                
						<ul class='pricing'>
							{$content}
						</ul>
					</div><!-- pricing_content -->

					<div class='pricing_bottom'>
						<span class='nwc_price'>
							<span class='dollar-sign'>$</span>{$price}</sup>
						</span>
					</div> <!-- pricing-content-bottom -->

					<a href='{$url}' class='pricing_button' target='_{$target}'>{$btn_text}</a>


				</div><!-- pricing_wrap' -->
			</div><!-- pricing_table -->
			";

	return do_shortcode($output);
}

add_shortcode( 'option', 'nwc_pricing_option' );
function nwc_pricing_option( $atts, $content = null ) {

	$output = "<li>{$content}</li>";
	
	return $output;
}

/* Rotator */
add_shortcode( 'rotator', 'nwc_rotator' );
function nwc_rotator( $atts, $content = null ) {
	extract( shortcode_atts(array(
		'delay' => '0',
		'fx' => 'fade',
		'pause' => '1',
		'random' => '0',
		'speed' => '1000',
		'timeout' => '4000',
		'pager' => 'false',
		'next' => 'next',
		'prev' => 'prev',
		'width' => '100%'
	), $atts));

	$output = "
				<div class='slider_wrap'>
					<div class='slider'>
						{$content}
					</div>
				</div>
			";

	$output .= "
				<script>
					jQuery(document).ready(function(){
						jQuery('.slider').after('<div id=\"nwc_rotator_nav_true\">')
						.cycle({
							slideExpr: 'img:not(.placeholder)',
							slideResize: false,
        					containerResize: false,
        					cleartypeNoBg: true,
        					delay: {$delay},
        					fx: '{$fx}',
        					pause: {$pause},
        					random: {$random},
        					speed: {$speed},
        					timeout: {$timeout},
        					pager: '#nwc_rotator_nav_{$pager}',
        					next: '#next',
        					prev: '#prev',
        					width: '{$width}'
						});
					});
				</script>
			";

	return $output;
}

add_shortcode( 'next', 'nwc_rotator_next' );
function nwc_rotator_next( $atts, $content = null ) {
	$output = "<span id='next'>Next</span>";
	return $output;
}

add_shortcode( 'prev', 'nwc_rotator_prev' );
function nwc_rotator_prev( $atts, $content = null ){
	$output = "<span id='prev'>Prev</span>";
	return $output;
}

/* tooltip */
add_shortcode( 'tooltip', 'nwc_tooltip' );
function nwc_tooltip( $atts, $content = null ){
	extract( shortcode_atts( array(
		'tooltip' => 'Hover Text Goes Here'
	), $atts));

	$output = "<div class='tooltip_wrap'><p class='tooltip'>{$tooltip}</p><span class='tooltip_link'>{$content}</span></div>";
	return $output;
}

/*----------------------------------------------------------
Add shortcodes to tinyMCE
----------------------------------------------------------*/
//hook into wp
add_action('init', 'tinymce_button');

function tinymce_button(){
	//check permissions
	if( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ){
		return;
	}

	//if in visual editor
	if( get_user_option('rich_editing') == 'true' ){
		add_filter( 'mce_external_plugins', 'add_plugin' );
		add_filter( 'mce_buttons_3', 'register_button' );
	}

	//register buttons
	function register_button( $buttons ){
		array_push( $buttons, "", "columns" );
		array_push( $buttons, "", "buttons" );
		array_push( $buttons, "", "social_buttons");
		array_push( $buttons, "", "alerts" );
		array_push( $buttons, "", "tooltip" );
		array_push( $buttons, "", "map" );
		array_push( $buttons, "|", "accordion" );
		array_push( $buttons, "", "accordion_panel" );
		array_push( $buttons, "|", "tabs");
		array_push( $buttons, "", "tab_content" );
		array_push( $buttons, "|", "tables" );
		array_push( $buttons, "|", "rotator" );

		return $buttons;
	}

	//register tinymce plugin
	function add_plugin( $plugin_array ){
		$plugin_array['buttons'] = get_bloginfo( 'template_url' ) . '/library/js/tinymce_buttons.js';
		return $plugin_array;
	}

}

/*----------------------------------------------------------
Directory Shortcuts for Lazy People
----------------------------------------------------------*/
define('NERDYPATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', NERDYPATH . "/library/css/");

/*----------------------------------------------------------
Remove Auto Paragraphs (Turn it on if you dare)
----------------------------------------------------------*/
//remove_filter( 'the_content', 'wpautop' );
//add_filter( 'the_content', 'wpautop' , 12);







/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/
require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
    - adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Sidebar 1',
    	'description' => 'The first (primary) sidebar.',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h1 class="widgettitle">',
    	'after_title' => '</h1>'
    ));

    register_sidebar(array(
    	'id' => 'tweetbar',
    	'name' => 'tweetbar',
    	'description' => 'Display Twitter Feed in Footer',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>'
    ));

    register_sidebar(array(
    	'id' => 'jobs_sidebar',
    	'name' => 'jobs_sidebar',
    	'description' => 'Display a list of jobs on the homepage',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>'
    ));
    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Sidebar 2',
    	'description' => 'The second (secondary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
			    <?php 
			    /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */ 
			    ?>
			    <!-- custom gravatar call -->
			    <?php
			    	// create variable
			    	$bgauthemail = get_comment_author_email();
			    ?>
			    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>&s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			    <!-- end custom gravatar call -->
				
				
				
				<!-- name -->
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<br />
				<small datetime="<?php echo comment_time('Y-m-j'); ?>"><?php comment_time('F jS, Y'); ?> </small>
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert info">
          			<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
		<br /><hr />
    <!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','bonestheme').'" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!


?>