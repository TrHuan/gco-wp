<?php
	$post_id            = get_the_ID();
	$post_title 		= get_the_title($post_id);
	// $post_content 		= wpautop(get_the_content($post_id));
	$post_date 			= get_the_date('d/m/Y',$post_id);
	$post_link 			= get_permalink($post_id);
	$post_image 		= getPostImage($post_id,"p-post");
	$post_excerpt 		= cut_string(get_the_excerpt($post_id),150,'...');
	$post_author 		= get_the_author_meta( 'nicename', get_the_author_meta( get_the_author() ) );
	$post_tag 			= get_the_tags($post_id);

    //field
    // $s_service_icon_thumbnail = get_field('s_service_icon_thumbnail');
?>

<div class="col-lg-4 col-md-6 col-sm-6">
    <article class="text-center spage-item">
        <figure class="service-img">
        	<a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
        		<img src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>">
        	</a>
        </figure>
        <figcaption class="service-info">

<!--             <div class="text-center">
                <?php if(!empty( $s_service_icon_thumbnail )) { ?>
            	<img src="<?php echo $s_service_icon_thumbnail; ?>" alt="<?php echo $post_title; ?>">
                <?php } ?>
            </div> -->

            <h2 class="f2 bold s18 mt-5 service-tit">
            	<a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
            		<?php echo $post_title; ?>
            	</a>
            </h2>
            <div class="service-content">
                <p><?php echo $post_excerpt; ?></p>
            </div>
            <a href="<?php echo $post_link; ?>" title="" class="btn read-btn">Đọc Thêm</a>
        </figcaption>
    </article>
</div>