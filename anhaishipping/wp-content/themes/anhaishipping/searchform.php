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
			<input type="text" name="s" placeholder="<?php echo __('Search...') ?>" class="form-control">
		</div>
		<div class="form-group">
			<button class="btn"><?php echo __('Search') ?></button>
			<input type="hidden" name="post_type" value="product||post||service||project">
		</div>
	</div>    
</form>
