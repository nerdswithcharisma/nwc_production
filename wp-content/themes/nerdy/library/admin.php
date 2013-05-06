<?php
/*
This is where we will customize all the admin features for our theme.
*/

/* Style up our login page
=====================================*/
function nerdy_login_css(){
    wp_register_style( 'nerdy-admin-style', '/wp-content/themes/nerdy/library/css/nerdy-admin-style.css', __FILE__  );  
    wp_enqueue_style( 'nerdy-admin-style' );  
}
add_action( 'login_head', 'nerdy_login_css');


/* Turn Off Un-Needed Widgets
=====================================*/
function disable_default_widgets(){
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');  /* comments */
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');   /* incoming links */
	remove_meta_box('dashboard_plugins', 'dashboard', 'core'); 			/* plugins */
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');		/* quick press */
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');	/* recent drafts */
	remove_meta_box('dashboard_primary', 'dashboard', 'core');			/* wordpress blog */
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');		/* wordpress news */
}
add_action('admin_menu', 'disable_default_widgets');


/* Customize the Footer
=====================================*/
function nerdy_custom_admin_footer(){
	echo '<span id="footer-thankyou">Developed by <a href="http://nerdswithcharisma.com/" target="_blank">Nerds With Charisma</a>. Contact us if you have <a href="mailto:info@axiomtechgroup.com">any questions</a>.';
}
add_filter( 'admin_footer_text', 'nerdy_custom_admin_footer' );
?>