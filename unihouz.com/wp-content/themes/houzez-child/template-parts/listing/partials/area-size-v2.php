<?php
$propID = get_the_ID();
$prop_size = houzez_get_listing_data('property_size');
$listing_area_size = houzez_get_listing_area_size( $propID );
$listing_size_unit = houzez_get_listing_size_unit( $propID );

$property = get_post_meta(get_the_ID(), 'fave_property_id', true );

$output = '';
// var_dump($listing_area_size);
if( !empty( $listing_area_size ) ) {
	echo '<div class="custom-area">';
		echo '<img src="'.get_stylesheet_directory_uri().'/lib/images/area.png" >';
		echo '<span class="area-label"> Diện tích: </span>';
	echo '</div>';
	$output .= '<li class="h-area">';
		$output .= '<span class="hz-figure">'.$listing_area_size.' ';
		$output .= '</span>';
		if(houzez_option('icons_type') == 'font-awesome') {
			$output .= '<i class="'.houzez_option('fa_area-size').' ml-1"></i>';

		} elseif (houzez_option('icons_type') == 'custom') {
			$cus_icon = houzez_option('area-size');
			if(!empty($cus_icon['url'])) {

				$alt = isset($cus_icon['title']) ? $cus_icon['title'] : '';
				$output .= '<img class="img-fluid ml-1" src="'.esc_url($cus_icon['url']).'" width="16" height="16" alt="'.esc_attr($alt).'">';
			}
		} else {
			$output .= '<span class="area_postfix">'.$listing_size_unit.'</span>';
			$output .= '<i class="houzez-icon icon-ruler-triangle mr-1"></i>';
		}
		
		
	$output .= '</li>';
}
echo $output;

//Property
if ( $property ) {
	echo '<div class="custom-property">';
		echo '<div class="custom-area">';
			echo '<img src="'.get_stylesheet_directory_uri().'/lib/images/bds.png" >';
			echo '<span class="area-label"> Loại hình : &nbsp </span>';
		echo '</div>';
		echo '<div class="property-items">';
			echo $property;
		echo '</div>';	
	echo '</div>';
}

// Price
echo '<div class="custom-price">';
	echo '<div class="custom-area">';
		echo '<img src="'.get_stylesheet_directory_uri().'/lib/images/price.png" >';
		echo '<span class="area-label"> Giá : &nbsp </span>';
	echo '</div>';
	echo '<div class="price-item">';
		echo houzez_listing_price_v1(); 
	echo '</div>';
echo '</div>';