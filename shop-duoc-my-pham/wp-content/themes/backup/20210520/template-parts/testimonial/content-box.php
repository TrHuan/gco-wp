<div class="item">
	<div class="testimonial-box">
		<?php if (has_post_thumbnail()) { ?>
			<div class="testimonial-image">
				<div class="image">
					<img src="<?php echo lth_custom_img('full', 200, 200); ?>" alt="<?php the_title(); ?>" width="200" height="200">
				</div>
			</div>
		<?php } ?>

		<div class="testimonial-content">
			<h4 class="tes-name">
				<?php the_title(); ?>
			</h4>

	        <div class="tes-excerpt"><?php the_excerpt(); ?></div>

			<div class="tes-rating">
				<?php
					$field = get_field_object('rating');
					$value = $field['value'];
				?>
				<div class="star-rating">
					<div style="display: inline-block;">
						<span style="width: <?php echo $value/5*100; ?>%; overflow: hidden; white-space: nowrap; display: inline-block;">
				    		<i class="fas fa-star icon"></i>
				    		<i class="fas fa-star icon"></i>
				    		<i class="fas fa-star icon"></i>
				    		<i class="fas fa-star icon"></i>
				    		<i class="fas fa-star icon"></i>
				    	</span>
					</div>
				</div>
			</div>

	        <div class="tes-content"><?php the_content(); ?></div>
		</div>
	</div>
</div>