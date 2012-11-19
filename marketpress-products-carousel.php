<?php
/*
Plugin Name: MarketPress Products Carousel
Plugin URI: http://cdsincdesign.com
Description: Featured Products Slideshow to be used on the frontpage of MarketPress stores and single roducts multiple images slider.
Author: Steven Whitney
Version: 1.0
Author URI: http://cdsincdesign.com
*/

define('MPC_PLUGIN_IMAGES_URL', plugins_url( '/images/', __FILE__ ));

define('MPC_FEATURED_SLIDER_IMAGE_WIDTH',  92);             //the width of your slider image (px)
define('MPC_FEATURED_SLIDER_IMAGE_HEIGHT', 92);				//the height of your slider image (px)
define('MPC_FEATURED_SLIDER_COUNT',        '9');             //how many products you want shown in the slider

function mpc_featured_slider(){
	global $mp;
	//The Query
	$custom_query = new WP_Query( array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'meta_key'		 => 'ct_Featured_radio_a4b9',
		'meta_value'	 => 'Yes',
		'posts_per_page' => MPC_FEATURED_SLIDER_COUNT
	));
	$slides_count = $custom_query->post_count;

	?>
	<div id="carouselv">
		<?php 
			foreach ($custom_query->posts as $post) {
				mpc_slider_product(true, $post->ID);
			}
		?>
	</div>
	<?php
}

function mpc_slider_product($echo = true, $product_id, $title = true, $content = 'full', $image = 'single', $meta = true) {
	global $mp;
	$post = get_post($product_id);
	
	// Dont need! $content = '<li '.mp_product_class(false, 'mp_product', $post->ID).'itemscope itemtype="http://schema.org/Product">';
	$content = '<div '.mp_product_class(false, 'mp_product', $post->ID).'>';
	if ($image) {
			$content .= mpc_product_photo( false, $post->ID, true, MPC_FEATURED_SLIDER_IMAGE_WIDTH, MPC_FEATURED_SLIDER_IMAGE_HEIGHT, true, true, false, MPC_FEATURED_SLIDER_IMAGE_TITLE );
		}
		// Dont need! $content .= '<div class="flex-caption">';
		/*if ($title) {
			$content .= '<a href="' . get_permalink($post->ID) . '"><h2 itemprop="name" class="product_name">' . $post->post_title . '</h2></a>';
		}*/
		if ($content) {
			/*$content .= '<div class="description" itemprop="description">';
			if ($content == 'excerpt') {
				$content .= $mp->product_excerpt($post->post_excerpt, $post->post_content, $post->ID);
			} else {
				$content .= apply_filters('the_content', $post->post_content);
			}
			$content .= '</div>';*/
			if ($meta) {
				$content .= '<div class="slider_product_meta" itemprop="offers" itemscope itemtype="http://schema.org/Offer">';
					//price
					//$content .= mp_product_price(false, $post->ID);
					$content .= str_replace("Price: ","",mp_product_price(false, $post->ID));
					//button
					$content .= mp_buy_button(false, 'single', $post->ID);
				$content .= '</div>';
			}
		}
		// Dont need! $content .= '</div>';
		/*if ($image) {
			$content .= mpc_product_photo( false, $post->ID, true, MPC_FEATURED_SLIDER_IMAGE_WIDTH, MPC_FEATURED_SLIDER_IMAGE_HEIGHT, true, true, false, MPC_FEATURED_SLIDER_IMAGE_TITLE );
		}*/
	// Dont need! $content .= '</li>';
	$content .= '</div>';
	
	if ($echo)
		echo $content;
	else
		return $content;
}

function mpc_product_photo( $echo = true, $post_id = NULL, $link = true, $width = NULL, $height = NULL, $crop = true, $resize = true, $stretch = false, $title = '' ) {
	global $id;
	$post_id = ( NULL === $post_id ) ? $id : $post_id;
	$post_id = apply_filters('mp_product_image_id', $post_id);
	$post = get_post($post_id);
	$post_thumbnail_id = get_post_thumbnail_id( $post_id );
	
	if ($stretch == true){
		$thumbnail_attr = wp_get_attachment_image_src( $post_thumbnail_id );
		$thumb_url      = $thumbnail_attr[0];
		$thumb_width    = $thumbnail_attr[1];
		$thumb_height   = $thumbnail_attr[2];
		
		if ($thumb_width < $width && $thumb_height < $height) {
			$thumbsize = 'small';
		}
		elseif ($thumb_width < $width && $thumb_height > $height) {
			$thumbsize = 'narrow';
		}
		elseif ($thumb_width > $width && $thumb_height < $height) {
			$thumbsize = 'short';
		}
		elseif ($thumb_width > $width && $thumb_height > $height) {
			$thumbsize = 'ok';
		}
		
		if ($thumbsize == 'small'){
			$thumbstyle = 'width: ' . $width . 'px; height: ' . $height . 'px;';
		}
		elseif ($thumbsize == 'narrow'){
			$thumbstyle = 'width: ' . $width . 'px; height: auto;';
		}
		elseif ($thumbsize == 'short'){
			$thumbstyle = 'width: auto; height: ' . $height . 'px;';
		}
		elseif ($thumbsize == 'ok'){
			$thumbstyle = '';
		}
	} else {
		$thumbstyle = '';
	}

	$size = '"width=' . $width . '&height=' . $height . '&crop=' . $crop . '"'; 
	
	$title_i18n = __($title, 'basic');

	$productlink = get_permalink($post_id);
	$image = get_the_post_thumbnail($post_id, array( 'width' => $width, 'height' => $height, 'crop' => $crop, 'resize' => $resize ), array('style' => $thumbstyle, 'itemprop' => 'image', 'class' => 'product_image', 'title' => $title_i18n));

	$content = '<div class="image-wrapper">';
	if ($link == true){
		if ($productlink){
			$content .= '<a id="product_image-' . $post_id . '"' . $class . ' href="' . $productlink . '">';
		}
	}
	$content .= $image;
	if ($link == true){
		if ($productlink){
			$content .= '</a>';
		}
	}
	$content .= '</div>';

	if ($echo)
		echo $content;
	else
		return $content;
}

function mps_head_script(){
?>
<script type="text/javascript">
        $(document).ready(function() {

            $('#carouselv').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: true, masked: false, itemstodisplay: 5, orientation: 'h' });
            
        });       
        
    </script>
<?php
}
add_action('wp_head','mps_head_script');
function mpc_scripts_and_styles() {
	wp_register_style('jsCarousel-css', plugins_url('includes/jsCarousel/jsCarousel-2.0.0.css', __FILE__), false, null);
	wp_enqueue_style('jsCarousel-css');
	wp_register_style('pinky-css', plugins_url('flexslider-sbm.css', __FILE__), false, null);
	//wp_enqueue_style('pinky-css');
	
	wp_register_script('jsCarousel-js', plugins_url('includes/jsCarousel/jsCarousel-2.0.0.js', __FILE__), null, null, true);
	wp_enqueue_script('jsCarousel-js');
	
}
add_action('wp_enqueue_scripts', 'mpc_scripts_and_styles');


/*function show_the_slider(){
	$the_code = mpc_featured_slider();
}*/

function shortcode_wp_marketpress( $content = NULL ) {
	
	ob_start();
	
	//show_the_slider();
	
	mpc_featured_slider();
	
	$output_string=ob_get_contents();
	
	ob_end_clean();
	
	return $output_string;

}
add_shortcode( 'marketpress-slider', 'shortcode_wp_marketpress' );

?>