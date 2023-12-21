<?php while( have_rows('brands') ): the_row(); ?>
	<div class="module module_brands">
		<div class="module_title">
			<h2 class="title">
				<?php the_sub_field('title'); ?>
			</h2>
			<p class="info">
				<?php the_sub_field('description'); ?>
			</p>
		</div>

		<div class="module_content">
			<div class="slick-slider slick-brands">

			    <?php
			    	if( have_rows('contents') ): $i;
			    		while( have_rows('contents') ) : the_row(); $i++;
			    			$image = get_sub_field('image');
			    			$title = get_sub_field('title');
			    			$content = get_sub_field('content');

			    			$url = get_sub_field('url');
			    			if( $url ) {
							    $url_img = $url['url'];
							    $url_title = $url['title'];
							    $url_target = $url['target'] ? $url['target'] : '_self';
							}
							
							$settings = get_sub_field('settings');
							$width = $settings['image_width'];
							$height = $settings['image_height'];

			    		?>

			    		<div class="item item-<?php echo $i; ?>">
			    			<div class="content">
			    				<div class="content-image">
			    					<a href="<?php echo $url_img; ?>" target="<?php echo $target; ?>>" title="" class="image">
			    						<img src="<?php echo $image; ?>" alt="Brands" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
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
<?php endwhile; ?>