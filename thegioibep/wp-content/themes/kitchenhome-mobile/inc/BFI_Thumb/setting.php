<?php

function lth_remove_unused_image_size( $sizes) { 
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
    unset( $sizes['post-thumbnail']);
    unset( $sizes['twentyfourteen-full-width']);
}
add_filter('intermediate_image_sizes_advanced', 'remove_unused_image_size');

function lth_custom_img( $thumb_size, $image_width, $image_height ) { 
    global $post; 
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );   
    $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
    $custom_img_src = bfi_thumb( $imgsrc[0], $params );   
    return $custom_img_src;   

	///// gọi hình ảnh (đặt code ở vị trí muốn hiển thị ảnh)
	/* <img src="<?php echo lth_custom_img('full', 300, 300);?>"> */
}
    
// Tạo custom imgs single product bằng bfi_thumb
function lth_custom_imgs_single_product_mobile( $thumb_size, $image_width, $image_height ) {
    global $product;
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
    $attachment_ids = $product->get_gallery_image_ids();
    $product_name = get_the_title();

    if ( $attachment_ids && $product->get_image_id() ) {
        echo '<div class="swiper-wrapper">';            
            foreach ( $attachment_ids as $attachment_id ) {
                $image_link =wp_get_attachment_url( $attachment_id );
                $custom_img_src = bfi_thumb( $image_link, $params );
                //Get image show by tag <img> 
                echo '<div class="swiper-slide">';
                    echo '<a title="" href="' . $image_link . '" data-fancybox="">';
                        echo '<img src="' . $image_link . '" alt="' . $product_name . '">';
                    echo '</a>';
                echo '</div>';
            } 
        echo '</div>';
    } else {
        $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
        $custom_img_src = bfi_thumb( $imgsrc[0], $params );
        echo '<div class="swiper-wrapper">';
            echo '<div class="swiper-slide">';
                echo '<a title="" href="' . $custom_img_src . '" data-fancybox="">';
                    echo '<img src="' . $custom_img_src . '" alt="' . $product_name . '">';
                echo '</a>';
            echo '</div>';
        echo '</div>';
    }
}