<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */
?>

<div class="search-box">
	<a href="#"><img src="<?php echo ASSETS_URI; ?>/img/icons/search2.png" alt="search-img"></a>

	<form role="search" metho="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
		<div class="form-content">
			<div class="form-group">
				<input type="text" name="s" placeholder="<?php echo __('Nhập từ khóa tìm kiếm') ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<button type="submit" class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				<input type="hidden" name="post_type" value="product||post">
				<!-- <input type="hidden" name="post_type" value="product||post||service||project"> -->
			</div>
		</div>    
	</form>
</div>
