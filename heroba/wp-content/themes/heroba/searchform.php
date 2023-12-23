<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */
?>

<div class="search-box">
	<div class="open-box d-none">
        <a href="#" title="" data_toggle="menu-content" class="menu-icon">
            <i class="far fa-search icon"></i>
        </a>
    </div>

    <div class="content-box">
        <div class="search-container">
            <div class="close-box d-none">
                <a href="#" title="" data_toggle="menu-content" class="menu-icon">
                    <i class="icofont-close"></i>
                </a>
            </div>

    		<form role="search" metho="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
    			<div class="form-content">
    				<div class="form-group">
    					<input type="text" name="s" placeholder="<?php echo __('Tìm kiếm sản phẩm...') ?>" class="form-control">
    				</div>
    				<div class="form-group">
    					<button class="btn"><i class="far fa-search icon"></i></button>
                        <input type="hidden" name="post_type" value="product">
    					<!-- <input type="hidden" name="post_type" value="product||post||service||project"> -->
    				</div>
    			</div>    
    		</form>
        </div>
    </div>
</div>
