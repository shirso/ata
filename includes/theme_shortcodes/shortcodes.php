<?php
// Grid Columns

///RSS///
add_shortcode('banner', 'shortcode_banner');
function shortcode_banner($atts, $content = null,$shortcodename =""){
    $output = '';
    $output.='<section class="banner-m-sec">';
    query_posts("post_type=banner&showposts=-1&post_status=publish");
    $output.='<ul class="bxslider">';
    while(have_posts()):the_post();
        $output.='<li>';
        $output.=get_the_post_thumbnail(get_the_ID(),'full',array('class'=>'img-responsive'));
        $output.='</li>';
    endwhile;
    $output.= '</ul>';
    $output.='</section>';
    wp_reset_query();
    return $output;
}
add_shortcode('region_map', 'shortcode_region_map');
function shortcode_region_map($atts, $content = null,$shortcodename =""){
    extract(shortcode_atts(array(
        "heading" => ''), $atts));
    $all_posts=get_posts(
        array(
            'posts_per_page'   => -1,
            'post_type'        => 'regions',
            'post_status'      => 'publish',
        )
    );
    $all_positions=array();
    if(!empty($all_posts)){
        foreach($all_posts as $region){
                $region_position=get_post_meta($region->ID,"_ata_positions",true);
                array_push($all_positions,array("id"=>$region->ID,"top"=>$region_position["y"],"left"=>$region_position["x"]));
            }
    }

    $output='';
    $output.='<script>var region_map=true,ata_all_positions='.json_encode($all_positions).';</script>';
    $output.='<div id="ata_images_div" style="display: none;">';
    $output.='<img src="'.get_option("ata_region_map").'" id="ata_regionMapImage">';
    $output.='<img src="'.get_bloginfo('template_url').'/assets/img/dot.png" id="ata_dotImage">';
    $output.='</div>';
    $output.='<section class="raginalbgsec">';
    $output.='<div class="container">';
    $output.='<h1>'.$heading.'</h1>';
    $output.='<div class="row">';
    $output.='<div class="col-sm-6">';
    $output.='<div class="mn-maap" id="ata_region_map">';
    $output.='<canvas></canvas>';
    $output.='</div>';
    $output.='</div>';
    $output.='<div class="col-sm-6">';
    $output.='<div class="mpdetal-msec" id="ata_region_content">';
    $output.='</div>';
    $output.='</div>';
    $output.='</div>';
    $output.='</div>';
    $output.='</section>';
    return $output;
}
add_shortcode('contact_regional', 'shortcode_contact_regional');
function shortcode_contact_regional($atts, $content = null,$shortcodename =""){
    extract(shortcode_atts(array(
        "heading" => ''), $atts));
    $output='';
    $output.='<section class="bdy-gra-msec text-center">';
    $output.='<div class="container">';
    $output.='<h1>'.$heading.'</h1>';
    $output.='</div>';
    $output.='</section>';
    return $output;
}
add_shortcode('region_text_block', 'shortcode_region_text_block');
function shortcode_region_text_block($atts, $content = null,$shortcodename =""){
    $output = '';
    $output .= '<div class="jas-sec">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode('region_list_block', 'shortcode_region_list_block');
function shortcode_region_list_block($atts, $content = null,$shortcodename =""){
    $output = '';
    $output .= '<div class="inul-sec">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode('grid', 'shortcode_grid_block');
function shortcode_grid_block($atts, $content = null,$shortcodename =""){
    $output = '';
    $output .= '<section class="grrd-m-sec">';
    $output .= do_shortcode($content);
    $output .= '</section>';
    return $output;
}
add_shortcode('container', 'shortcode_container_block');
function shortcode_container_block($atts, $content = null,$shortcodename =""){
    $output = '';
    $output .= '<div class="container">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode('row', 'shortcode_row_block');
function shortcode_row_block($atts, $content = null,$shortcodename =""){
    $output = '';
    $output .= '<div class="row">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode('grid_text_block', 'shortcode_grid_text_block');
function shortcode_grid_text_block($atts, $content = null,$shortcodename =""){
    $output = '';
    $output .= '<div class="held-ssec">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode('contact_img_block', 'shortcode_contact_img_block');
function shortcode_contact_img_block($atts, $content = null,$shortcodename =""){
    $content = preg_replace(
        '/<p>(([\s]*)|[\s]*(<img[^>]*>|\[[^\]]*\])[\s]*)<\/p>/',
        '$3',
        $content
    );
    $output = '';
    $output .= '<div class="img-bxx">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode('contact_text_block', 'shortcode_contact_text_block');
function shortcode_contact_text_block($atts, $content = null,$shortcodename =""){
    $output = '';
    $output .= '<div class="intxt-sc">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode('single_contact_block', 'shortcode_single_contact_block');
function shortcode_single_contact_block($atts, $content = null,$shortcodename =""){
    $output = '';
    $output .= '<section class="bdy2-m-sec clearfix"><div class="container"><div class="col-sm-12 shr-m-sec"><div class="row">';
    $output .= do_shortcode($content);
    $output .= '</div></div></div></section>';
    return $output;
}
add_shortcode('customer-area', 'shortcode_customer_area');
function shortcode_customer_area($atts, $content = null,$shortcodename =""){ 
    
      
    
    
    $output = '';
   
     $output .= '<div class="peoplelove-area">';
     $output .= '<div class="container">';
     $output .= '<div class="row">';
      
    $output .= do_shortcode($content);
    $output .= '</div>';  
    $output .= '</div>';  
    $output .= '</div>';  
   
     
    return $output;
 
}

add_shortcode('customer-images', 'shortcode_customer_images');
function shortcode_customer_images($atts, $content = null,$shortcodename =""){ 
    
      
    
    
    $output = '';
   
     $output .= '<div class="our-customer">';
        $output .= do_shortcode($content);
    $output .= '</div>';  

   
     
    return $output;
 
}

add_shortcode('our-team-description', 'shortcode_our_team_description');
function shortcode_our_team_description($atts, $content = null,$shortcodename =""){ 
    
      
    
    
    $output = '';
   
     $output .= '<div class="team-con">';
      
    $output .= do_shortcode($content);
    $output .= '</div>';  
   
     
    return $output;
 
}

add_shortcode('our-team-area', 'shortcode_our_team_area');
function shortcode_our_team_area($atts, $content = null,$shortcodename =""){ 
    
      
    
    
    $output = '';
   
     $output .= '<div class="team">';
      
    $output .= do_shortcode($content);
    $output .= '</div>';  
   
     
    return $output;
 
}

add_shortcode('small', 'shortcode_small');
function shortcode_small($atts, $content = null,$shortcodename =""){ 
    
     
    
    
    $output = '';
   

    $output .= '<small>';
      
    $output .= do_shortcode($content);
    $output .= '</small>';  
     
    return $output;
 
}

add_shortcode('black-box', 'shortcode_icon_container');
function shortcode_icon_container($atts, $content = null,$shortcodename =""){ 
    $output = '';
    $output .= '<section class="work-area">';
    $output .= '<div class="container clearfix">';    
    $output .= do_shortcode($content);
    $output .= '</div>';  
     $output .= '</section>';
    return $output;
 
}
add_shortcode('full-width', 'shortcode_full_width');
function shortcode_full_width($atts, $content = null,$shortcodename =""){ 
    $output = '';
    $output .= '<section class="welcome-area">';
    $output .= '<div class="container clearfix">';    
    $output .= '<div class="row">';    
    $output .= do_shortcode($content);
    $output .= '</div>';  
    $output .= '</div>';  
     $output .= '</section>';
    return $output;
 
}
add_shortcode('icon-box', 'shortcode_icon_box');
function shortcode_icon_box($atts, $content = null,$shortcodename =""){ 
    $output = '';
    $output .= '<div class="col-sm-4">';
    $output .= '<div class="work-area-in">';       
    $output .= do_shortcode($content);
    $output .= '</div>';  
    $output .= '</div>';  
    return $output;
 
}
add_shortcode('list-box', 'shortcode_list_box');
function shortcode_list_box($atts, $content = null,$shortcodename =""){ 
     $output = '';
    $output .= '<section class="whatwedo-area">';
    $output .= '<div class="container clearfix">'; 
       $output .= do_shortcode($content);
       $output .= '</div>';
     $output .= '</section>';
    return $output;
 
}
add_shortcode('main_sec', 'shortcode_main_sec');
function shortcode_main_sec($atts, $content = null,$shortcodename =""){ 
     $output = '';
    $output .= '<section class="inner-area">';
    $output .= '<div class="container clearfix">'; 
    $output .= '<div class="main-sec">'; 
       $output .= do_shortcode($content);
       $output .= '</div>';
       $output .= '</div>';
     $output .= '</section>';
    return $output;
 
}

add_shortcode('what_we_can', 'shortcode_what_we_can');
function shortcode_what_we_can($atts, $content = null,$shortcodename =""){ 
    
     
    
    
    $output = '';
   

    $output .= '<section class="whatwedo-area">';
    $output .= '<div class="container clearfix">';    
    $output .= do_shortcode($content);
    $output .= '</div>';  
     $output .= '</section>';
    return $output;
 
}

add_shortcode('offwhite-box', 'shortcode_offwhite_box');
function shortcode_offwhite_box($atts, $content = null,$shortcodename =""){ 
    
     
    
    
    $output = '';
   

    $output .= '<section class="customer-area">';
    $output .= '<div class="container">';    
    $output .= '<div class="row">';    
    $output .= do_shortcode($content);
    $output .= '</div>';  
    $output .= '</div>';  
     $output .= '</section>';
    return $output;
 
}

add_shortcode('awards-section', 'shortcode_awards_section');
function shortcode_awards_section($atts, $content = null,$shortcodename =""){ 
    
     
    
    
    $output = '';
   

    $output .= '<section class="peoplelove-area">';
    $output .= '<div class="container">';    
    $output .= '<div class="row">';    
    $output .= do_shortcode($content);
    $output .= '</div>';  
    $output .= '</div>';  
     $output .= '</section>';
    return $output;
 
}

add_shortcode('gray-box-one', 'shortcode_gray_box_one');
function shortcode_gray_box_one($atts, $content = null,$shortcodename =""){ 
    
     
    
    
    $output = '';
   

    $output .= '<section class="foryou-area">';
    $output .= '<div class="container">';    
    $output .= '<div class="row">';    
    $output .= do_shortcode($content);
    $output .= '</div>';  
    $output .= '</div>';  
     $output .= '</section>';
    return $output;
 
}

add_shortcode('uni_home_icon', 'shortcode_uni__home_icon');
function shortcode_uni__home_icon($atts, $content = null,$shortcodename =""){ 
    
     extract(shortcode_atts(array(
                "uni_icon_type" => 'Icon',                                             
                'uni_icon_class' => 'fa fa-rocket',
                'uni_icon_font_size' =>  '100px',
                'uni_align' =>  'center',
                'uni_my_title' =>  '',
                'uni_my_textarea' =>  '',
                
        ), $atts));
    
    $output = '';
   

    $output .= '<div class="work-area-in">';
    $output .= '<h4>'.$uni_my_title.'</h4>';
    $output .= '<div class="same-height">';
    $output .='<i class="'.$uni_icon_class.'" style="font-size:'.$uni_icon_font_size.';text-align:'.$uni_align.'"></i>';
    $output .= '</div>';
    $output .= '<p>'.$uni_my_textarea.'</p>';
     $output .= '</div>';
    return $output;
 
}



///RSS///
   
add_shortcode('green_button', 'shortcode_green_buton');
function shortcode_green_buton($atts, $content = null,$shortcodename =""){ 
    
    $output = '';
    $class = "green-button";

    $output .= '<span class="'.$class.'">';
    $output .= do_shortcode($content);
    $output .= '</span>';
    return $output;
 
}

add_shortcode('blue_strong', 'shortcode_blue_strong');
function shortcode_blue_strong($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<span>';
    $output .= do_shortcode($content);
    $output .= '</span>';
    
    return $output;
 
}
  /// shortcode green start///
  
  add_shortcode('red_bullet_style', 'shortcode_green_red_bullet_style');
function shortcode_green_red_bullet_style($atts, $content = null,$shortcodename =""){ 
    
    $output = '';
    $output .='<div class="disclaimer-ul">';
     $output .= do_shortcode($content);
     $output .= '</div>';
    return $output;
 
}  

  
  add_shortcode('ordered', 'shortcode_green_ordered');
function shortcode_green_ordered($atts, $content = null,$shortcodename =""){ 
    
    $output = '';
    $output .='<div class="li-numbers">';
     $output .= do_shortcode($content);
     $output .= '</div>';
    return $output;
 
}  

 add_shortcode('vertical_style', 'shortcode_green_vertical_style');
function shortcode_green_vertical_style($atts, $content = null,$shortcodename =""){ 
    
    $output = '';
    $output .='<div class="ul-default">';
     $output .= do_shortcode($content);
     $output .= '</div>';
    return $output;
 
}  
  
  
  add_shortcode('rectangular-area', 'shortcode_green_rectangular_area');
function shortcode_green_rectangular_area($atts, $content = null,$shortcodename =""){ 
    
    $output = '';
    $output .='<div class="inoculation">';
     $output .= do_shortcode($content);
     $output .= '</div>';
    return $output;
 
} 
  
  
   add_shortcode('process', 'shortcode_green_process');
function shortcode_green_process($atts, $content = null,$shortcodename =""){ 
    
     extract(shortcode_atts(array(
                "icon_type" => 'Circle',                                             
                'icon_class' => 'glyphicon glyphicon-play-circle',
                'icon_font_size' =>  '40px',
                'icon_font_color' =>  'red',
                'align' =>  'center',
                'my_title' =>  '',
                'my_textarea' =>  '',
                'button_link' =>  '#',
                
                
        ), $atts)); 
     
    
    $output = '';
    $output .='<div class="prosess-in">';
    
    $output .='<div class="prosess-icon">';
     $output .= '<span class="'.$icon_class.'" style="font-size:'.$icon_font_size.'; color:'.$icon_font_color.'; text-align:'.$align.'"></span>';
      $output .= '</div>';
      
      $output .= '<div class="prosess-text">';
      $output .= '<h4>'.$my_title.'</h4>';
        $output.= '<p>'.$my_textarea.'</p> ';
      $output .= '</div>';
      
      $output .= '<div class="more">';
         $output .= '<a href="'.$button_link.'">More</a>';
       $output .= '</div>';
      
    $output .= '</div>';
   
    return $output;
 
} 
  
 add_shortcode('divider', 'shortcode_green_divider');
function shortcode_green_divider($atts, $content = null,$shortcodename =""){ 
    
    $output = '';
    $output .='<div class="devider"></div>';
    return $output;
 
} 


 add_shortcode('round-area', 'shortcode_green_round_area');
function shortcode_green_round_area($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<div class="round-area clearfix">';
    
    $output .= do_shortcode($content);
    $output .= '</div>';
   $output .='<div class="devider"></div>';
    
    return $output;
 
} 
 
add_shortcode('col-4', 'shortcode_green_col_4');
function shortcode_green_col_4($atts, $content = null,$shortcodename =""){ 
    
    $output = '';
    $output .= '<div class="col-xs-4">';
    
    $output .= do_shortcode($content);
    $output .= '</div>'; 
    
    return $output;
 
}  

add_shortcode('list_un', 'shortcode_green_list_un');
function shortcode_green_list_un($atts, $content = null,$shortcodename =""){ 
    
    $output = '';
    $output .= '<div class="promises">';
    
    $output .= do_shortcode($content);
    $output .= '</div>'; 
    
    return $output;
 
}  
  
  
add_shortcode('icon', 'shortcode_green_icon');
function shortcode_green_icon($atts, $content = null,$shortcodename =""){ 
    
    
     extract(shortcode_atts(array(
                "icon_type" => 'Circle',                                             
                'icon_class' => 'glyphicon glyphicon-play-circle',
                'icon_font_size' =>  '40px',
                'icon_font_color' =>  'red',
                'align' =>  'center',
                
        ), $atts)); 
     $my_class = $icon_type=='Circle' ?  'circle': 'prosess-icon'; 
   
    //$output = '<div class="'.$my_class.'">';
    $output='<div class="'.$my_class.'">';
    $output .= '<span class="'.$icon_class.'" style="font-size:'.$icon_font_size.'; color:'.$icon_font_color.'; text-align:'.$align.'"></span>';
     $output .= '</div>';
    return $output;
  
 
}    
  
  
 /// shortcode green end ///
add_shortcode('learn_more', 'shortcode_learn_more');
function shortcode_learn_more($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<span class="more pull-right">';
    $output .= do_shortcode($content);
    $output .= '</span>';
    
    return $output;
 
}

add_shortcode('collumns', 'shortcode_collumns');
function shortcode_collumns($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<div class="col-sm-6 mld">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
 
}

add_shortcode('country', 'shortcode_countery');
function shortcode_countery($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<div class="country">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
 
}
add_shortcode('purple', 'shortcode_purple');
function shortcode_purple($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<span class="purpel">';
        $output .= do_shortcode($content);
        $output .= '</span>';
    
    return $output;
 
}
add_shortcode('grey', 'shortcode_grey');
function shortcode_grey($atts, $content = null,$shortcodename =""){ 
    
        $output .= '<span>';
        $output .= do_shortcode($content);
        $output .= '</span>';
    
    return $output;
 
}
add_shortcode('tabwrap', 'shortcode_tabwrap');
function shortcode_tabwrap($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<div class="tabbable">';
        $output .= '<div>';
            $output .= do_shortcode($content);
        $output .= '</div>';
    $output .= '</div>';
    
    return $output;
 
}
add_shortcode('post', 'shortcode_post');
function shortcode_post($atts, $content = null,$shortcodename =""){ 
    
    extract(shortcode_atts(array(
                "type" => 'post',                                             
                'num' => '5'
        ), $atts)); 
        
    query_posts("post_type=".$type."&showposts=".$num."&post_status=publish");
    
    $output = "<ul>";
    
    while(have_posts()):the_post();
    
       $output.="<li><a href='".get_permalink()."'>".get_the_title()."</a></li>"; 
    
    endwhile;
    
    $output .= '</ul>';
    
    wp_reset_query();
    
    return $output;
 
}



add_shortcode('state_table','shubh_state_table' );
function shubh_state_table($atts, $content = null,$shortcodename =""){ 
    
    extract(shortcode_atts(array(
                "type" => 'state-information'
        ), $atts)); 
    global $wp_query;    
    query_posts("post_type=".$type."&showposts=-1&post_status=publish&orderby=title&order=ASC");
    $count = $wp_query->post_count;
    $output = "<div class='country'>
    <table width='100%' class='table table-responsive'>
        <tbody><tr>";
    $i = 0;
    while(have_posts()):the_post();
        
        $title = get_the_title();
        $title = str_replace("Eminent Domain","",$title);
        
        if( $i % 4 == 0 && $i != $count ){ $output .= "</tr><tr>"; }
        $output .="<td><a href='".get_permalink()."'>".$title."</a></td>"; 
       //$output.="<li><a href='".get_permalink()."'>".get_the_title()."</a></li>"; 
        $i++;
        
    endwhile;
    
    $output .= '</tr>
        </tbody>
    </table>
    </div>';
    
    wp_reset_query();
    
    return $output;
 
}

add_shortcode('state_toggle','shubh_state_toggle' );
function shubh_state_toggle($atts, $content = null,$shortcodename =""){

    $output = "";
    $output .= '<div><a href="#" id="button" class="clikcon">Click to Contact</a>';
    $output .= '<div class="toggler" style="display: none;">
                                        <div id="effect" class="ui-widget-content ui-corner-all">';
    $output .= $content;
    $output .='</div>
        </div></div>';
    return $output;
    
    
}

add_shortcode('toggle_wrap','shubh_state_toggle_wrap' );
function shubh_state_toggle_wrap($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= "<div class='col-sm-4 offices'>";
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
    
    
}
add_shortcode('welcome','shubh_welcome_text' );
function shubh_welcome_text($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="welcome">
                    <div class="container">
                            <div class="row">';
    $output .= do_shortcode($content);
    $output .= '</div>
            </div>
        </div>';
    
    return $output;
}
add_shortcode('offer','shubh_offer_wrapper' );
function shubh_offer_wrapper($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="offer">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}
add_shortcode('offer_box','shubh_offer_box' );
function shubh_offer_box($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="offer-boxs">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}
add_shortcode('boxes','shubh_boxes' );
function shubh_boxes($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="span4">
                    <div class="offer-box-in">';
    $output .= do_shortcode($content);
    $output .= '</div>
        </div>';
    
    return $output;
}
add_shortcode('devider','shubh_devider' );
function shubh_devider($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="devider"> </div>';
    
    return $output;
}
add_shortcode('img-wrapper','shubh_img_wrapper' );
function shubh_img_wrapper($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<span class="img-wrapper alignleft">';
    $output .= do_shortcode($content);
    $output .= '</span>';
    
    return $output;
}
add_shortcode('span4','shubh_span4' );
function shubh_span4($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="span4">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}
add_shortcode('testimonial', 'shubh_testimonial');
function shubh_testimonial($atts, $content = null,$shortcodename =""){ 
    
    extract(shortcode_atts(array(
                "type" => 'testimonial',                                             
                'num' => '3'
        ), $atts)); 
        
    query_posts("post_type=".$type."&showposts=".$num."&post_status=publish");
    
    $output = '<div>';
    
    while(have_posts()):the_post();
             $featured= get_post_meta(get_the_ID(),'_shubh_featured',true);
             $author= get_post_meta(get_the_ID(),'_shubh_author',true);
             $city= get_post_meta(get_the_ID(),'_shubh_city',true);
      $output .= '<div class="span4">
                                    <p>'.get_the_content().'</p>
                                    <p class="customer-name"><span>'.$author.'</span> - '.$city.'</p>
                                </div>';
            
    endwhile;
    
     $output .= '<div class="clearfix">
                 </div>
             </div>';
    
    wp_reset_query();
    
    return $output;
 }
  add_shortcode('teams', 'shortcode_team');
 function shortcode_team($atts, $content = null,$shortcodename =""){ 
     
     extract(shortcode_atts(array(
                "heading" => '',
                "no"=>3
        ), $atts)); 
    global $wp_query;    
   query_posts("post_type=team&showposts=".$no."&post_status=publish&orderby=title&order=ASC"); 

 $output='';
    // $output.='<section class="team">';
    $output.='<h3>';
    $output.=$heading;
    $output.='</h3>'; 
    $output.='<div class="devider"></div><div class="row ">'; 
   while(have_posts()):the_post();
   $content = get_the_content();
    $content = apply_filters('the_content', $content);

    $output.='<div class="col-sm-4">'; 
    $output.='<div class="team">'; 
   // get_the_post_thumbnail()
    $output.=get_the_post_thumbnail(get_the_ID(),'team-image',array('class'=>'img-responsive'));
     $output.='<div class="team-con">';
     $output.='<h2>'.get_the_title().'</h2>';
     $output.= '<h3>'.get_post_meta(get_the_ID(),'_university_desg',true).'</h3>';
    $output.=$content;
     $output.='</div>';
    $output.='</div>';
    $output.='</div>';
   
      endwhile;
       $output.='</div>'; 
   // $output.='</section>';
    
    
    wp_reset_query();
    return $output;
 }
   add_shortcode('serving-area', 'shortcode_serving_area');
 function shortcode_serving_area($atts, $content = null,$shortcodename =""){ 
     
     extract(shortcode_atts(array(
                "cities_headings" => '',
                "cities_number"=>'',
                "cities_isLink"=>false,
                "cities_more_link_text"=>'',
                "cities_less_link_text"=>'',
                "cities_less_link_text"=>'',
                "cities_page_link"=>'',
        ), $atts)); 
    global $wp_query;   
    if($cities_isLink==true){ 
     if($cities_number==''){   
   query_posts("post_type=cities&showposts=-1&post_status=publish&orderby=title&order=ASC"); 
   }else{
     query_posts("post_type=cities&showposts=".$cities_number."&post_status=publish&orderby=title&order=ASC");   
   }
   }else{
     query_posts("post_type=cities&showposts=-1&post_status=publish&orderby=title&order=ASC");   
   }

 $output='';
   $output.='<section class="serving-area">
    <div class="container">
        <div class="row clearfix">
        <h2>'.$cities_headings.'</h2>
    <ul>';
    $counter=0;
     while(have_posts()):the_post();
    
      $class='';
     if($cities_isLink==false){
         if($counter>=$cities_number) {
            $class='li-sl'; 
         }else{
            $class=''; 
         }
     }
    $output.='<li class="'.$class.'">'; 
    $output.=get_the_post_thumbnail(get_the_ID(),'cities-image-home',array('class'=>'img-responsive alignleft')).'<a href="'.get_post_meta(get_the_ID(),'_university_subdomain_link',true).'">'.get_the_title().'</a></li>';
    $output.='</li>';
     $counter+=1;
      endwhile;
      wp_reset_query();
       $output.='</ul>'; 
        $output.='<div class="other-citis">
                <a href="'.$cities_page_link.'">'.$cities_more_link_text.'</a>
            </div>';
       $output.='</div>'; 
       $output.='</div>'; 
   $output.='</section>';
 
 wp_reset_query();
wp_localize_script( 'custom', 'cities_isLink',$cities_isLink==false?'No':'Yes');    
wp_localize_script( 'custom', 'other_cities_showless', $cities_less_link_text );
wp_localize_script( 'custom', 'other_cities_showmore', $cities_more_link_text );
      
    return $output;
 }
 
 ////university area open ////
  add_shortcode('university-area', 'shortcode_university_area');
 function shortcode_university_area($atts, $content = null,$shortcodename =""){ 
     
     extract(shortcode_atts(array(
                "university_headings" => '',
                "university_number"=>'',
                "university_isLink"=>false,
                "university_more_link_text"=>'',
                "university_less_link_text"=>'',
                "university_less_link_text"=>'',
                "university_page_link"=>'',
        ), $atts)); 
   // global $wp_query;   
    if($cities_isLink==true){ 
     if($cities_number==''){   
  $query=query_posts("post_type=uni_info&showposts=-1&post_status=publish&orderby=title&order=ASC"); 
   }else{
    $query=query_posts("post_type=uni_info&showposts=".$university_number."&post_status=publish&orderby=title&order=ASC");   
   }
   }else{
   $query= query_posts("post_type=uni_info&showposts=-1&post_status=publish&orderby=title&order=ASC");   
   }
 $output='';
   $output.='<section class="customer-area">
    <div class="container">
        <div class="row clearfix">
        <h2>'.$university_headings.'</h2>
    <ul>';
    $counter=0;
     while(have_posts()):the_post();
    
      $class='';
     if($cities_isLink==false){
         if($counter>=$university_number) {
            $class='cus-li'; 
         }else{
            $class=''; 
         }
     }
    $output.='<li class="'.$class.'">'; 
    $output.=get_the_post_thumbnail(get_the_ID(),'cities-image-home',array('class'=>'img-responsive alignleft')).'<a href="'.get_post_meta(get_the_ID(),'_university_uni_subdomain_link',true).'">'.get_post_meta(get_the_ID(),'_university_city_name',true).'</a><span>'.get_the_title().'</span></li>';
    $output.='</li>';
     $counter+=1;
      endwhile;
      wp_reset_query();
       $output.='</ul>'; 
        $output.='<div class="showmore">
                <a href="'.$university_page_link.'">'.$university_more_link_text.'</a>
            </div>';
       $output.='</div>'; 
       $output.='</div>'; 
   $output.='</section>';
 
 wp_reset_query();
wp_localize_script( 'custom', 'university_isLink',$university_isLink==false?'No':'Yes');    
wp_localize_script( 'custom', 'university_showless', $university_less_link_text );
wp_localize_script( 'custom', 'university_showmore', $university_more_link_text );
      
    return $output;
 }
 
 ////university area close ////
 
add_shortcode('gap','shubh_gap' );
function shubh_gap($atts, $content = null,$shortcodename =""){
    
    extract(shortcode_atts(array(
                "margin" => '35'
        ), $atts));
    $class = ($margin == "default") ? "class='marginbottomlarger clearfix'" : 'style="margin-bottom: '.$margin.'px;"';
    
    $output ="";
    $output .= "<div ".$class.">";
    $output .= '</div>';
    return $output;
   
} 
add_shortcode('controlpanel','shubh_controlpanel' );
function shubh_controlpanel($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="controlpanel-in">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}
add_shortcode('more', 'shubh_more');
function shubh_more($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<span class="more pull-right">';
    $output .= do_shortcode($content);
    $output .= '</span>';
    
    return $output;
 
}
add_shortcode('price', 'shubh_price');
function shubh_price($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<div class="tab-in4">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
 
}
add_shortcode('servers', 'shubh_servers');
function shubh_servers($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<div class="span4">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
 
}
add_shortcode('wrapper','shubh_wrapper' );
function shubh_wrapper($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="dedicated">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}
add_shortcode('dedication','shubh_dedication' );
function shubh_dedication($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="paddingbottom">';
    $output .= do_shortcode($content);
    $output .= '<div class="clearfix">
                 </div></div>';
    
    return $output;
}
add_shortcode('summary','shubh_summary' );
function shubh_summary($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<summary class="vpsplanbox">';
    $output .= do_shortcode($content);
    $output .= '</summary>';
    
    return $output;
}
add_shortcode('desc','shubh_desc' );
function shubh_desc($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<aside class="plandiscription">';
    $output .= do_shortcode($content);
    $output .= '</aside>';
    
    return $output;
}
add_shortcode('subplan1','shubh_subplan1' );
function shubh_subplan1($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<aside class="subplan1">';
    $output .= do_shortcode($content);
    $output .= '</aside>';
    
    return $output;
}
add_shortcode('planrate','shubh_planrate' );
function shubh_planrate($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="planrate">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}
add_shortcode('sign','shubh_sign' );
function shubh_sign($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="or-now">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}
add_shortcode('installers','shubh_installers' );
function shubh_installers($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="installers">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}
add_shortcode('vps','shubh_vps' );
function shubh_vps($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="btn1 bluebtn">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}

add_shortcode('col-sm-1','shubh_grid' );
add_shortcode('col-sm-2','shubh_grid' );
add_shortcode('col-sm-3','shubh_grid' );
add_shortcode('col-sm-4','shubh_grid' );
add_shortcode('col-sm-6','shubh_grid' );
add_shortcode('col-sm-8','shubh_grid' );
add_shortcode('col-sm-10','shubh_grid' );
add_shortcode('col-sm-12','shubh_grid' );
function shubh_grid($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="'.$shortcodename.'">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}

add_shortcode('improvement','shubh_improvement' );
function shubh_improvement($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<section class="wrapper">
                <div class="improvement">';
    $output .= do_shortcode($content);
    $output .= '</div></section>';
    
    return $output;
}
add_shortcode('servicess','shubh_servicess' );
function shubh_servicess($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<section class="wrapper">
                <div class="servicess">';
    $output .= do_shortcode($content);
    $output .= '</div></section>';
    
    return $output;
}
add_shortcode('clearfix', 'shortcode_clearfix');
function shortcode_clearfix($atts, $content = null,$shortcodename =""){ 
    
    $output = '';

    $output .= '<div class="clearfix"></div>';
        
    return $output;
 
}

function shortcode_testi($atts, $content = null,$shortcodename =""){ 
    
    extract(shortcode_atts(array(
                    "type" => 'testi',                                             
                    'num' => '6'
            ), $atts));
    
    query_posts('post_type='.$type.'&orderby=post_date&order=desc&numberposts='.$num);
    $output = ' <section class="wrapper">
                      <div class="latest-news">
                      <div id="latest-news-slider" class="flexslider">
                            <h2>LATEST NEWS</h2>
                            <div class="carousels">
                                <div class="well">
                                    <div id="cl" class="carousel slide clients-crousel">
                                        <!-- Carousel items -->
                                      <div class="carousel-inner">'; 
  $i = 1;
   while(have_posts()):the_post();
   
   global $post;
   
       if($i == 1) $class = "active";
       else $class = "";
       $output .='<div class="item '.$class.'">
                                                <div>
                                                    <div class="slides">
                                                        '. apply_filters('the_content',get_the_content()).'
                                                        </div>
                                                </div><!--/row-fluid-->
                                            </div><!--/item-->';
   $i++;    
   endwhile;
    $output .='</div><!--/carousel-inner-->
                                        <a class="slide-button-two left-two carousel-control" href="#cl" data-slide="prev"></a>
                                        <a class="slide-button-two right-two carousel-control" href="#cl" data-slide="next"></a>
                                    </div><!--/myCarousel-->
                                </div><!--/well-->
                            </div>
                            </div>
                        </div>
                        </section>';
    wp_reset_query();

    return $output;
}
add_shortcode('testi', 'shortcode_testi');

add_shortcode('main','shubh_main' );
function shubh_main($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="course-detail-one">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}

add_shortcode('flowchart','shubh_flowchart' );
function shubh_flowchart($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div class="flowchart">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}

add_shortcode('subwrapper','shubh_subwrapper' );
function shubh_subwrapper($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<div><span>';
    $output .= do_shortcode($content);
    $output .= '</span></div>';
    
    return $output;
}

add_shortcode('readmore','shubh_readmore' );
function shubh_readmore($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<span class="read-more">';
    $output .= do_shortcode($content);
    $output .= '</span>';
    
    return $output;
}

add_shortcode('span','shubh_span' );
function shubh_span($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<p><span>';
    $output .= do_shortcode($content);
    $output .= '</span></p>';
    
    return $output;
}
add_shortcode('readm','shubh_readm' );
function shubh_readm($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<span class="readmore">';
    $output .= do_shortcode($content);
    $output .= '</span>';
    
    return $output;
}

add_shortcode('hr','shubh_hr' );
function shubh_hr($atts, $content = null,$shortcodename =""){
    
    $output ="";
    $output .= '<hr>';
    $output .= do_shortcode($content);
    $output .= '</hr>';
    
    return $output;
}

 add_shortcode('collapsibles','bs_collapsibles' );
  function bs_collapsibles( $atts, $content = null ) {
    
    if( isset($GLOBALS['collapsibles_count']) )
        $GLOBALS['collapsibles_count']++;
    else
        $GLOBALS['collapsibles_count'] = 0;

    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );
    
    // Extract the tab titles for use in the tab widget.
    preg_match_all( '/collapse title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
    
    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
    
    $output = '';
    
    if( count($tab_titles) ){
      $output .= '<div class="accordion" id="accordion2' . $GLOBALS['collapsibles_count'] . '">';
      $output .= do_shortcode( $content );
      $output .= '</div>';
    } else {
      $output .= do_shortcode( $content );
    }
    
    return $output;
  } 
add_shortcode('collapse','bs_collapse' );
function bs_collapse( $atts, $content = null ) {

    if( !isset($GLOBALS['current_collapse']) )
      $GLOBALS['current_collapse'] = 0;
    else 
      $GLOBALS['current_collapse']++;


    $defaults = array( 'title' => 'Tab', 'state' => '');
    extract( shortcode_atts( $defaults, $atts ) );
    
    if (!empty($state)) 
      $state = 'in';

    return '
   <div class="accordion-group">
      <div class="accordion-heading">
      
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'">
        ' . $title . ' 
        </a>

      </div>
      <div id="collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'" class="panel-collapse collapse ' . $state . '">
        <div class="accordion-inner">
          ' . do_shortcode( $content ) . ' 
        </div>
      </div>
    </div>
    ';
  }
add_action( 'after_setup_theme', 'university_setup' );
?>