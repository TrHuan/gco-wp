<?php 

	// Tạo custom img bằng bfi_thumb
    function lth_custom_img( $thumb_size, $image_width, $image_height ) {
        global $post;
        $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
        $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
        $custom_img_src = bfi_thumb( $imgsrc[0], $params );
        return $custom_img_src;
    }

	// Tạo custom logo bằng bfi_thumb
    function lth_custom_logo( $thumb_size, $image_width, $image_height ) {
        global $post;
        $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
        $imgsrc = get_field('logo', 'option');
        $custom_img_src = bfi_thumb( $imgsrc, $params );
        return $custom_img_src;
    }

    // Tạo custom img brand bằng bfi_thumb
    function lth_brand_box( $thumb_size, $image_width, $image_height ) {
        $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );

        if( have_rows('brands') ): ?> 
            <?php while( have_rows('brands') ): the_row(); ?>
                <div class="item">
                    <div class="brand-box">
                        <?php
                            $url = get_sub_field('url');

                            $img = get_sub_field('image');

                            $custom_img_src = bfi_thumb( $img, $params );
                        ?>
                        
                        <?php if ($img) { ?>
                            <div class="brand-image">
                                <div class="image">
                                    <a href="<?php if ($url) {echo $url;} else {echo '#';} ?>">
                                        <img src="<?php echo $custom_img_src; ?>" alt="Brand" width="<?php echo $image_width ?>" height="<?php echo $image_height ?>">
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif;
    }
    
    // Tạo custom imgs single product bằng bfi_thumb
    function lth_custom_imgs_single_product( $thumb_size, $image_width, $image_height ) {
        global $product;
        $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
        $attachment_ids = $product->get_gallery_image_ids();
        $product_name = get_the_title();

        if ( $attachment_ids && $product->get_image_id() ) {
            echo '<div class="ul">';            
                foreach ( $attachment_ids as $attachment_id ) {
                    $image_link =wp_get_attachment_url( $attachment_id );
                    $custom_img_src = bfi_thumb( $image_link, $params );
                    //Get image show by tag <img> 
                    echo '<div class="item">';
                        echo '<img src="' . $custom_img_src . '" alt="' . $product_name . '">';
                    echo '</div>';
                } 
            echo '</div>';
        } else {
            $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
            $custom_img_src = bfi_thumb( $imgsrc[0], $params );
            echo '<img src="' . $custom_img_src . '" alt="' . $product_name . '">';
        }
    }
?>