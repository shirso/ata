<?php
add_action('wp_ajax_my_action', 'my_action_callback');
add_action( 'wp_ajax_nopriv_my_action', 'my_action_callback' );
add_action('wp_ajax_get_region_data', 'ata_get_region_data');
add_action( 'wp_ajax_nopriv_get_region_data', 'ata_get_region_data' );
function my_action_callback() {
        
        global $wpdb; // this is how you get access to the database

        $whatever =  $_POST['whatever'] ;

            echo do_shortcode('[gallery ids="'.$whatever.'"]');

        die(); // this is required to return a proper result
    }
    
add_action('wp_ajax_my_carousel_load', 'my_carousel_load_callback'); 
add_action( 'wp_ajax_nopriv_fetchdetails', 'my_carousel_load_callback' );
function my_carousel_load_callback() {
        
        global $wpdb; // this is how you get access to the database

        $data =  $_POST['dataloads'];
         
            $html = do_shortcode('[carousel ctype="'.$data['ctype'].'"  num="'.$data['num'].'" slidenum="'.$data['slidenum'].'" type="'.$data['type'].'" post_id="'.$data['post_id'].'"]');
           // print_r($data); 
           //print_r('[carousel ctype="'.$data['ctype'].'"  num="'.$data['num'].'" slidenum="'.$data['slidenum'].'" type="'.$data['type'].'" post_id="'.$data['post_id'].'"]');
           echo $html;
           
        die(); // this is required to return a proper result
    }
function ata_get_region_data(){
    $regionId=absint($_POST["regionId"]);
    $content_post = get_post($regionId);
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    echo $content;
    exit;
}
