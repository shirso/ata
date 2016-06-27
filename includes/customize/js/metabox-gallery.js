(function($) {
    $(function() {
        // The click event for the gallery manage button
        $('.button-gallery').click(function() {
            // Create the shortcode from the current ids in the hidden field
            
            // Open the gallery with the shortcode and bind to the update event
              var hidden_input = $(this).parent().find('.product_gallery_ids');
              var gallery_box = $(this).parent().find(".gallery-box");
              var gid_button = $(this).parent().find('.product_gallery_ids');
              var but = $(this).parent().find(".but");
              var delete_gallery = $(this).parent().find(".delete-button-gallery");
              var Gval = hidden_input.val();
              //if( hidden_input.val() == null ) var val = null;
              //else val = hidden_input.val();
              var gallerysc = '[gallery ids="' + Gval + '"]';
            
            wp.media.gallery.edit(gallerysc).on('update', function(g) {
                
                gallery_box.html("");
                
                // We fill the array with all ids from the images in the gallery
                var id_array = [];
                $.each(g.models, function(id, img) { id_array.push(img.id); });
                // Make comma separated list from array and set the hidden value
                var v =  id_array.join(",");
                
                    gid_button.val(v); 
                
                var data = {
                    action: 'my_action',
                    whatever: v
                };

                // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                $.post(ajaxurl, data, function(response) {

                    gallery_box.html(response).fadeIn("slow");
                    
                    but.val("Manage Gallery");
                    delete_gallery.show();
                    
                    
                });
                
                // On the next post this field will be send to the save hook in WP
            });
        });
         $(".delete-button-gallery").click(function(){
        
                $(this).parent().find(".gallery").hide("slow");
        
       $(this).parent().find(".product_gallery_ids").val("");
        
    });
    
    });
   
    
})(jQuery);

