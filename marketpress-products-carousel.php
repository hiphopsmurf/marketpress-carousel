<?php
/*
Plugin Name: MarketPress Products Carousel
Plugin URI: http://cdsincdesign.com
Description: Featured Products Slideshow to be used on the frontpage of MarketPress stores and single roducts multiple images slider.
Author: Steven Whitney
Version: 1.0
Author URI: http://cdsincdesign.com
*/


//add_filter('widget_text', 'do_shortcode');

/*******************************************
* plugin text domain for translations
*******************************************/

load_plugin_textdomain( 'mpc_lang', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**********************************
* constants and globals
**********************************/
$mpc_options = get_option('mpc_settings');

if(!defined('MPC_BASE_URL')) {
	define('MPC_BASE_URL', plugin_dir_url(__FILE__));
}
if(!defined('MPC_BASE_DIR')) {
	define('MPC_BASE_DIR', dirname(__FILE__));
}
if(!defined('MPC_PLUGIN_IMAGES_URL')) {
	define('MPC_PLUGIN_IMAGES_URL', MPC_BASE_URL . '/images/');
}

if (!class_exists('WP_Thumb') ) {
	define( 'WP_THUMB_PATH', MPC_BASE_DIR . '/includes/wpthumb' );
	define( 'WP_THUMB_URL', MPC_BASE_URL . '/includes/wpthumb/' );
	require_once( MPC_BASE_DIR . '/includes/wpthumb/wpthumb.php' );
}

/*define('MPC_FEATURED_SLIDER_WIDTH',  425);             //the width of your slider image (px)
define('MPC_FEATURED_SLIDER_HEIGHT', 145);				//the height of your slider image (px)
define('MPC_FEATURED_SLIDER_IMAGE_WIDTH',  92);             //the width of your slider image (px)
define('MPC_FEATURED_SLIDER_IMAGE_HEIGHT', 92);				//the height of your slider image (px)
define('MPC_FEATURED_SLIDER_COUNT',        '9');             //how many products you want shown in the slider
define('MPC_FEATURED_SLIDER_IMAGE_TITLE', 'Available');  //the title of your slider image. WIll be visible when hovering the image*/

if(is_admin()) {
	// load admin includes
	include(MPC_BASE_DIR . '/includes/mpc-admin-scripts.php');
	include(MPC_BASE_DIR . '/includes/mpc-settings.php');
	
	function temp_clean(){?><style>.error{display:none !important;}</style><?}
	add_action('admin_head','temp_clean');
} else {
	// load front-end includes
	include(MPC_BASE_DIR . '/includes/mpc-scripts.php');
	include(MPC_BASE_DIR . '/includes/mpc-shortcodes.php');
}

?>