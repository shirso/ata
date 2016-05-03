frameworkShortcodeAtts={
	attributes:[
			{
				label:"Icon Type",
				id:"icon_type",
				controlType:"select-control", 
				selectValues:['Image', 'Icon'],
				defaultValue: 'Icon',
				defaultText: 'Icon',
				help:"Select icon type."
			},
			
			{
				label:"Icon Class",
				id:"icon_class",
				help:"In this field you need to specify the icon name that can be copied from the <u><a href=' http://fortawesome.github.io/Font-Awesome/3.2.1/icons/' target='_blank'>website</a></u>. E.g. \"icon-music\".",
				item_class:"tupe_font_icon"
			},
			{
				label:"Icon Size",
				id:"icon_font_size",
				help:"Specify the icon image size in px or em. E.g. \"14px\".",
				item_class:"tupe_font_icon"
			},
			
			{
				label:"Align",
				id:"align",
				controlType:"select-control",
				selectValues:['left', 'right', 'center', 'none'],
				defaultValue: 'left', 
				defaultText: 'left',
				help:"Choose icon's align."
			},
            {
                label:"Tittle",
                id:"my_title",
                help:"Enter The Tittle" ,
                 item_class:"tupe_font_icon"
            },
            {
                label:"Description Area",
                controlType:"textarea-control",
                id:"my_textarea",
                help:"Enter Your Description",
                 item_class:"tupe_font_icon"
            },
			
	],
	defaultContent:"",
	shortcode:"icon"
};
setTimeout(function(){
	jQuery(".tupe_font_icon").parents("tr").css({"display":"none"});
}, 50)