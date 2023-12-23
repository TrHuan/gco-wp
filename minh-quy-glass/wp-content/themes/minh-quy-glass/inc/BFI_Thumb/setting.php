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
function lth_custom_imgs_single_product( $thumb_size, $image_width, $image_height ) {
    global $product;
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
    $attachment_ids = $product->get_gallery_image_ids();
    $product_name = get_the_title();

    if ( $attachment_ids && $product->get_image_id() ) {
        foreach ( $attachment_ids as $attachment_id ) {
            $image_link =wp_get_attachment_url( $attachment_id );
            $custom_img_src = bfi_thumb( $image_link, $params );
            //Get image show by tag <img> 
            echo '<div class="item">';
                echo '<img src="' . $custom_img_src . '" alt="' . $product_name . '">';
            echo '</div>';
        } 
    } else {
        $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
        $custom_img_src = bfi_thumb( $imgsrc[0], $params );
        echo '<img src="' . $custom_img_src . '" alt="' . $product_name . '">';
    }
}

function lth_custom_img_other_products( $thumb_size, $image_width, $image_height ) { 
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );

    $other_products = get_field('other_products');
    if( $other_products ):
        $products = $other_products['content'];

        foreach( $products as $pr ): 
            $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $pr, '' ), $thumb_size );
            $custom_img_src = bfi_thumb( $imgsrc[0], $params ); ?>

            <div class="item">
                <div class="content">
                    <?php if (has_post_thumbnail( $pr )) { ?>
                    <div class="content-image">
                        <a href="<?php the_permalink( $pr ); ?>" title="" class="image">
                            <img src="<?php echo $custom_img_src; ?>" alt="<?php the_title( $pr ); ?>">
                        </a>
                    </div>
                    <?php } ?>

                    <div class="content-box">
                        <h3 class="content-name">
                            <a href="<?php the_permalink( $pr ); ?>" title="<?php echo get_the_title( $pr ); ?>">
                                <?php echo get_the_title( $pr ); ?>
                            </a> 
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; 
    endif; 
}

function lth_custom_img_other_blogs( $thumb_size, $image_width, $image_height ) { 
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );

    $other_blogs = get_field('other_blogs');
    if( $other_blogs ):
        $blogs = $other_blogs['content'];

        foreach( $blogs as $bl ): 
            $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $bl, '' ), $thumb_size );
            $custom_img_src = bfi_thumb( $imgsrc[0], $params ); ?>

            <div class="item">
                <div class="content">
                    <?php if (has_post_thumbnail( $bl )) { ?>
                    <div class="content-image">
                        <a href="<?php the_permalink( $bl ); ?>" title="" class="image">
                            <img src="<?php echo $custom_img_src; ?>" alt="<?php the_title( $bl ); ?>">
                        </a>
                    </div>
                    <?php } ?>

                    <div class="content-box">
                        <h3 class="content-name">
                            <a href="<?php the_permalink( $bl ); ?>" title="<?php echo get_the_title( $bl ); ?>">
                                <?php echo get_the_title( $bl ); ?>
                            </a> 
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; 
    endif; 
}

function lth_custom_img_other_bao_gia( $thumb_size, $image_width, $image_height ) { 
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );

    $other_bao_gia = get_field('other_bao_gia');
    if( $other_bao_gia ):
        $bao_gia = $other_bao_gia['content'];

        foreach( $bao_gia as $bg ): 
            $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $bg, '' ), $thumb_size );
            $custom_img_src = bfi_thumb( $imgsrc[0], $params ); ?>

            <div class="item">
                <div class="content">
                    <?php if (has_post_thumbnail( $bg )) { ?>
                    <div class="content-image">
                        <a href="<?php the_permalink( $bg ); ?>" title="" class="image">
                            <img src="<?php echo $custom_img_src; ?>" alt="<?php the_title( $bg ); ?>">
                        </a>
                    </div>
                    <?php } ?>

                    <div class="content-box">
                        <h3 class="content-name">
                            <a href="<?php the_permalink( $bg ); ?>" title="<?php echo get_the_title( $bg ); ?>">
                                <?php echo get_the_title( $bg ); ?>
                            </a> 
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; 
    endif; 
}

function lth_custom_imgs_single_project( $thumb_size, $image_width, $image_height ) {
    global $product;
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
    
    $images = get_field('gallery_project');
    if( $images ) {
        foreach( $images as $image ):
            $custom_img_src = bfi_thumb( $image, $params ); ?>

            <div class="item">
                <div class="image">
                    <img src="<?php echo $custom_img_src; ?>" alt="Image">
                </div>
            </div>
        <?php endforeach;
    }    
}

function lth_custom_img_other_projects( $thumb_size, $image_width, $image_height ) { 
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );

    $other_projects = get_field('other_projects');
    if( $other_projects ):
        $projects = $other_projects['content'];

        foreach( $projects as $prj ): 
            $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $prj, '' ), $thumb_size );
            $custom_img_src = bfi_thumb( $imgsrc[0], $params ); ?>

            <div class="item">
                <div class="content">
                    <?php if (has_post_thumbnail( $prj )) { ?>
                    <div class="content-image">
                        <a href="<?php the_permalink( $prj ); ?>" title="" class="image">
                            <img src="<?php echo $custom_img_src; ?>" alt="<?php the_title( $prj ); ?>">
                        </a>
                    </div>
                    <?php } ?>

                    <div class="content-box">
                        <h3 class="content-name">
                            <a href="<?php the_permalink( $prj ); ?>" title="<?php echo get_the_title( $prj ); ?>">
                                <?php echo get_the_title( $prj ); ?>
                            </a> 
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; 
    endif; 
}