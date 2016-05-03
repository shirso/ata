frameworkShortcodeAtts={
    attributes:[
            
            
            {
                label:"Image Class",
                id:"team_image_class",
                help:"In this field you need to specify the Image Class ",
                item_class:"tupe_font_icon"
            },
           
            
            
            {
                label:"Tittle",
                id:"team_image_title",
                help:"Enter The Tittle" ,
                 item_class:"tupe_font_icon"
            },
            {
                label:"position",
                id:"team_image_position",
                help:"Enter The Position in Company" ,
                 item_class:"tupe_font_icon"
            },
            {
                label:"Description Area",
                controlType:"textarea-control",
                id:"team_image_textarea",
                help:"Enter Your Description",
                 item_class:"tupe_font_icon"
            },
            
    ],
    defaultContent:"",
    shortcode:"our_team"
};
setTimeout(function(){
    jQuery(".tupe_font_icon").parents("tr").css({"display":"none"});
}, 50)