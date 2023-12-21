<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>
<!-- <a href="#show_content" class="showmore_content btn-viewmore" id="show_content">Xem thêm nội dung</a> 
<a href="#hide_content" class="hideless_content btn-viewmore" id="hide_content">Thu gọn nội dung</a>
<div class="panel_viewmore_content">

</div>
<div class="fade_viewmore_content"></div> -->
<?php the_content(); ?>
