<?php
global $post;

$sortby = '';
if( isset( $_GET['sortby'] ) ) {
    $sortby = $_GET['sortby'];
}
$sort_id = 'sort_properties';
if(houzez_is_half_map()) {
	$sort_id = 'ajax_sort_properties';
}
?>
<div class="sort-by">
	<div class="d-flex align-items-center">
		<div class="sort-by-title">
			<?php esc_html_e( 'Sort by:', 'houzez' ); ?>
		</div><!-- sort-by-title -->  
		<select id="<?php echo esc_attr($sort_id); ?>" class="selectpicker form-control bs-select-hidden" title="<?php esc_html_e( 'Sắp xếp mặc định', 'houzez' ); ?>" data-live-search="false" data-dropdown-align-right="auto">
			<option value=""><?php esc_html_e( 'Sắp xếp mặc định', 'houzez' ); ?></option>
			<option <?php selected($sortby, 'a_price'); ?> value="a_price"><?php esc_html_e('Giá - Từ thấp đến cao', 'houzez'); ?></option>
            <option <?php selected($sortby, 'd_price'); ?> value="d_price"><?php esc_html_e('Giá - Từ cao xuống thấp', 'houzez'); ?></option>
            
            <option <?php selected($sortby, 'featured_first'); ?> value="featured_first"><?php esc_html_e('Nổi bật', 'houzez'); ?></option>
            
            <option <?php selected($sortby, 'a_date'); ?> value="a_date"><?php esc_html_e('Theo ngày - Cũ trước', 'houzez' ); ?></option>
            <option <?php selected($sortby, 'd_date'); ?> value="d_date"><?php esc_html_e('Theo ngày - Mới trước', 'houzez' ); ?></option>
		</select><!-- selectpicker -->
	</div><!-- d-flex -->
</div><!-- sort-by -->