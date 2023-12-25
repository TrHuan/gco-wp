<?php
global $post, $top_area, $property_layout;
$prop_video_url = houzez_get_listing_data('video_url');
$virtual_tour = houzez_get_listing_data('virtual_tour');
$layout = houzez_option('property_blocks');
$houzez_walkscore = houzez_option('houzez_walkscore');
$houzez_walkscore_api = houzez_option('houzez_walkscore_api');
$hide_yelp = houzez_option('houzez_yelp');
$agent_display_option = get_post_meta( $post->ID, 'fave_agent_display_option', true );
$enableDisable_agent_forms = houzez_option('agent_forms');
$prop_detail_nav = houzez_option('prop-detail-nav');
$similer_properties = houzez_option('houzez_similer_properties', 1);
$floor_plans = get_post_meta( $post->ID, 'floor_plans', true );

if( $property_layout == 'v2') {
    $layout = houzez_option('property_blocks_luxuryhomes');
}

$layout = $layout['enabled'];
if( isset( $_GET['prop_nav'] ) ) {
    $prop_detail_nav = $_GET['prop_nav'];
}

if( $prop_detail_nav != 'no' && ( $property_layout == "simple" || $property_layout == 'v2' ) ) {
?>
<div class="property-navigation-wrap project-navigation-wrap">
	<div class="container-fluid">
		<ul class="property-navigation list-unstyled d-flex justify-content-between">
			<li class="property-navigation-item">
				<a class="back-top" href="#main-wrap">
					<i class="houzez-icon icon-arrow-button-circle-up"></i>
				</a>
			</li>
			<?php
            if ($layout): foreach ($layout as $key=>$value) {

                switch($key) {

                    case 'unit':

                        $multi_units  = houzez_get_listing_data('multi_units');
                        if( isset($multi_units[0]['fave_mu_title']) && !empty( $multi_units[0]['fave_mu_title'] ) ) {
                        echo '<li class="property-navigation-item">
							<a class="target" href="#property-sub-listings-wrap">' . houzez_option('sps_sub_listings', 'Sub Listings') . '</a>
						</li>';
                        }
                        break;

                    case 'description':
                        
                        echo '<li class="property-navigation-item">
								<a class="target" href="#project-detail-wrap">' . houzez_option('detail', 'Tổng quan') . '</a>
							</li>';
                        break;


                    case 'address':
                        echo '<li class="property-navigation-item">
								<a class="target" href="#project-utility-wrap">'.houzez_option('utility', 'Tiện ích').'</a>
							</li>';
                        break;

                    case 'details':
                        
                        echo '<li class="property-navigation-item">
								<a class="target" href="#project-investor-wrap">' . houzez_option('investor', 'Chủ đầu tư') . '</a>
							</li>';
                        break;

                    case 'features':
                        
                        echo '<li class="property-navigation-item">
								<a class="target" href="#project-location-wrap">' . houzez_option('location', 'Vị trí dự án') . '</a>
							</li>';
                        break;  

                }

            }

            endif;
            ?>
			
		</ul>
	</div><!-- container -->
</div><!-- property-navigation-wrap -->
<?php } ?>