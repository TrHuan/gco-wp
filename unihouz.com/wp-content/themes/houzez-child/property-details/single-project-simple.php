<?php 
global $post, $top_area, $map_street_view;

$layout = houzez_option('property_blocks');
$layout = $layout['enabled'];

if ($layout): foreach ($layout as $key=>$value) {

    switch($key) {

        case 'overview':
			get_template_part('property-details/project-detail'); 
            break;
            
        case 'description':
            get_template_part('property-details/project-description'); 
            break;

        case 'address':
            get_template_part('property-details/project-utility');
            break;

        case 'details':
            get_template_part('property-details/project-investor');
            break;

        case 'features':
            get_template_part('property-details/project-location');
            break;


        // case 'booking_calendar':
        //     get_template_part('property-details/availability-calendar');
        //     break;

        case 'mortgage_calculator':

            if( houzez_hide_calculator() ) {
                get_template_part('property-details/mortgage-project');
            }
            break;

        case 'similar_properties':
            get_template_part('property-details/project-viewed');
            break;
    }
}
endif;
?>