<?php

$prefix = 'ew_';

global $meta_boxes;

$meta_boxes = array();


/*-----------------------------------------------------------------------------------*/
/*------------------	    Metabox for property images                --------------*/
/*-----------------------------------------------------------------------------------*/

$meta_boxes[] = array(
    'title'      => __( 'Youtube Link', 'textdomain' ),
    'post_types' => 'video',
    'context'    => 'advanced',
    'priority'   => 'high',
    'fields' => array(
        array(
            'id'    => 'ew_oembed',
            'name'  => __( 'Link', $prefix ),
            'type'  => 'oembed',
            // Allow to clone? Default is false
            'clone' => false,
            // Input size
            'size'  => 60,
        ),
        // array(
        //     'name'  => __( 'Check if this is featured video', $prefix ),
        //     'id'    => 'featured_video',
        //     'type' => 'checkbox',
        // ),
        // array(
        //     'id'            => 'address',
        //     'name'          => 'Address',
        //     'type'          => 'text',
        //     'std'           => 'Hanoi, Vietnam',
        // ),
        // array(
        //     'id'            => 'loc',
        //     'name'          => 'Location',
        //     'type'          => 'map',
        //     'std'           => '-6.233406,-35.049906,15',     // 'latitude,longitude[,zoom]' (zoom is optional)
        //     'style'         => 'width: 500px; height: 500px',
        //     'address_field' => 'address',                     // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
        // ),
    ),
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function _register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded
//  before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', '_register_meta_boxes' );