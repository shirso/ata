<?php
add_action('wp_ajax_my_action', 'my_action_callback');
add_action( 'wp_ajax_nopriv_my_action', 'my_action_callback' );
add_action('wp_ajax_get_region_data', 'ata_get_region_data');
add_action( 'wp_ajax_nopriv_get_region_data', 'ata_get_region_data' );
add_action('wp_ajax_get_regional_contact_data', 'ata_get_regional_contact_data');
add_action( 'wp_ajax_nopriv_get_regional_contact_data', 'ata_get_regional_contact_data' );
add_action('wp_ajax_get_society_data', 'ata_get_society_data');
add_action( 'wp_ajax_nopriv_get_society_data', 'ata_get_society_data' );
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
function ata_get_regional_contact_data(){
   $termId=absint($_POST["termId"]);
    $args = array(
        'post_type' => 'forum',
        'tax_query' => array(
            array(
                'taxonomy' => 'forum_cat',
                'field' => 'id',
                'terms' => $termId
            )
        )
    );
    $query = new WP_Query( $args );
    $html='';
    if(isset($query->posts) && !empty($query->posts)){
        $c=0;
        foreach($query->posts as $term_post){
          $extraClass=$c==0 ? "mmato" : "";
          $html.='<div class="img-bxx '.$extraClass.' clearfix">';
          $html.=get_the_post_thumbnail($term_post->ID,'full',array('class'=>'img-responsive'));
          $html.='<div class="intxt-sc">';
          $html.=apply_filters('the_content', $term_post->post_content);
          $html.='</div>';
          $html.='</div>';
            $c++;
        }

    }
    wp_reset_query();
    echo $html;
    exit;
}
function ata_get_society_data(){
    $category=sanitize_text_field($_POST["category"]);
    $args = array(
        'post_type' => 'society',
        'tax_query' => array(
            array(
                'taxonomy' => 'society_cat',
                'field' => 'slug',
                'terms' => $category
            )
        )
    );
    $query = new WP_Query( $args );
    $html='';
    $html.='<div class="sull-mssec">';
    $html.='<div class="bxxpr-sec">';
    if(isset($query->posts) && !empty($query->posts)){
        foreach($query->posts as $term_post){
            $html.='<div class="bxxl-sec">';
            $html.=get_the_post_thumbnail($term_post->ID,'full',array('class'=>'img-responsive'));
            $html.='<div class="bxtx-sec">';
            $html.=apply_filters('the_content', $term_post->post_content);
            $html.='</div>';
            $html.='</div>';
        }
    }
    $html.='</div>';
    $html.='</div>';
    wp_reset_query();
    echo $html;
    exit;
}
