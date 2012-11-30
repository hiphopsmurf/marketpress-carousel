<?php
function mpcAdmin_add_style() {
	wp_enqueue_style( 'marketpress-carousel-settings', plugins_url( '/css/mpc-style-admin.css', __FILE__ ) );
	wp_enqueue_style( 'farbtastic' );
}

function mpcAdmin_add_script(){
	wp_enqueue_script( 'marketpress-carousel-settings', plugins_url( '/colorpicker/color-options.js', __FILE__ ), array( 'farbtastic' ) );
	wp_enqueue_script( 'farbtastic' );
}
?>