<?php
function university_script(){
    if (!is_admin()) {
       wp_enqueue_script('jquery-masonry');
       wp_enqueue_script('bx-slider', get_bloginfo('template_url').'/assets/js/jquery.bxslider.min.js',array('jquery'),'1.0.1',true);
       wp_enqueue_script('blockUI', get_bloginfo('template_url').'/assets/js/jquery.blockUI.min.js',array('jquery'),'1.0.1',true);
       wp_enqueue_script('fabric_js', get_bloginfo('template_url').'/assets/js/fabric.js',array('jquery'),'1.0.1',true);
       wp_register_script('custom', get_bloginfo('template_url').'/assets/js/custom.js',array('jquery'),'1.0.1',true);
       wp_localize_script('custom','ata_data',array('ajaxurl'=> admin_url('admin-ajax.php')));
       wp_enqueue_script('custom');
    }
}
function university_styles(){
    if (!is_admin()) {
        wp_enqueue_style('bootstrap', get_bloginfo('template_url').'/assets/css/bootstrap.css');
        wp_enqueue_style('bxslider_style', get_bloginfo('template_url').'/assets/css/jquery.bxslider.css');
        wp_enqueue_style('custom_style', get_bloginfo('template_url').'/assets/css/styles.css');
    }
   
}
add_action('wp_enqueue_scripts','university_styles');
add_action('wp_enqueue_scripts','university_script');
function ata_load_custom_wp_admin_style(){
    wp_enqueue_script("fabric_script", get_bloginfo('template_url')."/assets/js/fabric.js", false, "1.0");
    wp_enqueue_script('ata_admin_scripts', get_bloginfo('template_url').'/assets/js/ata_custom.js',array('jquery'),'1.0.1');
    wp_enqueue_style('font-awesome-admin', 'http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');
}
add_action( 'admin_enqueue_scripts', 'ata_load_custom_wp_admin_style' );
