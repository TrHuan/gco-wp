<div class="sort-by">
	<div class="d-flex align-items-center">
		<div class="sort-by-title">
			<?php esc_html_e('Sắp xếp theo', 'houzez'); ?>:
		</div><!-- sort-by-title -->  
		<select id="sort_review" class="selectpicker form-control bs-select-hidden" title="" data-live-search="false" data-dropdown-align-right="auto">
            <option value=""><?php esc_html_e( 'Default Order', 'houzez' ); ?></option>
            <option value="a_date"><?php esc_html_e( 'Date Old to New', 'houzez' ); ?></option>
            <option value="d_date"><?php esc_html_e( 'Date New to Old', 'houzez' ); ?></option>
            <option value="a_rating"><?php esc_html_e( 'Xếp hạng (Thấp đến cao)', 'houzez' ); ?></option>
            <option value="d_rating"><?php esc_html_e( 'Xếp hạng (Cao xuống thấp)', 'houzez' ); ?></option>
        </select>
	</div><!-- d-flex -->
</div><!-- sort-by -->