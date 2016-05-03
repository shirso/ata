<?php
// =============================== My Post Cycle widget ======================================
class MY_Services extends WP_Widget {
    /** constructor */
    function MY_Services() {
        parent::WP_Widget(false, $name = 'Services Widget');    
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {        
    extract( $args );
    $title = apply_filters('widget_title',$instance['title']);
    $no_of_posts = esc_attr($instance['no_of_posts']);
    ?>
    <?php echo $before_widget; ?>
<div class="style-side clearfix">
                        <h2><span><?php echo $title; ?></span></h2>
                        <?php $count_posts = wp_count_posts('services');
                              $no_of_post = $count_posts->publish;
                              $no_of_post1 = $no_of_post / 2; 
                              $no_of_post1 = ceil($no_of_post1);
                              $no_of_post2 =  $no_of_post -  $no_of_post1;
                              //query_posts('post_type=services&order=asc&showposts=1'); ?>
                        <?php while(have_posts()):the_post(); ?>
                        <div class="col-xs-6">
                            <ul>
                             <?php query_posts('post_type=services&order=asc&showposts='.$no_of_post1); ?>
                            <?php while(have_posts()):the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                              <?php endwhile;
                              wp_reset_query(); ?>
                            </ul>
                        </div>
                        <div class="col-xs-6">
                            <ul>
                            
                             <?php query_posts('post_type=services&order=desc&showposts='.$no_of_post2); ?>
                            <?php while(have_posts()):the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                              <?php endwhile;
                              wp_reset_query(); ?>
                            </ul>
                        </div>
                       <?php endwhile; ?>
                    </div>
    <?php echo $after_widget;  
    
    } 

    
    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {                
        return $new_instance;
    }
    
    /** @see WP_Widget::form */
    function form($instance) {                
    $title = esc_attr($instance['title']);
    $no_of_posts = esc_attr($instance['no_of_posts']);
         ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'shubh'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
      <p><label for="<?php echo $this->get_field_id('no_of_posts'); ?>"><?php _e('No of Posts:', 'shubh'); ?> <input class="widefat <?php echo $this->get_field_id('no_of_posts'); ?>" id="<?php echo $this->get_field_id('no_of_posts'); ?>" name="<?php echo $this->get_field_name('no_of_posts'); ?>" type="text" value="<?php echo $no_of_posts; ?>" /></label></p>
     <?php  
   
    }
       

} // class Cycle Widget

?>
