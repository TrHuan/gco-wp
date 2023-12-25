<?php while( have_rows('features', 'options') ): the_row(); ?>
	<div class="module module_features online-support support-styel-two">
		<?php if (get_sub_field('title') || get_sub_field('description')) { ?>
			<div class="module_title section-title text-center mb-50">
	            <h2><?php the_sub_field('title'); ?></h2>
	            <p><?php the_sub_field('description'); ?></p>
	        </div>
	    <?php } ?>

		<div class="module_content">
			<div class="row">
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

					<!-- Single Support Start -->
		            <div class="col-lg-4 item item-<?php echo $i; ?>">
		    			<style type="text/css">
		    				.module__features .item-<?php echo $i; ?> .content {
		    					text-align: <?php echo $text_align; ?>;
		    				}
		    			</style>

		                <div class="single-support mb-all-30">
		                    <div class="support-img">
		                        <?php if ($image_icon) { ?>
		    						<img src="<?php echo $image_icon; ?>" alt="Feature" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
		    					<?php } else { ?>
		    						<i class="<?php echo $class_icon; ?>"></i>
	    					<?php } ?>
		                    </div>
		                    <div class="support-desc">
		                        <h4><?php echo $title; ?></h4>
		                        <p><?php echo $content; ?></p>
		                    </div>
		                </div>
		            </div>
		            <!-- Single Support End -->
		            <?php endwhile; ?>
				<?php endif; ?>
	        </div>
		</div>
	</div>
<?php endwhile; ?>