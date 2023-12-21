<?php
	global $data_page_banner;
	
	if(!empty( $data_page_banner )) {
		$image_link_check 	= get_field('page_banner', 'option');
		$image_link 		= (!empty($image_link_check)) ? $image_link_check : asset('images/banner.jpg');
		$image_alt 			= $data_page_banner['image_alt'];
	}
?>

<section class="banner" style="background: url(<?php echo $image_link; ?>) no-repeat center center; background-size: cover">
    <div class="container">
        <h2 class="f2 bold text-white s24 banner-tit"><?php echo $image_alt; ?></h2>

        <div class="bread list-unstyled">
	        <?php
	            if(function_exists('bcn_display')) { 
	                echo '<a href="' . site_url() . '">Trang chủ </a> /';
	                bcn_display(); 
	            }
	        ?>
	    </div>
    </div>
</section>