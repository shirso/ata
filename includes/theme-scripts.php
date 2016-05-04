<?php
function university_script(){
    if (!is_admin()) {
//        wp_enqueue_script('bootstrap', get_bloginfo('template_url').'/js/bootstrap.js',array('jquery'),'1.0.1');
//        wp_enqueue_script('modernizr', get_bloginfo('template_url').'/js/modernizr.js',array('jquery'),'1.0.1',true);
//        wp_enqueue_script('easing', get_bloginfo('template_url').'/js/easing.js',array('jquery'),'1.0.1',true);
//        wp_enqueue_script('hoverintent', get_bloginfo('template_url').'/js/hoverintent.js',array('jquery'),'1.0.1',true);
//        wp_enqueue_script('mousewheel', get_bloginfo('template_url').'/js/mousewheel.js',array('jquery'),'1.0.1',true);
//        wp_enqueue_script('pie', get_bloginfo('template_url').'/js/pie.js',array('jquery'),'1.0.1',true);
      wp_enqueue_script('masnory', get_bloginfo('template_url').'/assets/js/masonry.pkgd.min.js',array('jquery'),'1.0.1',true);
       wp_enqueue_script('bx-slider', get_bloginfo('template_url').'/assets/js/jquery.bxslider.min.js',array('jquery'),'1.0.1',true);
       wp_enqueue_script('custom', get_bloginfo('template_url').'/assets/js/custom.js',array('jquery'),'1.0.1',true);
    }
}
function university_styles(){
    if (!is_admin()) {
        wp_enqueue_style('bootstrap', get_bloginfo('template_url').'/assets/css/bootstrap.css');
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
