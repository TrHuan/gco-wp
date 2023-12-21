<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */
?>

<form role="search" metho="get" action="<?php echo HOME_URI; ?>" class="position-relative">
    <input class="email" placeholder="Sản phẩm tìm kiếm" name="email" type="text" required="required">
    <button type="submit" class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    <input type="hidden" name="post_type" value="product">
</form>