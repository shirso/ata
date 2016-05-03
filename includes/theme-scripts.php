<?php
function university_script(){
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_bloginfo('template_url').'/js/jquery-1.11.0.min.js', false, '1.10.1');
        wp_enqueue_script('jquery');
        
        
        wp_enqueue_script('bootstrap', get_bloginfo('template_url').'/js/bootstrap.js',array('jquery'),'1.0.1');
        wp_enqueue_script('modernizr', get_bloginfo('template_url').'/js/modernizr.js',array('jquery'),'1.0.1',true);
        wp_enqueue_script('easing', get_bloginfo('template_url').'/js/easing.js',array('jquery'),'1.0.1',true);
        wp_enqueue_script('hoverintent', get_bloginfo('template_url').'/js/hoverintent.js',array('jquery'),'1.0.1',true);
        wp_enqueue_script('mousewheel', get_bloginfo('template_url').'/js/mousewheel.js',array('jquery'),'1.0.1',true);
        wp_enqueue_script('pie', get_bloginfo('template_url').'/js/pie.js',array('jquery'),'1.0.1',true);
        wp_enqueue_script('placeholder', get_bloginfo('template_url').'/js/placeholder.js',array('jquery'),'1.0.1',true);
        wp_enqueue_script('respond', get_bloginfo('template_url').'/js/respond.min.js',array('jquery'),'1.0.1',true);
        wp_enqueue_script('custom', get_bloginfo('template_url').'/js/custom.js',array('jquery'),'1.0.1',true);    
    }
}
function university_styles(){
    if (!is_admin()) {
         
         wp_enqueue_style('bootstrap', get_bloginfo('template_url').'/css/bootstrap.min.css');
         wp_enqueue_style('typography', get_bloginfo('template_url').'/css/typography.css');
         wp_enqueue_style('colorscheme', get_bloginfo('template_url').'/css/colorscheme.css');
          wp_enqueue_style('defualt', get_bloginfo('template_url').'/css/defualt.css');
         wp_enqueue_style('style', get_bloginfo('template_url').'/css/style.css');
         wp_enqueue_style('ie', get_bloginfo('template_url').'/css/ie.css');
         wp_enqueue_style('layout', get_bloginfo('template_url').'/css/layout.css'); 
         wp_enqueue_style('font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'); 
         
         
    }
   
}

global $pagenow;

if ( !is_admin() && 'wp-login.php' != $pagenow ) {
    
    add_action('init', 'university_script');
    add_action('init', 'university_styles');

} if(is_admin()){
       wp_enqueue_style('font-awesome-admin', 'http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');

    }
function ata_load_custom_wp_admin_style(){
    wp_enqueue_script('ata_admin_scripts', get_bloginfo('template_url').'/js/ata_custom.js',array('jquery'),'1.0.1');
}
add_action( 'admin_enqueue_scripts', 'ata_load_custom_wp_admin_style' );

?>