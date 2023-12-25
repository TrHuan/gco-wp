<?php
/**
 * Box search
 * 
 * @author le-trong-huan (trhuan177@gmail.com)
 * @since 2020
 */
?>

<div class="search-box">
	<div class="search">
        <form role="search" metho="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
            <input type="text" placeholder="<?php echo __('Từ khóa tìm kiếm'); ?>">
            <button aria-label="Search"><i class="fa fa-search"></i> <span class="d-none"><?php echo __('Search'); ?></span></button>
            <input type="hidden" name="post_type" value="product||post">
        </form>
    </div>
</div>