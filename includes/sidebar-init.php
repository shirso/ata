<?php
function elegance_widgets_init() {
  

 // Location: at the bottom of the content
     register_sidebar(array(
        'name'                    => 'Blog Page Sidebar',
        'id'                         => 'blog_sidebar',
        'description'   => __( 'Located in the Right Sidebar of Blog Page'),
        'before_widget' => '<div class="resent-con">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));         
    
    register_sidebar(array(
        'name'                    => 'Default SideBar',
        'id'                         => 'likebox',
        'description'   => __( 'Located in Sidebar of Page'),
        'before_widget' => '<div class="side-table">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));  
    
 
     
  
   
   register_sidebar(array(
        'name'                    => 'Sidebar Address',
        'id'                         => 'sidebar',
        'description'   => __( 'Located in contact page sidebar'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    )); 
    
    register_sidebar(array(
        'name'                    => 'Sidebar Contact',
        'id'                         => 'sidebarcontact',
        'description'   => __( 'Located in contact page sidebar'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    
}
add_action( 'widgets_init', 'elegance_widgets_init' );
?>