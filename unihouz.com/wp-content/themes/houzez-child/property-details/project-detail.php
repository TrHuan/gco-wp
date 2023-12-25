<?php
$prop_id = houzez_get_listing_data('property_id');
?>

<div class="project-wrap-detail">
	<div class="block-title-wrap">
		<h2><?php esc_html_e('Thông số chi tiết', 'houzez'); ?></h2>
	</div><!-- block-title-wrap -->
	<div class="block-content-wrap">
		<ul class="item-amenities item-amenities-with-icons">
			<?php 
				$field = get_field_object('project_status');
				$status = $field['value'];
			?>
				<li>
					<span class="label"> <?php esc_html_e('Trạng thái', 'houzez') ?> </span>
					<?php if ($status) { ?>
						<span class="field"><?php esc_html_e('Đang mở bán', 'houzez') ?> </span>
					<?php } else { ?>
						<span class="field"><?php esc_html_e('Chưa mở bán', 'houzez') ?> </span>
					<?php } ?>
				</li> 
			
			<?php if (get_field('project_date')) { ?>
				<li>
					<span class="label"> <?php esc_html_e('Thời gian giao nhà', 'houzez') ?> </span>
					<span class="field"><?php echo get_field('project_date'); ?> </span>
				</li> 
			<?php } ?>
			<?php if (get_field('project_foor')) { ?>
				<li>
					<span class="label"> <?php esc_html_e('Số tầng', 'houzez') ?> </span>
					<span class="field"><?php echo get_field('project_foor'); ?> </span>
				</li> 
			<?php } ?>
			<?php if (get_field('project_shophouse')) { ?>
				<li>
					<span class="label"> <?php esc_html_e('Số Shophouse', 'houzez') ?> </span>
					<span class="field"><?php echo get_field('project_shophouse'); ?> </span>
				</li> 
			<?php } ?>
			<?php if (get_field('project_investor')) { ?>
				<li>
					<span class="label"> <?php esc_html_e('Chủ đầu tư', 'houzez') ?> </span>
					<span class="field"><?php echo get_field('project_investor'); ?> </span>
				</li> 
			<?php } ?>
			<?php if (get_field('project_type')) { ?>
				<li>
					<span class="label"> <?php esc_html_e('Loại hình', 'houzez') ?> </span>
					<span class="field"><?php echo get_field('project_type'); ?> </span>
				</li>
			<?php } ?>
			<?php if (get_field('project_block')) { ?>
				<li>
					<span class="label"> <?php esc_html_e('Số block', 'houzez') ?> </span>
					<span class="field"><?php echo get_field('project_block'); ?> </span>
				</li>
			<?php } ?>
			<?php if (get_field('project_apartment')) { ?>
				<li>
					<span class="label"> <?php esc_html_e('Số căn hộ', 'houzez') ?> </span>
					<span class="field"><?php echo get_field('project_apartment'); ?> </span>
				</li>
			<?php } ?>
			<?php if (get_field('project_area')) { ?>
				<li>
					<span class="label"> <?php esc_html_e('Diện tích toàn căn hộ', 'houzez') ?> </span>
					<span class="field"><?php echo get_field('project_area'); ?> </span>
				</li>
			<?php } ?>
			
			<?php if (get_field('project_price')) { ?>
				<li>
					<span class="label"> <?php esc_html_e('Giá', 'houzez') ?> </span>
					<span class="field"><?php echo get_field('project_price'); ?></span>
				</li>
			<?php } else { ?>
				<li>
					<span class="label"> <?php esc_html_e('Giá', 'houzez') ?>  </span>
					<span class="field"><?php esc_html_e('Đang cập nhật', 'houzez') ?></span>
				</li>
			<?php } ?>
		</ul> 
	</div>
</div><!-- property-overview-wrap -->