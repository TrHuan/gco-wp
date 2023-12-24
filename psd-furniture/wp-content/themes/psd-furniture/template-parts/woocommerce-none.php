<?php
/**
 * Template hiển thị khi chưa cài đặt plugin WooCommerce
 * 
 * @author LTH
 * @since 2020
 */

if ( class_exists( 'WooCommerce' ) ) {

	echo wpautop(__('Xin lỗi, không có dữ liệu nào được tìm thấy.'));

} else {

	echo wpautop(__('Bạn chưa cài đặt plugin WooCommerce nên không sử dụng được addon này của theme.'));

}