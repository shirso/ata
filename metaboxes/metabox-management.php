<?php/** * Include and setup custom metaboxes and fields. * * @category YourThemeOrPlugin * @package  Metaboxes * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later) * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress */add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );/** * Define the metabox and field configurations. * * @param  array $meta_boxes * @return array */function cmb_sample_metaboxes( array $meta_boxes ) {    $prefix = '_ata_';    $meta_boxes['slider_metabox'] = array(        'id'         => 'slider_metabox',        'title'      => __( 'Carousel Buttons', 'ata' ),        'pages'      => array( 'slider', ),        'context'    => 'normal',        'show_names' => true,        'fields'     => array(            array(            'name'       => __( 'Button Heading', 'ata' ),            'desc'       => __( 'Heading above Button', 'ata' ),            'id'         => $prefix . 'slider_button_heading',            'type'       => 'text_medium'            ),            array(                'name'       => __( 'Button Text', 'ata' ),                'desc'       => __( 'Text Display on Carousel Button', 'ata' ),                'id'         => $prefix . 'slider_button_text',                'type'       => 'text_medium'            ),            array(                'name'       => __( 'Button Sub Heading', 'ata' ),                'desc'       => __( 'Small Text Display under Carousel Text', 'ata' ),                'id'         => $prefix . 'slider_button_small_text',                'type'       => 'text'            )        )    );	return $meta_boxes;}add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );add_action( 'admin_init', 'ata_csutom_meta_box', 9999 );/** * Initialize the metabox class. */function cmb_initialize_cmb_meta_boxes() {	if ( ! class_exists( 'cmb_Meta_Box' ) ) {        require_once 'init.php';    }}function ata_csutom_meta_box(){    require_once 'custom_metaboxes.php';}