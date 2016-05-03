frameworkShortcodeAtts={
    attributes:[
                       
            {
                label:"Heading",
                id:"university_headings",
                help:"Heading of this Section",
                item_class:"tupe_font_icon"
            },
           
            
            
            {
                label:"Total Number",
                id:"university_number",
                help:"Enter The Number of university To Display First Time without Toggle.Leave blank for All display" ,
                 item_class:"tupe_font_icon"
            },
              {
                label:" Open New Page",
                id:"university_isLink",
                help:"Whether Open A New Page on Clicking Show More Link. If true then paste page link below." ,
               controlType:"select-control",
                selectValues:['true', 'false'],
                defaultText: 'false',
                defaultValue: 'false',
                 item_class:"tupe_font_icon"
            },
           {
                label:"Page Link",
                id:"university_page_link",
                help:"Whether Open A New Page" ,
                 item_class:"tupe_font_icon"
            }, 
            
            {
                label:" More Link Text",
                id:"university_more_link_text",
                help:"Enter The More Link Text. ex: and many other university , Show More etc" ,
                 item_class:"tupe_font_icon"
            },
            
            {
                label:" Less Link Text",
                id:"university_less_link_text",
                help:"Enter The Less Link Text. ex:  Show Less etc" ,
                 item_class:"tupe_font_icon"
            },
            
    ],
    defaultContent:"",
    shortcode:"university-area"
};
setTimeout(function(){
    jQuery(".tupe_font_icon").parents("tr").css({"display":"none"});
}, 50)