<?php
/**
 * Box search
 * 
 * @author le-trong-huan (trhuan177@gmail.com)
 * @since 2020
 */
?>

<div class="search-box">
	<div class="content-box">
		<div class="search-container">
			<div class="search-close" >
				<i class="icofont-close icon icon"></i>
			</div>
				
			<form role="search" metho="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
				<div class="form-content">
					<div class="form-group">
						<input type="text" name="s" placeholder="<?php echo __('Tìm kiếm...') ?>" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-search" aria-label="Search"><i class="icofont-search icon"></i></button>
						<input type="hidden" name="post_type" value="product||post">
					</div>
				</div>    
			</form>
		</div>
	</div>
</div>