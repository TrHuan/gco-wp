<div class="module module__slidershow">
	<div class="module_content">
		<div class="slider-activation slider-style-two owl-carousel">
   			 <?php $i; while( have_rows('slidershow') ): the_row(); ?>

			    <?php
			    	$i++;

	    			$image = get_sub_field('image');
	    			$text_1 = get_sub_field('text_1');
	    			$text_2 = get_sub_field('text_2');
	    			$text_3 = get_sub_field('text_3');

	    			$btn_url = get_sub_field('url');
	    			if( $btn_url ) {
					    $url_btn = $btn_url['url'];
					    $btn_title = $btn_url['title'];
					    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
					}

	    			$top = get_sub_field('top');
	    			$bottom = get_sub_field('bottom');
	    			$left = get_sub_field('left');
	    			$right = get_sub_field('right');
	    		?>

	    		<div class="item item-<?php echo $i; ?>">
	    			<style type="text/css">
						.module__slidershow .item-<?php echo $i; ?> .content {
							position: relative;
							display: flex;
							flex-wrap: wrap;
							justify-content: center;
							align-items: center;
						}								
						.module__slidershow .item-<?php echo $i; ?> .content-box {
							position: absolute;
							top: <?php echo $top; ?>;
							left: <?php echo $left; ?>;
							bottom: <?php echo $bottom; ?>;
							right: <?php echo $right; ?>;
						}
					</style>

	    			<div class="content">
	    				<div class="slide align-center-left fullscreen animation-style-01 bg-image-3 ">
			               <!-- <div class="slider-progress"></div> -->
			               
			                <?php if ($image) { ?>
		    					<?php
									$settings = get_sub_field('settings');
									$width = $settings['image_width'];
									$height = $settings['image_height'];

					    		?>

			    				<div class="content-image">
			    					<a href="<?php echo $url_btn; ?>" target="<?php echo $btn_target; ?>>" title="" class="image">
			    						<img src="<?php echo $image; ?>" alt="Slide" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
			    					</a>
			    				</div>
			    			<?php } ?>

		    				<?php if ($text_1 || $text_2 || $text_3 || $btn_url) { ?>
			    				<div class="content-box <?php echo $animation; ?>">
			    					<?php if ($text_1) { ?>
			    						<p class="text-1"><?php echo $text_1; ?></p>
			    					<?php } ?>

			    					<?php if ($text_2) { ?>
			    						<p class="text-2"><?php echo $text_2; ?></p>
			    					<?php } ?>

			    					<?php if ($text_3) { ?>
			    						<p class="text-3"><?php echo $text_3; ?></p>
			    					<?php } ?>

			    					<!-- <?php if ($btn_url) { ?>
			    						<a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>" title="" class="btn btn-slider">
			    							<?php echo $btn_title; ?>
			    						</a>
			    					<?php } ?> -->
			    				</div>
			    			<?php } ?>
			            </div>	    				
	    			</div>
	    		</div>

    		<?php endwhile; ?>
		</div>
	</div>
</div>