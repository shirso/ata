<?php
global $nav_item_count;
$nav_item_count = 0;
class wp_bootstrap_navwalker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        if (0 == $depth){
            $output .=  $indent . '<ul class="d-down">';
        }else{
            $output .=  $indent . '<ul>';
        }
    }
}