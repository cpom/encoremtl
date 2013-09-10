<?php 
function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

//Define constants:
define('GD_FUNCTIONS', TEMPLATEPATH . '/themeskingdom/');
define('GD_WIDGETS', TEMPLATEPATH . '/themeskingdom/widgets/');
define('PATTERNS', get_template_directory_uri() . '/style/patterns/');
define('GD_THEME_DIR', get_template_directory_uri());
define('AJAX_FUNCTIONS', get_template_directory_uri().'/lib/');
define('SCREENS', get_template_directory_uri().'/include/css/img/screens/');
define('LISTSTYLE', get_template_directory_uri() . '/style/img/styletype/');
define('GD_MAINMENU_NAME', 'general-options');
define('THEME_NAME','Widely');
define('GD_THEME', THEME_NAME);
define('GD_SHORT', THEME_NAME.'_');
define('GD_THEME_VERSION', '1.0');
define('GD_SITE_URL', home_url());
update_option('THEME_NAME',THEME_NAME);



	require_once (GD_FUNCTIONS . 'functions.php');
	//Load admin specific files:
	if (is_admin()) :
		require_once (GD_FUNCTIONS . 'settings/meta-functions.php');
		require_once (GD_FUNCTIONS . 'settings/ajax-image.php');
		require_once (GD_FUNCTIONS . 'settings/admin-helper.php');
		require_once (GD_FUNCTIONS . 'settings/adding_menu.php');
		require_once (GD_FUNCTIONS . 'settings/helpers.php');
		require_once (GD_FUNCTIONS . 'theme.php');
		

	endif;

	//Register sidebar
	require_once (GD_FUNCTIONS . 'settings/register_sidebar.php');
	
	
	//Load widgets:
	require_once (GD_WIDGETS . 'widget-flickr.php');
	require_once (GD_WIDGETS . 'widget-twitter.php');
	require_once (GD_WIDGETS . 'widget-recent.php');
	require_once (GD_WIDGETS . 'widget-author.php');
	require_once (GD_WIDGETS . 'widget_video.php');


	//Load helpers:
	require_once (GD_FUNCTIONS . 'settings/helpers.php');
	require_once (GD_FUNCTIONS . 'settings/tk-shortcodes.php');
	

	if ( function_exists( 'register_nav_menu' ) ) {
		register_nav_menu( 'primary-menu', 'Primary menu for your site' );
	}
	
	

	remove_filter( 'the_content', 'wpautop' );


	add_editor_style('editor-style.css');;

	
	add_theme_support( 'post-thumbnails', array( 'slider','post' ) );
	add_theme_support( 'automatic-feed-links' );


	