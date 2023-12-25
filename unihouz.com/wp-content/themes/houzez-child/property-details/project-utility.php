<?php
global $post;
/*$google_map_address = get_post_meta($post->ID, 'fave_property_location', true);
$google_map_lat = get_post_meta($post->ID, 'houzez_geolocation_lat', true);
$google_map_lng = get_post_meta($post->ID, 'houzez_geolocation_long', true);
$google_map_address_url     =   "https://maps.google.com/?q=".$google_map_lat.','.$google_map_lng;*/
// $google_map_address = houzez_get_listing_data('property_map_address');
// $google_map_address_url = "http://maps.google.com/?q=".$google_map_address;
?>
<div class="project-utility-wrap" id="project-utility-wrap">
	<div class="block-title-wrap">
		<h2><?php esc_html_e('Tiện ích', 'houzez'); ?></h2>
	</div>

	<div class="block-content-wrap">
		<?php if( have_rows('project_utility') ): ?>
			<ul>
				<?php while( have_rows('project_utility') ): the_row(); 
					$content = get_sub_field('content_utility');
				?>
					<li><?php echo $content; ?></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div><!-- block-content-wrap -->
</div><!-- property-address-wrap -->