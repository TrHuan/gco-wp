<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */
?>

<form role="search" metho="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
	<div class="form-content">
		<div class="form-group">
			<input type="search" name="s" placeholder="<?php echo __('Tìm kiếm...') ?>" class="form-control" required >
			
			<button class="btn" aria-hidden="true"><span class="icon fa fa-search"></span></button>
			<input type="hidden" name="post_type" value="product||post">
		</div>
	</div>    
</form>
