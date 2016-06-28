frameworkShortcodeAtts={

    attributes:[

        {
            label:"Heading",
            id:"heading",
            help:"Heading of the grid item (Bold Text)"
        },
        {
            label:"Date Field",
            id:"date_field",
            help:"Small Date above Heading(Use Other text also)"
        },
        {
            label:"Yellow Box Main Text",
            id:"yellow_box_text",
            help:"Main Text on Yellow Box above Heading"
        },
        {
            label:"Yellow Box Sub Text",
            id:"yellow_sub_box_text",
            help:"Sub Text on Yellow Box above Heading"
        },

        {
            label:"Grid Type",
            id:"type",
            controlType:"select-control",
            selectValues:['no-image', 'full-image', 'half-image'],
            selectTexts:['No Image', 'Full Image', 'Half Image'],
            defaultValue: 'no-image',
            defaultText: 'No Image',
            help:"Choose Appropriate Grid Type"
        },
        {
            label:"Content",
            id:"content",
            controlType:"textarea-control",
            help:"Put Content of this Grid Item"
        },
        {
            label:"More Button Text",
            id:"more_button_text",
        },
        {
            label:"More Button Link",
            id:"more_button_link",
        },
    ],

    defaultContent:"",

    shortcode:"grid_item"

};
