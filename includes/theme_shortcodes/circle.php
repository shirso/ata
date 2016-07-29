<?php
add_shortcode('circle', 'circle');

function circle( $atts, $content = null ) {
   $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );
  
    
    $output='';
    $output .='<div class="flowchart">';
    $output .= '<ul>';
    $output .= '<li>';
    $output .= '<div>';
    $output .= '<span>';
    $output .= do_shortcode($content);
    $output .= '</span>';
    $output .= '</div>';
    $output .= '</li>';
    $output .= '</ul>';
    $output .= '</div>';

    return $output;  
}  
