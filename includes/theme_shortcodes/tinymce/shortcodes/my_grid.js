frameworkShortcodeAtts={

    attributes:[

        {
            label:"Heading",
            id:"heading",
            help:"Heading of the grid item (Bold Text)"
        },
        {
            label:"SubHeading",
            id:"sub_heading",
            help:"Small Text under Heading"
        },
        {
            label:"Small Text",
            id:"small_text",
            help:"Small Text above heading with Date"
        },

        {
            label:"Date",
            id:"date_field",
            help:"Small Date above Heading"
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
            selectValues:['no-image-grey','no-image-blue', 'full-image', 'half-image','full-image-no-gap'],
            selectTexts:['No Image Grey Background','No Image Blue Background', 'Full Image', 'Half Image','Full Image with No Gap'],
            defaultValue: 'no-image-grey',
            defaultText: 'No Image Grey Background',
            help:"Choose Appropriate Grid Type"
        },
        {
          label:"Image",
          id:"image",
          controlType:"upload-control",
          help:"Choose Image for Background or Top of Content"
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
