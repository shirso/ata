<?php

add_action( 'after_setup_theme', 'university_setup' );

if ( ! function_exists( 'university_setup' ) ):

function university_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
        
//		set_post_thumbnail_size( 204, 162, false ); // Normal post thumbnails
//        //add_image_size( 'slider', 1200, 468, false ); // Slider Thumbnail
//        add_image_size( 'inner-banner', 1200, 300, false ); // Slider Thumbnail
//        add_image_size( 'post', 140,151 , false ); // Slider Thumbnail
//        add_image_size( 'slider-image', 990,394 , false ); // Slider Thumbnail
//        add_image_size( 'slider-thumb', 245,180 , false ); // Slider Thumbnail
//        add_image_size( 'home-banner', 1300,435 , false ); // Slider Thumbnail
//        add_image_size( 'partners-image', 189,176 , false ); // Slider Thumbnail
//        add_image_size( 'partners-detail-image', 211,196 , false ); // Slider Thumbnail
//        add_image_size( 'cities-image-home', 84,70 , false ); // Slider Thumbnail
//        add_image_size( 'team-image', 249,211 , false ); // Slider Thumbnail
//        add_image_size( 'blog-image', 189,173 , false ); // Slider Thumbnail
//        add_image_size( 'gallery-image', 196,182 , false ); // Slider Thumbnail
          add_image_size( 'toggle-image', 163,220 , false );
        
     
	}

	// Add default posts and comments RSS feed shubhs to head
 	add_theme_support( 'automatic-feed-shubhs' );

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header_menu' => 'Header Menu',
              'footer_menu' => 'Footer Menu',
	  		)
	  	);
	}
}
endif;

/* Slider */
/* function shubh_post_type_slider() {

    register_post_type( 'slider',
                array( 
                'label' => __('Slider'), 
                'public' => true, 
                'show_ui' => true,
                'show_in_nav_menus' => false,
                'menu_position' => 5,
                'supports' => array(
                        'title', 
                        'editor',
                        'thumbnail')
                    ) 
                );
}
add_action('init', 'shubh_post_type_slider'); */

/* Slider */

