<?php

/**
 * @block-slug  :   lth-advancedsearch
 * @block-output:   lth_advancedsearch_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-advancedsearch/frontend_callback', 'lth_advancedsearch_output_fe', 10, 2);

if (!function_exists('lth_advancedsearch_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_advancedsearch_output_fe($output, $attributes) {
        ob_start();
?>
<div class="lth-search"> 
    <form role="search" metho="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
        <div class="form-content">
            <div class="form-group">
                <input type="text" name="s" placeholder="<?php echo __('Tìm kiếm...') ?>" class="form-control">
            </div>

            <div class="form-group">
                <select name="term" class="form-control">
                    <option value="0"><?php echo __('--- Chọn danh mục sản phẩm ---'); ?></option>
                    <?php
                    $terms = get_terms('product_cat', 'orderby=name');
                    foreach ($terms AS $term) :
                        echo "<option value='".$term->slug."'".($_GET['publication_categories'] == $term->slug ? ' selected="selected"' : '').">".$term->name."</option>\n";
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <select name="orderby" class="form-control">
                    <option value="menu_order"><?php echo __('--- Sắp xếp theo ---'); ?></option>
                    <option value="date"><?php echo __('Theo sản phẩm mới'); ?></option>
                    <option value="price"><?php echo __('Giá Thấp đến Cao'); ?></option>
                    <option value="price-desc"><?php echo __('Giá Cao đến Thấp'); ?></option>
                    <option value="popularity"><?php echo __('Mức độ phổ biến'); ?></option>
                    <option value="rating"><?php echo __('Điểm đánh giá'); ?></option>
                </select>
            </div>

            <div class="form-group">
                <button class="btn"><?php echo __('Tìm kiếm'); ?><i class="far fa-search icon"></i></button>
                <input type="hidden" name="post_type" value="product">
                <input type="hidden" name="taxonomy" value="product_cat">
            </div>
        </div>    
    </form>
</div>
<?php
        return ob_get_clean();
    }
endif;
?>