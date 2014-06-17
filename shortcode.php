<?php

function section_port_shortcode( $atts ) {
extract( shortcode_atts( array( 'limit' => -1), $atts ) );

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

query_posts(  array ( 
    'post_type' => unslider,  
    'order' => 'ASC', 
    'orderby' =>'id', 
    'paged' => $paged ) );

$list = ' ';   

while ( have_posts() ) {
    the_post();
    $content = get_the_content();
    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    $list .= '<li style="background: url('.$feat_image.');">'
    . $content
    . '</li>';
}


return 
'<div class="unslider">'
. '<ul>'
. $list
. '</ul>'
. '</div>'.

wp_reset_query();

}

add_shortcode( 'tp-unslider', 'section_port_shortcode' );

?>