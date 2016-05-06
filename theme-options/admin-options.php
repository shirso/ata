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
        

		array ( "name" => __("Home Page Logo","ata"),
                        "desc" => __("Upload your logo image which will display only on homepage","ata"),
                        "id" => $shortname . "_logo",
                        "type" => "upload",
                        "std" => "" ),
        array ( "name" => __("Inner Page Logo","ata"),
            "desc" => __("Upload your logo image which will display on all inner page","ata"),
            "id" => $shortname . "_inner_logo",
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
        array ( "name" => __("Facebook Page URL","ata"),
            "desc" => __("Put URL with http://","ata"),
            "id" => $shortname . "_fb",
            "type" => "text",
            "std" => "" ),
        array ( "name" => __("Language Text","ata"),
            "desc" => __("Put language display text which will show on menu","ata"),
            "id" => $shortname . "_lang_text",
            "type" => "text",
            "std" => "" ),
        array ( "name" => __("Language URL","ata"),
            "desc" => __("Put language URL with http://","ata"),
            "id" => $shortname . "_lang_url",
            "type" => "text",
            "std" => "" ),
       array ( "name" => __("Custom CSS","ata"),
						"desc" =>__("Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}","ata"),
						"id" => $shortname . "_custom_css",
						"type" => "textarea",
						"std" => "" ),  

		array ( "type" => "close"),

        array ( "name" => __("Banner","ata"),
            "type" => "section",
            "image" => $template_uri."/theme-options/images/home.png",
            'id' => 'banner'),
        array ( "type" => "open"),
        array(  "name" => __("Transaction Mode","ata"),
            "desc" =>__("Type of transition between slides","ata"),
            "id" => $shortname."_banner_mode",
            "type" => "select",
            "options"=>array("horizontal","vertical","fade"),
            "std" => ""),
        array(  "name" => __("Speed","ata"),
            "desc" =>__("Slide transition duration (in ms)","ata"),
            "id" => $shortname."_banner_speed",
            "type" => "text",
            "std" => ""),
        array(  "name" => __("Speed","ata"),
            "desc" =>__("Slide transition duration (in ms)","ata"),
            "id" => $shortname."_banner_speed",
            "type" => "text",
            "std" => ""),
        array(  "name" => __("Auto","ata"),
            "desc" =>__("Slides will automatically transition","ata"),
            "id" => $shortname."_banner_auto",
            "type" => "select",
            "options"=>array("true","false"),
            "std" => ""),
        array ( "type" => "close"),
   		array ( "name" => __("Footer","ata"),
						"type" => "section",
                        "image" => $template_uri."/theme-options/images/home.png",
                        'id' => 'footer'),

		array ( "type" => "open"),
        
        array(  "name" => __("Footer copyright text","ata"),
                        "desc" =>__("Enter text used in the right side of the footer. It can be HTML","ata"),
                        "id" => $shortname."_footer_text",
                        "type" => "textarea",
                        "std" => ""),

		array(  "name" => __("Google Analytics Code","ata"),
						"desc" => __("You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.","ata"),
						"id" => $shortname."_ga_code",
						"type" => "textarea",
						"std" => ""),
                        
		array( "type" => "close")

);