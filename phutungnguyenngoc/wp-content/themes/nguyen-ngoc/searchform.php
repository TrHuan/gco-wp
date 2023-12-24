<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */
?>

<div class="search-box">
	<div class="search-open">
		<a href="<?php echo esc_url(home_url('/tim-kiem')); ?>" title="" class="open-icon" data_toggle="search-content">
			<label><?php echo __('Tìm kiếm '); ?></label>
			<i class="icofont-search-1"></i>
		</a>
	</div>

	<!-- <div class="search-content">
		<div class="search-close">
			<a href="#" title="" class="close-icon" data_toggle="search-content">
				<i class="icofont-close"></i>
			</a>
		</div>

		<form role="search" metho="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
			<div class="form-content">
				<div class="form-group">
					<input type="text" name="s" placeholder="<?php echo __('Search...') ?>" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-search"><i class="icofont-search-1"></i></button>
					<input type="hidden" name="post_type" value="product||post||project">
				</div>
			</div>    
		</form>
	</div> -->
</div>