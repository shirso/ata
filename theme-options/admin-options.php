<?php
	$themename = "Theme Options";
	$shortname = "ata";
	
    $template_uri = get_template_directory_uri();
	
	
	
	//Theme options
	$options = array(
 
		array ( "name" => "Options","type" => "title" ),

		array ( "name" => "General",
        "type" => "section",
        "image" => $template_uri."/theme-options/images/home.png",
        'id' => 'general'),
                        
		array ( "type" => "open"),
        

		array ( "name" => __("Logo","ata"),
                        "desc" => __("Upload your logo image","ata"),
                        "id" => $shortname . "_logo",
                        "type" => "upload",
                        "std" => "" ), 
        array ( "name" => __("FavIcon","ata"),
                        "desc" => __("Upload your favicon image","ata"),
                        "id" => $shortname . "_favicon",
                        "type" => "upload",
                        "std" => "" ),
        array ( "name" => __("Region Map","ata"),
            "desc" => __("Upload Region Map Image","ata"),
            "id" => $shortname . "_region_map",
            "type" => "upload",
            "std" => "" ),
       array ( "name" => "Custom CSS",
						"desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
						"id" => $shortname . "_custom_css",
						"type" => "textarea",
						"std" => "" ),  

		array ( "type" => "close"),

   		array ( "name" => "Footer",
						"type" => "section",
                        "image" => $template_uri."/theme-options/images/home.png",
                        'id' => 'footer'),

		array ( "type" => "open"),
        
        array(  "name" => "Footer copyright text",
                        "desc" => "Enter text used in the right side of the footer. It can be HTML",
                        "id" => $shortname."_footer_text",
                        "type" => "textarea",
                        "std" => ""),

		array(  "name" => "Google Analytics Code",
						"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
						"id" => $shortname."_ga_code",
						"type" => "textarea",
						"std" => ""),
                        
		array( "type" => "close")

);