<?php
/**
 * Pagination
 * 
 * @author LTH
 * @since 2020
 */

?>

<div class="pagination">
    <button class="btn-load-more product-load-more">
        <?php echo __('Xem thêm'); ?>                                                
    </button>
</div>

<script>
    jQuery(document).ready(function(){
        var offset = 3; // khái báo số lượng bài viết đã hiển thị
        jQuery('.product-load-more').click(function(event) {
            jQuery.ajax({ // Hàm ajax
                type : "post", //Phương thức truyền post hoặc get
                dataType : "html", //Dạng dữ liệu trả về xml, json, script, or html
                url : '<?php echo admin_url('admin-ajax.php');?>', // Nơi xử lý dữ liệu
                data : {
                    action: "productloadmore", //Tên action, dữ liệu gởi lên cho server
                    offset: offset, // gởi số lượng bài viết đã hiển thị cho server
                },
                
                success: function(response) {
                    jQuery('.products .groups-box').append(response);
                    offset = offset + 6; // tăng bài viết đã hiển thị

                    if (response == '') {
                        jQuery('.product-load-more').hide();
                    }
                }

           });
        });
    });
</script>