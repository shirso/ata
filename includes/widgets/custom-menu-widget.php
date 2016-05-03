<?php
// =============================== My Post Cycle widget ======================================
class MY_CustomMenu extends WP_Widget {
    /** constructor */
    function MY_CustomMenu() {
        parent::WP_Widget(false, $name = 'My - Custom Menu');    
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {        
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $menu = apply_filters('widget_menu', $instance['menu']);

        ?>
              <?php echo $before_widget; ?>
        <div class="footer-contener">
            <div class="footer-contener-padding">
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                        
                        <?php 
                            wp_nav_menu( array(
                                      'container'       => 'ul',
                                      'menu'            => $menu
                                  )); 
                            ?>
                        
            </div>
        </div>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {                
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {                
            $title = esc_attr($instance['title']);
            
            $value_of_dropdown = esc_attr($instance['menu']);
            
            $menus = get_terms('nav_menu');
    ?>
    
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mmm'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
      
      <p>
        <label for="<?php echo $this->get_field_id('menu'); ?>"><?php _e( "Select Menu", 'svm' ); ?></label>
        <select class="widefat" id="<?php echo $this->get_field_id('menu'); ?>" name="<?php echo $this->get_field_name('menu'); ?>">
        <option value="">Select</option>
        <?php foreach($menus as $menu){ ?>
        <option value="<?php   echo $menu->term_id; ?>" <?php if($value_of_dropdown == $menu->term_id){ ?>selected="selected"<?php }?> > <?php echo $menu->name; ?></option>
        <?php }?>
        </select>

    </p>
      <?php 
    }

} // class Cycle Widget


?>