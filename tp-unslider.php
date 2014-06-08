<?php
/*
Plugin Name: Responsive Image Slider
Plugin URI: http://www.trickspanda.com
Description: Responsive Image Slider is the most simple & amazing responsive image slider ever.
Author: Hardeep Asrani
Version: 1.0
Author URI: http://www.hardeepasrani.com
*/

add_action('wp_enqueue_scripts', 'tp_unslider_assets');

function tp_unslider_assets()
{

wp_register_script('unslider', plugins_url('assets/unslider.js', __FILE__));
wp_register_script('jquery-unslider', plugins_url('assets/jquery-unslider.js', __FILE__));
wp_enqueue_style('unslider-css', plugins_url('assets/unslider.css', __FILE__));
wp_enqueue_script('jquery-unslider');
wp_enqueue_script('unslider');
};

function tp_unslider_jquery()
{
?>
<script type="text/javascript">
$(function() {
$('.unslider').unslider({
	speed: 500,               //  The speed to animate each slide (in milliseconds)
	delay: 3000,              //  The delay between slide animations (in milliseconds)
	complete: function() {},  //  A function that gets called after every slide animation
	keys: true,               //  Enable keyboard (left, right) arrow shortcuts
	dots: true,               //  Display dot navigation
	fluid: true              //  Support responsive design. May break non-responsive designs
});
});
</script>
<?php
}

add_action('wp_footer', 'tp_unslider_jquery');

include( plugin_dir_path( __FILE__ ) . 'shortcode.php');
include( plugin_dir_path( __FILE__ ) . 'post-type.php');
?>