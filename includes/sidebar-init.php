<?php
function elegance_widgets_init() {
  

 // Location: at the bottom of the content
     register_sidebar(array(
        'name'                    =>__('Footer Sidebar 1','ata'),
        'id'                         => 'footer_sidebar1',
        'description'   => __( 'Located in the top right of footer section','ata'),
        'before_widget' => '<div class="llg-sec clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));         
    
    register_sidebar(array(
        'name'                    => __('Footer Sidebar 2','ata'),
        'id'                         => 'footer_sidebar2',
        'description'   => __( 'Located in the top left of footer section','ata'),
        'before_widget' => '<div class="llg-sec clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name'                    => __('Footer Sidebar 3','ata'),
        'id'                         => 'footer_sidebar3',
        'description'   => __( 'Located in the bottom left of footer section','ata'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'elegance_widgets_init' );
?>