<?php
class Partner_Widget extends WP_Widget {
    function Partner_Widget() {
        parent::WP_Widget(false, $name = __('Partner Widget','ata'));
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title',$instance['title']);
        ?>
        <?php echo $before_widget;?>
        <h3><?=$title?></h3>
        <div class="prtnersec clearfix">
            <?php query_posts('post_type=partner&order=asc&showposts=-1'); ?>
            <?php while(have_posts()):the_post(); ?>
                <div class="prtnm">
                    <?=the_post_thumbnail("full",array("class"=>"img-responsive"))?>
                </div>
            <?php endwhile;
            wp_reset_query(); ?>
        </div>
        <?php echo $after_widget;?>
        <?php
    }
        function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function form($instance) {
        $title = esc_attr($instance['title']);
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'shubh'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php
    }
}