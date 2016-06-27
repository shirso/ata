<?php
// Add to our admin_init function
add_filter('manage_page_posts_columns', 'shiba_add_post_columns');
 
function shiba_add_post_columns($columns) {
    $columns['widget_set'] = 'Display Widgets';
    return $columns;
}
  // Add to our admin_init function
add_action('manage_page_posts_custom_column', 'shiba_render_post_columns', 10, 2);
 
function shiba_render_post_columns($column_name, $id) {
    switch ($column_name) {     
    case 'widget_set':
        // show widget set
        $widget_id = get_post_meta( $id, '_stacy_wnews', TRUE);
        if ($widget_id) echo $widget_id ;
        else echo 'off';               
        break;
    }
} 

// Add to our admin_init function
add_action('quick_edit_custom_box',  'shiba_add_quick_edit', 10, 2);
 
function shiba_add_quick_edit($column_name, $post_type) {
    if ($column_name != 'widget_set') return;
    if($post_type != "page") return;
    global $post;  
    print_r($post->ID);
    ?>
    <fieldset class="inline-edit-col-left">
    <div class="inline-edit-col">
        <span class="title">Show Bottom Widgets : </span>
        <input type="hidden" name="_stacy_wnews_noncename" id="_stacy_wnews_noncename" value="" />
        <?php $show = get_post_meta($post->ID,"_stacy_wnews",true); ?>      
        <input type="checkbox" name="_stacy_wnews" <?php if($show == "on"){ ?> checked="checked" <?php } ?> id="_stacy_wnews_ID">
    </div>
    </fieldset>
    <?php
    
} 
 
// Add to our admin_init function
add_action('save_post', 'shiba_save_quick_edit_data');
 
function shiba_save_quick_edit_data($post_id) {
    // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
    // to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return $post_id;    
    // Check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }   
    // OK, we're authenticated: we need to find and save the data
    $post = get_post($post_id); 
    
    if (isset($_POST['_stacy_wnews']) && ($post->post_type != 'revision')) {
        $widget_set_id = esc_attr($_POST['_stacy_wnews']);
        if ($widget_set_id)
            update_post_meta( $post_id, '_stacy_wnews', $widget_set_id);     
        else
            delete_post_meta( $post_id, '_stacy_wnews');     
    }       
    return $widget_set_id;  
} 

// Add to our admin_init function
add_action('admin_footer', 'shiba_quick_edit_javascript');
 
function shiba_quick_edit_javascript() {
    global $current_screen;
    if (($current_screen->id != 'edit-page') || ($current_screen->post_type != 'page')) return; 
     
    ?>
    <script type="text/javascript">
    <!--
    function set_inline_widget_set(widgetSet, nonce) {
        // revert Quick Edit menu so that it refreshes properly
        inlineEditPost.revert();  
        var widgetInput = document.getElementById('_stacy_wnews_ID');
        var nonceInput = document.getElementById('_stacy_wnews_noncename');
        nonceInput.value = nonce;
        // check option manually
        
        widgetInput.val = widgetSet;
        

    }
    //-->
    </script>
    <?php
}  

// Add to our admin_init function
add_filter('post_row_actions', 'shiba_expand_quick_edit_link', 10, 2);
 
function shiba_expand_quick_edit_link($actions, $post) {
    global $current_screen;
    if (($current_screen->id != 'edit-page') || ($current_screen->post_type != 'page')) return $actions; 
 
    $nonce = wp_create_nonce( '_stacy_wnews'.$post->ID);
    
    $widget_id = get_post_meta( $post->ID, '_stacy_wnews', TRUE);
     
    $actions['inline hide-if-no-js'] = '<a href="#" class="editinline" title="';
    $actions['inline hide-if-no-js'] .= esc_attr( __( 'Edit this item inline' ) ) . '" ';
    $actions['inline hide-if-no-js'] .= " onclick=\"set_inline_widget_set('{$widget_id}', '{$nonce}')\">"; 
    $actions['inline hide-if-no-js'] .= __( 'Quick&nbsp;Edit' );
    $actions['inline hide-if-no-js'] .= '</a>';
    
    return $actions;    
}
?>
