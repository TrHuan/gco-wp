
<?php $brands = get_sub_field('brands'); 
    if ($brands) {
?>
	<div class="module module_brands">
	    <div class="module_title">
	    	<?php if ($brands['title']) { ?>
				<h2 class="title"><?php echo $brands['title']; ?></h2>
			<?php } ?>
            <?php if ($brands['description']) { ?>
            	<p class="infor"><?php echo $brands['description']; ?></p>
            <?php } ?>
		</div>

	    <div class="module_content">
            <div class="slick-slider slick-brands">

			    <?php
			    	$post_id = $brands['brands'];

			    	if( have_rows('brands', $post_id) ): $i;
			    		while( have_rows('brands', $post_id) ) : the_row(); $i++;
			    			$image = get_sub_field('image');
			    			$title = get_sub_field('title');
			    			$content = get_sub_field('content');

			    			$url = get_sub_field('url');
			    			if( $url ) {
							    $url_img = $url['url'];
							    $url_title = $url['title'];
							    $url_target = $url['target'] ? $url['target'] : '_self';
							}

			    		?>

			    		<div class="item item-<?php echo $i; ?>">
			    			<div class="content">
			    				<div class="content-image">
			    					<a href="<?php if ($url_img) {echo $url_img;} else {echo '#';} ?>" target="<?php echo $target; ?>>" title="" class="image">
			    						<img src="<?php echo $image; ?>" alt="Brands" width="210" height="150">
			    					</a>
			    				</div>

			    				<?php if ($title || $content) { ?>
				    				<div class="content-box <?php echo $animation; ?>">
				    					<?php if ($title) { ?>
				    						<h4 class="text-1"><?php echo $title; ?></h4>
				    					<?php } ?>

				    					<?php if ($content) { ?>
				    						<p class="text-2"><?php echo $content; ?></p>
				    					<?php } ?>
				    				</div>
				    			<?php } ?>
			    			</div>
			    		</div>

			    		<?php endwhile;
					endif;
			    ?>

			</div>
	    </div>
	</div>
<?php } ?>