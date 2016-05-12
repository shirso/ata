(function() {
	// TinyMCE plugin start.
	tinymce.PluginManager.add( 'CherryTinyMCEShortcodes', function( editor, url ) {
		// Register a command to open the dialog.
		editor.addCommand( 'cherry_open_dialog', function( ui, v ) {
			cherrySelectedShortcodeType = v;
			selectedText = editor.selection.getContent({format: 'text'});
			tb_dialog_helper.loadShortcodeDetails();
			tb_dialog_helper.setupShortcodeType( v );

			jQuery( '#shortcode-options' ).addClass( 'shortcode-' + v );
			jQuery( '#selected-shortcode' ).val( v );

			var f=jQuery(window).width();
			b=jQuery(window).height();
			f=720<f?720:f;
			f-=80;
			b-=84;

			tb_show( "Insert ["+ v +"] shortcode", "#TB_inline?width="+f+"&height="+b+"&inlineId=dialog" );
		});

		// Register a command to insert the self-closing shortcode immediately.
		editor.addCommand( 'cherry_insert_self_immediate', function( ui, v ) {
			editor.insertContent( '[' + v + ']' );
		});

		// Register a command to insert the enclosing shortcode immediately.
		editor.addCommand( 'cherry_insert_immediate', function( ui, v ) {
			var selected = editor.selection.getContent({format: 'text'});

			editor.insertContent( '[' + v + ']' + selected + '[/' + v + ']' );
		});

		// Register a command to insert the N-enclosing shortcode immediately.
		editor.addCommand( 'cherry_insert_immediate_n', function( ui, v ) {
			var arr = v.split('|'),
				selected = editor.selection.getContent({format: 'text'}),
				sortcode;

			for (var i = 0, len = arr.length; i < len; i++) {
				if (0 === i) {
					sortcode = '[' + arr[i] + ']' + selected + '[/' + arr[i] + ']';
				} else {
					sortcode += '[' + arr[i] + '][/' + arr[i] + ']';
				};
			};
			editor.insertContent( sortcode );
		});

		// Register a command to insert `Tabs` shortcode.
		editor.addCommand( 'cherry_insert_tabs', function( ui, v ) {
			editor.insertContent( '[tabs direction="top" tab1="Title #1" tab2="Title #2" tab3="Title #3"] [tab1] Tab 1 content... [/tab1] [tab2] Tab 2 content... [/tab2] [tab3] Tab 3 content... [/tab3] [/tabs]' ); // direction - top, right, below, left
		});

		// Register a command to insert `Accordion` shortcode.
		editor.addCommand( 'cherry_insert_accordions', function( ui, v ) {
			editor.insertContent( '[accordions] [accordion title="title1" visible="yes"] tab content [/accordion] [accordion title="title2"] another content tab [/accordion] [/accordions]' );
		});

		// Register a command to insert `Table` shortcode.
		editor.addCommand( 'cherry_insert_table', function( ui, v ) {
			editor.insertContent( '[table td1="#" td2="Title" td3="Value"] [td1] 1 [/td1] [td2] some title 1 [/td2] [td3] some value 1 [/td3] [/table]' );
		});

		// Add a button that opens a window
		editor.addButton( 'cherry_shortcodes_button', {
			type: 'menubutton',
			icon: 'icon icon-puzzle-piece',
			tooltip: 'Insert a  Shortcode',
			menu: [
				{text: 'Home Page Elements', menu: [
					{text: 'Banner', onclick: function() { editor.execCommand( 'cherry_insert_self_immediate', false, 'banner', { title: 'banner' } ); } },
				]},
                
				 {
                   text:'Region Elements', menu:[
                   {text: 'Region Map', onclick: function() { editor.execCommand( 'cherry_open_dialog', false, 'region_map', { title: 'Region Map' } ); } } ,
                   {text: 'Text Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'region_text_block', { title: 'region_text_block' } ); } } ,
                   {text: 'List Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'region_list_block', { title: 'region_list_block' } ); } } ,
                   ]
                 },
				{
					text:'Contact Elements', menu:[
					{text: 'Full Width Contact Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'single_contact_block', { title: 'Single Person Contact Block' } );}} ,
					{text: 'Image Text Wrapper', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'contact_img_block', { title: 'Image Text Block' } ); } } ,
					{text: 'Text Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'contact_text_block', { title: 'Text Block' } ); } } ,
					{text: 'Regional Contacts', onclick: function() { editor.execCommand( 'cherry_open_dialog', false, 'contact_regional', { title: 'Regional Contacts' } ); } }
				]
				},
				{
					text:'About-Us Elements', menu:[
					{text: 'Slider/Carousel', onclick: function() { editor.execCommand( 'cherry_insert_self_immediate', false, 'ata_carousel', { title: 'Carousel' } ); } },
					{text: 'Full Width Society Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'society_block', { title: 'Full Width Society Block' } );}} ,
					{text: 'Text Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'society_text_block', { title: 'Text Block' } ); } } ,
					{text: 'Toggle Button Row', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'society_button_row', { title: 'Toggle Button Row' } ); } },
					{text: 'Toggle Button', onclick: function() { editor.execCommand( 'cherry_open_dialog', false, 'toggle_button', { title: 'Toggle Button' } ); } }
				]
				},
				{
					text:'Membership Elements', menu:[
					{text: 'Full Width Gray Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'membership_gray_block', { title: 'Full Width Gray Block' } );}} ,
					{text: 'Full Width Blue Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'membership_blue_block', { title: 'Full Width Blue Block' } ); } } ,
					{text: 'Divider', onclick: function() { editor.execCommand( 'cherry_insert_self_immediate', false, 'membership_divider', { title: 'Divider' } ); } } ,
					{text: 'Text Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'membership_text_block', { title: 'Text Block' } ); } } ,
					{text: 'Button Row', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'membership_button_row', { title: 'Button Row' } ); } } ,
				]
				},
				{
					text:'Grid Elements', menu:[
					{text: 'Grid Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'grid', { title: 'Grid' } ); } } ,
					{text: 'Container', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'container', { title: 'Container' } ); } } ,
					{text: 'Row', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'row', { title: 'Row' } ); } },
					{text: 'Text Block', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'grid_text_block', { title: 'Text Block' } ); } }
				]
				},
				{
					text:'Medium(Tab)Device Columns', menu:[
					{text: 'Column 1', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-sm-1', { title: 'Column 1' } ); } },
					{text: 'Column 2', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-sm-2', { title: 'Column 2' } ); } },
					{text: 'Column 3', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-sm-3', { title: 'Column 3' } ); } },
					{text: 'Column 4', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-sm-4', { title: 'Column 4' } ); } },
					{text: 'Column 6', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-sm-6', { title: 'Column 6' } ); } },
					{text: 'Column 8', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-sm-8', { title: 'Column 8' } ); } },
					{text: 'Column 10', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-sm-10', { title: 'Column 10' } ); } },
					{text: 'Column 12', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-sm-12', { title: 'Column 12' } ); } }
				]
				},
				{
					text:'Small(Mobile)Device Columns', menu:[
					{text: 'Column 1', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-xs-1', { title: 'Column 1' } ); } },
					{text: 'Column 2', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-xs-2', { title: 'Column 2' } ); } },
					{text: 'Column 3', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-xs-3', { title: 'Column 3' } ); } },
					{text: 'Column 4', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-xs-4', { title: 'Column 4' } ); } },
					{text: 'Column 6', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-xs-6', { title: 'Column 6' } ); } },
					{text: 'Column 8', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-xs-8', { title: 'Column 8' } ); } },
					{text: 'Column 10', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-xs-10', { title: 'Column 10' } ); } },
					{text: 'Column 12', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'col-xs-12', { title: 'Column 12' } ); } }
				]
				},
				// Misc menu.
				{text: 'Misc', menu: [
					{text: 'Span', onclick: function() { editor.execCommand( 'cherry_insert_immediate', false, 'span', { title: 'span' } ); } } ,
					{text: 'Button', onclick: function() { editor.execCommand( 'cherry_open_dialog', false, 'button', { title: 'button' } ); } } ,
				]},
				
			]
		});
	}); // TinyMCE plugin end.
})();