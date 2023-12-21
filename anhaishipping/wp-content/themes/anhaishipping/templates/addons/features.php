<?php while( have_rows('features') ): the_row(); ?>
	<div class="module module_features">
		<?php if (get_sub_field('title')) { ?>
			<div class="module_title">
				<h2 class="title">
					<?php the_sub_field('title'); ?>
				</h2>
			</div>
		<?php } ?>

		<div class="module_content">
			<div class="slick-slider slick-features">

				<?php if( have_rows('contents') ): $i; ?>
					<?php while( have_rows('contents') ): the_row(); ?>

					    <?php
					    	$i++;
			    			$class_icon = get_sub_field('class_icon');
			    			$image_icon = get_sub_field('image_icon');
			    			$title = get_sub_field('title');
			    			$content = get_sub_field('content');

			    			$btn_url = get_sub_field('button');
			    			if( $btn_url ) {
							    $url_btn = $btn_url['url'];
							    $btn_title = $btn_url['title'];
							    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
							}

							$text_align = get_sub_field('text_align');

			    		?>

			    		<div class="item item-<?php echo $i; ?>">
			    			<style type="text/css">
			    				.module__features .item-<?php echo $i; ?> .content {
			    					text-align: <?php echo $text_align; ?>;
			    				}
			    			</style>

			    			<div class="content">
			    				<?php if ($image_icon || $class_icon) { ?>
				    				<div class="content-image">
				    					<div class="image">
					    					<?php if ($image_icon) { ?>
					    						<?php
													$settings = get_sub_field('settings');
													$width = $settings['image_width'];
													$height = $settings['image_height'];

									    		?>

					    						<img src="<?php echo $image_icon; ?>" alt="Feature" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
					    					<?php } else { ?>
					    						<i class="<?php echo $class_icon; ?>"></i>
				    					<?php } ?>
				    					</div>
				    				</div>
				    			<?php } ?>

			    				<?php if ($title || $content || $btn_url) { ?>
				    				<div class="content-box <?php echo $animation; ?>">
				    					<?php if ($title) { ?>
				    						<h4 class="text-1"><?php echo $title; ?></h4>
				    					<?php } ?>

				    					<?php if ($content) { ?>
				    						<p class="text-2"><?php echo $content; ?></p>
				    					<?php } ?>

				    					<?php if ($btn_url) { ?>
				    						<a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>>" title="" class="btn btn-feature">
				    							<?php echo $btn_title; ?>
				    						</a>
				    					<?php } ?>
				    				</div>
				    			<?php } ?>
			    			</div>
			    		</div>
					<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php endwhile; ?>