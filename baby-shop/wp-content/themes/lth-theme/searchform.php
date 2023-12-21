<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */
?>


<form role="search" metho="get" class="forms search-form vk-header__search" action="<?php echo HOME_URI; ?>">
    <div class="vk-form vk-form--search">
        <input type="text" class="form-control" placeholder="Từ khóa tìm kiếm">
        <button class="vk-btn vk-btn--blue-1"><i class="ti-search"></i></button>
        <input type="hidden" name="post_type" value="product">
    </div>
</form>
