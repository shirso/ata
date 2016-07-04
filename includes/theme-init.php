<?phpadd_action( 'after_setup_theme', 'university_setup' );if ( ! function_exists( 'university_setup' ) ):function university_setup() {	// This theme styles the visual editor with editor-style.css to match the theme style.	add_editor_style();	// This theme uses post thumbnails	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9		add_theme_support( 'post-thumbnails' );        //		set_post_thumbnail_size( 204, 162, false ); // Normal post thumbnails//        //add_image_size( 'slider', 1200, 468, false ); // Slider Thumbnail//        add_image_size( 'inner-banner', 1200, 300, false ); // Slider Thumbnail//        add_image_size( 'post', 140,151 , false ); // Slider Thumbnail//        add_image_size( 'slider-image', 990,394 , false ); // Slider Thumbnail//        add_image_size( 'slider-thumb', 245,180 , false ); // Slider Thumbnail//        add_image_size( 'home-banner', 1300,435 , false ); // Slider Thumbnail//        add_image_size( 'partners-image', 189,176 , false ); // Slider Thumbnail//        add_image_size( 'partners-detail-image', 211,196 , false ); // Slider Thumbnail//        add_image_size( 'cities-image-home', 84,70 , false ); // Slider Thumbnail//        add_image_size( 'team-image', 249,211 , false ); // Slider Thumbnail//        add_image_size( 'blog-image', 189,173 , false ); // Slider Thumbnail//        add_image_size( 'gallery-image', 196,182 , false ); // Slider Thumbnail          add_image_size( 'toggle-image', 163,220 , false );             	}	// Add default posts and comments RSS feed shubhs to head 	add_theme_support( 'automatic-feed-shubhs' );	// custom menu support	add_theme_support( 'menus' );	if ( function_exists( 'register_nav_menus' ) ) {	  	register_nav_menus(	  		array(	  		  'header_menu' => 'Header Menu',              'footer_menu' => 'Footer Menu',	  		)	  	);	}}endif;function ata_register_post_type(){    load_theme_textdomain('ata', get_template_directory() . '/languages');    register_post_type( 'regions',                array(                'label' => _x('Regions','ata'),                'public' => false,                'show_ui' => true,                'show_in_nav_menus' => false,                'supports' => array(                        'title','editor')                    )                );    register_post_type( 'society',        array(            'label' => __('Societies','ata'),            'public' => false,            'show_ui' => true,            'show_in_nav_menus' => false,            'supports' => array(                'title','editor','thumbnail')        )    );    register_taxonomy('society_cat', 'society', array(        'hierarchical' => true,        'labels' => array(            'name' => __( 'Category', 'ata' ),            'singular_name' => __( 'Category', 'ata' ),            'search_items' =>  __( 'Search Categories','ata' ),            'all_items' => __( ' Categories','ata' ),            'parent_item' => __( 'Parent Category' ),            'parent_item_colon' => __( 'Parent Category:','ata' ),            'edit_item' => __( 'Edit Category','ata' ),            'update_item' => __( 'Update Category','ata' ),            'add_new_item' => __( 'Add New Category','ata' ),            'new_item_name' => __( 'New Category Name','ata' ),            'menu_name' => __( 'Category','ata' ),        )    ));    register_post_type( 'forum',        array(            'label' => __('Regional Forums','ata'),            'public' => false,            'show_ui' => true,            'show_in_nav_menus' => false,            'supports' => array(                'title','editor','thumbnail')        )    );    register_taxonomy('forum_cat', 'forum', array(        'hierarchical' => true,        'labels' => array(            'name' => __( 'Category', 'ata' ),            'singular_name' => __( 'Category', 'ata' ),            'search_items' =>  __( 'Search Categories','ata' ),            'all_items' => __( ' Categories','ata' ),            'parent_item' => __( 'Parent Category' ),            'parent_item_colon' => __( 'Parent Category:','ata' ),            'edit_item' => __( 'Edit Category','ata' ),            'update_item' => __( 'Update Category','ata' ),            'add_new_item' => __( 'Add New Category','ata' ),            'new_item_name' => __( 'New Category Name','ata' ),            'menu_name' => __( 'Category','ata' ),        )    ));    register_post_type( 'partner',        array(            'label' => __('Partners','ata'),            'public' => false,            'show_ui' => true,            'show_in_nav_menus' => false,            'supports' => array(                'title','thumbnail')        )    );    register_post_type( 'banner',        array(            'label' => __('Banners','ata'),            'public' => false,            'show_ui' => true,            'show_in_nav_menus' => false,            'supports' => array(                'title','thumbnail')        )    );    register_post_type( 'slider',        array(            'label' => __('Slider / Carousel','ata'),            'public' => false,            'show_ui' => true,            'show_in_nav_menus' => false,            'supports' => array(                'title','editor','thumbnail')        )    );}add_action('init', 'ata_register_post_type');