<?php
function mpc_scripts_and_styles() {
	global $mpc_options;
	wp_register_style('jsCarousel-css', plugins_url('/jsCarousel/jsCarousel-2.0.0.css', __FILE__), false, null);
	wp_enqueue_style('jsCarousel-css');
	
	wp_register_script('jsCarousel-js', plugins_url('/jsCarousel/jsCarousel-2.0.0.js', __FILE__), null, null, true);
	wp_enqueue_script('jsCarousel-js');
	wp_register_script( 'jsCarousel-jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js' );
	wp_enqueue_script( 'jsCarousel-jquery' );
	
}
add_action('wp_enqueue_scripts', 'mpc_scripts_and_styles');

function mpc_head_script(){
	global $mpc_options;
?>
<script type="text/javascript">
        $(document).ready(function() {

            $('#carouselv').jsCarousel({<?php /*onthumbnailclick: function(src) { alert(src); },*/ ?>autoscroll: true, masked: false, itemstodisplay: <?php echo $mpc_options['mpc_num_load']?>, orientation: 'h' });
            
        });       
        
    </script>
<?php
}
add_action('wp_head','mpc_head_script');

function mpc_head_style(){
	global $mpc_options;
	
	$mpc_c_width = $mpc_options['mpc_carousel_width'];
	$mpc_c_height = ($mpc_options['buy_button'] == 1) ? $mpc_options['mpc_carousel_height']+20 : $mpc_options['mpc_carousel_height'] ;
?>
<style>
/*NAV*/
.jscarousal-horizontal-back { background-color:transparent; background-image:url(<?php echo MPC_PLUGIN_IMAGES_URL ?>ThumbnailsPrevHover.png); background-repeat:no-repeat; opacity:1.0 !important; width:48px; height:28px; margin-top:30px; }
.jscarousal-horizontal-forward { background-color:transparent; background-image:url(<?php echo MPC_PLUGIN_IMAGES_URL ?>ThumbnailsNextHover.png); background-repeat:no-repeat; opacity:1.0 !important; width:48px; height:28px; margin-top:30px;}
.jscarousal-horizontal-back:hover, .jscarousal-horizontal-forward:hover { opacity:0.7 !important; }

/*IMGS*/
.jscarousal-horizontal { width:<?php echo $mpc_c_width ?>px; height:<?php echo $mpc_c_height ?>px; background-color:<?php echo (!$mpc_options['mpc_color'])? 'transparent' : $mpc_options['mpc_color'] ?>; border:0; padding:0; margin-top:-10px; }
.jscarousal-contents-horizontal { width:<?php echo ($mpc_options['mpc_carousel_width'] - 100) ?>px; height:<?php echo $mpc_c_height ?>px; }
.jscarousal-contents-horizontal > div > div { margin:0 5px; }
/*.jscarousal-horizontal .image-wrapper { background:#f1f1f1; } /*Image background*/
.jscarousal-contents-horizontal img { width:<?php echo $mpc_options['mpc_image_width'] ?>px; height:<?php echo $mpc_options['mpc_image_height'] ?>px; border:1px solid #990000; padding:1px; }
.jscarousal-horizontal .slider_product_meta { text-align:center; color:#FFF; }
.jscarousal-horizontal .mp_product span { text-align:center; font-size:11px; font-weight:300; margin-right:0; }
.jscarousal-contents-horizontal .product {border-top:none;}
.jscarousal-horizontal .mp_product_price {line-height:0;}

/*BUY BUTTON*/
.mp_button_addcart {width:95px !important;}
</style>
<?php
}
add_action('wp_head','mpc_head_style');

?>