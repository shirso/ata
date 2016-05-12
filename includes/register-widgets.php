<?php
/**
 * Loads up all the widgets defined by this theme. Note that this function will not work for versions of WordPress 2.7 or lower
 *
 */
include_once (TEMPLATEPATH . '/includes/widgets/partner-widget.php');

add_action("widgets_init", "load_my_widgets");

function load_my_widgets() {
    register_widget("Partner_Widget");

}
?>