/*function shubh_post_type_course() {

    register_post_type( 'course',
                array( 
                'label' => __('Course'), 
                'public' => true, 
                'show_ui' => true,
                'show_in_nav_menus' => false,
                'menu_position' => 7,
                'supports' => array(
                        'title', 
                        'editor',
                        'thumbnail')
                    ) 
                );
}
add_action('init', 'shubh_post_type_course'); */
///university start////
// function university_post_type_universitystudents() {
//
//    register_post_type( 'uni_info',
//                array(
//                'label' => __('Universities'),
//                'public' => true,
//                'show_ui' => true,
//                'show_in_nav_menus' => false,
//                'menu_position' => 7,
//                'supports' => array(
//                        'title',
//                        'thumbnail')
//                    )
//                );
//}
//add_action('init', 'university_post_type_universitystudents');
//
// function university_post_type_ourpartners() {
//
//    register_post_type( 'ourpartners',
//                array(
//                'label' => __('Partners'),
//                'public' => true,
//                'show_ui' => true,
//                'show_in_nav_menus' => false,
//                'menu_position' => 5,
//                'supports' => array(
//                        'title',
//                         'editor',
//                        'thumbnail')
//                    )
//                );
//
//     register_taxonomy('partner_cat', 'ourpartners', array(
//        // Hierarchical taxonomy (like categories)
//        'hierarchical' => true,
//        // This array of options controls the labels displayed in the WordPress Admin UI
//        'labels' => array(
//            'name' => _x( 'Category', 'taxonomy general name' ),
//            'singular_name' => _x( 'Category', 'taxonomy singular name' ),
//            'search_items' =>  __( 'Search Our Partners' ),
//            'all_items' => __( ' Categories' ),
//            'parent_item' => __( 'Parent Category' ),
//            'parent_item_colon' => __( 'Parent Category:' ),
//            'edit_item' => __( 'Edit Category' ),
//            'update_item' => __( 'Update Category' ),
//            'add_new_item' => __( 'Add New Category' ),
//            'new_item_name' => __( 'New Category Name' ),
//            'menu_name' => __( 'Category' ),
//        ),
//        // Control the slugs used for this taxonomy
//        'rewrite' => array(
//            'slug' => 'partner-category', // This controls the base slug that will display before each term
//            'with_front' => false, // Don't display the category base before "/locations/"
//            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
//        ),
//));
//}
//add_action('init', 'university_post_type_ourpartners');
//
// function university_post_type_imagegallery() {
//
//    register_post_type( 'imagegallery',
//                array(
//                'label' => __('Gallery'),
//                'public' => true,
//                'show_ui' => true,
//                'show_in_nav_menus' => false,
//                'menu_position' => 7,
//                'supports' => array(
//                        'title',
//                        'thumbnail')
//                    )
//                );
//}
//add_action('init', 'university_post_type_imagegallery');
//
//function university_post_type_labour() {
//
//    register_post_type( 'rates',
//                array(
//                'label' => __('Rates'),
//                'public' => true,
//                'show_ui' => true,
//                'show_in_nav_menus' => false,
//                'menu_position' => 6,
//                'supports' => array(
//                        'title')
//                    )
//                );
//}
//add_action('init', 'university_post_type_labour');
//
//function university_post_type_team() {
//
//    register_post_type( 'team',
//                array(
//                'label' => __('Team'),
//                'public' => true,
//                'show_ui' => true,
//                'show_in_nav_menus' => false,
//                'menu_position' => 4,
//                'supports' => array(
//                        'title',
//                        'editor',
//                        'thumbnail')
//                    )
//                );
//}
//add_action('init', 'university_post_type_team');
//
//function university_post_type_cities() {
//
//    register_post_type( 'cities',
//                array(
//                'label' => __('Cities'),
//                'public' => true,
//                'show_ui' => true,
//                'show_in_nav_menus' => false,
//                'menu_position' => 4,
//                'supports' => array(
//                        'title',
//                        'thumbnail')
//                    )
//                );
//}
//add_action('init', 'university_post_type_cities');
function ata_register_post_type(){
    register_post_type( 'regions',
                array(
                'label' => __('Regions','ata'),
                'public' => false,
                'show_ui' => true,
                'show_in_nav_menus' => false,
                'supports' => array(
                        'title','editor')
                    )
                );
    register_post_type( 'society',
        array(
            'label' => __('Societies','ata'),
            'public' => false,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'supports' => array(
                'title','editor','thumbnail')
        )
    );
    register_taxonomy('society_cat', 'society', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __( 'Category', 'ata' ),
            'singular_name' => __( 'Category', 'ata' ),
            'search_items' =>  __( 'Search Categories','ata' ),
            'all_items' => __( ' Categories','ata' ),
            'parent_item' => __( 'Parent Category' ),
            'parent_item_colon' => __( 'Parent Category:','ata' ),
            'edit_item' => __( 'Edit Category','ata' ),
            'update_item' => __( 'Update Category','ata' ),
            'add_new_item' => __( 'Add New Category','ata' ),
            'new_item_name' => __( 'New Category Name','ata' ),
            'menu_name' => __( 'Category','ata' ),
        )
    ));
    register_post_type( 'forum',
        array(
            'label' => __('Regional Forums','ata'),
            'public' => false,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'supports' => array(
                'title','editor','thumbnail')
        )
    );
    register_post_type( 'partner',
        array(
            'label' => __('Partners','ata'),
            'public' => false,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'supports' => array(
                'title','thumbnail')
        )
    );
    register_post_type( 'banner',
        array(
            'label' => __('Banners','ata'),
            'public' => false,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'supports' => array(
                'title','thumbnail')
        )
    );
}
add_action('init', 'ata_register_post_type');