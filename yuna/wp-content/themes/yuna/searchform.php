<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */

$header = get_field('header', 'option');
$search_icon = $header['search_icon'];
?>

<a href="#" title="" data-toggle="dropdown"><img src="<?php echo $search_icon; ?>" alt="" title=""></a>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <div class="dropdown-item d-flex align-items-center">
        <form action="" class="trans d-flex align-items-center search-frm">
            <input type="text" name="s" placeholder="<?php echo __('Nhập từ khóa...') ?>" class="form-control light s14 search-ip">
            <button type="submit" class="btn search-btn"><img src="<?php echo $search_icon; ?>" alt="" title=""></button>
			<input type="hidden" name="post_type" value="product||post||project">
        </form>
    </div>
</div>