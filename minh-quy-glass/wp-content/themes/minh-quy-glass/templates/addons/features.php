
<div class="module module_features">
	<?php if (get_sub_field('title') || get_sub_field('description')) { ?>
		<div class="module_title">
			<?php if (get_sub_field('title')) { ?>
				<h2 class="title">
					<?php the_sub_field('title'); ?>
				</h2>
			<?php } ?>
			<?php if (get_sub_field('description')) { ?>
				<p class="info">
					<?php the_sub_field('description'); ?>
				</p>
			<?php } ?>
		</div>
	<?php } ?>

    <div class="module_content">
        <div class="slick-slider slick-features">

        	<?php
		    	$post_id = get_sub_field('features');

		    	if( have_rows('features', $post_id) ): $i;
		    		while( have_rows('features', $post_id) ) : the_row(); $i++;
		    			$class_icon = get_sub_field('class_icon');
		    			$image_icon = get_sub_field('image_icon');
		    			$title = get_sub_field('title');
		    			$content = get_sub_field('content');

						$text_align = get_sub_field('text_align');
		    		?>

		    		<div class="item item-<?php echo $i; ?>">
		    			<style type="text/css">
		    				.module_features .item-<?php echo $i; ?> {
		    					text-align: <?php echo $text_align; ?>;
		    				}
		    				.module_features .content-image {
	    						display: flex;
	    						flex-wrap: wrap;
	    					}
		    			</style>

		    			<?php if ($text_align == 'center') { ?>
		    				<style type="text/css">
		    					.module_features .content-image {
		    						justify-content: center;
		    					}
		    				</style>
		    			<?php } ?>

		    			<?php if ($text_align == 'right') { ?>
		    				<style type="text/css">
		    					.module_features .content-image {
		    						justify-content: flex-end;
		    					}
		    				</style>
		    			<?php } ?>

		    			<div class="content">
		                    <?php if ($image_icon || $class_icon) { ?>
			    				<div class="content-image">
			    					<?php if ($image_icon) { ?>
			    						<img src="<?php echo $image_icon; ?>" alt="Feature" width="80" height="80">
			    					<?php } else { ?>
			    						<i class="<?php echo $class_icon; ?>"></i>
			    					<?php } ?>
			    				</div>
			    			<?php } ?>
			    			<?php if ($title || $content) { ?>
			                    <div class="content-box">
			                        <h3><?php echo $title; ?> <span><?php echo $content; ?></span></h3>
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