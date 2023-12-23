<div class="item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if (has_post_thumbnail()) { ?>
			<?php
				$settings = get_sub_field('settings_image');
				$width = $settings['image_width'];
				$height = $settings['image_height'];

				if ($width) {
					$w = $width;
				}

				if ($height) {
					$h = $height;
				}
			?>

	        <div class="post-image">
	        	<a href="javascript:0" title="" class="image">
		            <img src="<?php echo lth_custom_img('full', $w, $h);?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" alt="<?php the_title(); ?>">
		        </a>
	        </div>
	    <?php } ?>

	    <div class="post-content">
	    	<h3 class="post-name">
	    		<a href="javascript:0" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a>   
	    	</h3>  

	    	<div class="post-excerpt"><?php the_excerpt(); ?></div>

	    	<div class="post-rating">
				<?php
					$field = get_field('rating');
				?>
				<div class="star-rating">
					<div style="display: inline-block;">
						<span style="width: <?php echo $field/5*100; ?>%; overflow: hidden; white-space: nowrap; display: inline-block;">
				    		<i class="fas fa-star icon"></i>
				    		<i class="fas fa-star icon"></i>
				    		<i class="fas fa-star icon"></i>
				    		<i class="fas fa-star icon"></i>
				    		<i class="fas fa-star icon"></i>
				    	</span>
					</div>
				</div>
			</div>

	    	<div class="post-comment"><?php the_content(); ?></div>
	    </div>
	</article>
</div>