<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_university_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['page_metabox'] = array(
		'id'         => 'page_metabox',
		'title'      => __( 'Page Meta', 'cmb' ),
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'       => __( 'Banner Text', 'university' ),
				'desc'       => __( 'Text On Banner Image', 'university' ),
				'id'         => $prefix . 'banner_text',
				'type'       => 'textarea_small',
			)
            )
            );
            $meta_boxes['uni_metabox'] = array(
        'id'         => 'uni_metabox',
        'title'      => __( 'Unversities Meta', 'cmb' ),
        'pages'      => array( 'uni_info', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
        'fields'     => array(
            array(
                'name'       => __( 'City Name', 'university' ),
                'desc'       => __( 'City Details of this University', 'university' ),
                'id'         => $prefix . 'city_name',
                'type'       => 'text_medium',
            ),
            array(
                'name'       => __( 'Subdomain Page Link', 'university' ),
                'desc'       => __( 'Link of the Unversity Subdomain Home Page(without http://)', 'university' ),
                'id'         => $prefix . 'uni_subdomain_link',
                'type'       => 'text_url',
            )
            )
            );
            $meta_boxes['city_metabox'] = array(
        'id'         => 'city_metabox',
        'title'      => __( 'City Meta', 'cmb' ),
        'pages'      => array( 'cities', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
        'fields'     => array(
            array(
                'name'       => __( 'Subdomain Page Link', 'university' ),
                'desc'       => __( 'Link of the City Subdomain Home Page(without http://)', 'university' ),
                'id'         => $prefix . 'subdomain_link',
                'type'       => 'text_url',
            )
            )
            );
             $meta_boxes['team_metabox'] = array(
        'id'         => 'team_metabox',
        'title'      => __( 'Team Meta', 'cmb' ),
        'pages'      => array( 'team', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
        'fields'     => array(
            array(
                'name'       => __( 'Designation', 'university' ),
                'desc'       => __( 'Put the appropiate designation of this team member', 'university' ),
                'id'         => $prefix . 'desg',
                'type'       => 'text',
            )
            )
            );
    $meta_boxes['rate_metabox'] = array(
        'id'         => 'rate_group',
        'title'      => __( 'Price List', 'university' ),
        'pages'      => array( 'rates', ),
        'fields'     => array(
            array(
                'id'          => $prefix . 'rate_group_price',
                'type'        => 'group',
                'description' => __( 'Insert Multiple Rates', 'university' ),
                'options'     => array(
                    'group_title'   => __( 'Rate  {#}', 'university' ), // {#} gets replaced by row number
                    'add_button'    => __( 'Add Another Rate', 'university' ),
                    'remove_button' => __( 'Remove Rate', 'university' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                    array(
                        'name' => 'Label',
                        'id'   => 'title',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Price',
                        'description' => 'Put Price. i.e.$30/hour',
                        'id'   => 'price',
                        'type' => 'text_small',
                    ),
                ),
            ),
        ),
    );

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
add_action( 'admin_init', 'ata_csutom_meta_box', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) ) {
        require_once 'init.php';
    }

}
function ata_csutom_meta_box(){
    require_once 'custom_metaboxes.php';
}
