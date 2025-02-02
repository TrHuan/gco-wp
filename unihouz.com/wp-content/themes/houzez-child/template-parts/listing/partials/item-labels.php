<?php
$term_id = '';
$term_status = wp_get_post_terms( get_the_ID(), 'property_status', array("fields" => "all"));

$label_id = '';
$term_label = wp_get_post_terms( get_the_ID(), 'property_label', array("fields" => "all"));

$enable_status = houzez_option('disable_status', 1);
$enable_label = houzez_option('disable_label', 1);

if( $enable_status || $enable_label ) {
?>
<div class="labels-wrap labels-right"> 

	<?php 
	
	echo '<div class="hz-label">';
		if( !empty($term_label) && $enable_label ) {
			foreach( $term_label as $label ) {
				$label_id = $label->term_id;
				$label_name = $label->name;
				echo '<a href="'.get_term_link($label_id).'" class="label label-color-'.intval($label_id).'">
						'.esc_attr($label_name).'
					</a>';
			}
		}
	echo '</div>';

	echo '<div class="label-status">';
		if( !empty($term_status) && $enable_status ) {
			foreach( $term_status as $status ) {
				$status_id = $status->term_id;
				$status_name = $status->name;
				if ( $status_name ) {
					echo '<a href="'.get_term_link($status_id).'" class=" label status-color-'.intval($status_id).'">
						'.esc_attr($status_name).'
					</a>';
				}
				
			}
		} else {
			echo '<div class="label no-status">Chưa mở bán</div>';
		}

	echo '</div>';

	?>       

</div>
<?php } ?>