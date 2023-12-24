<div class="item">
	<div class="testimonial-box">
		<div class="testimonial-header">
			<div class="tes-excerpt"><?php echo __('Câu chuyện thành công'); ?></div>

			<h4 class="tes-name">
				<?php the_title(); ?>
			</h4>

		    <div class="tes-excerpt">
		    	<?php if ( has_excerpt() ) { the_excerpt(); } else { echo ''; } ?>		    	
		    </div>
		</div>

		<?php if (has_post_thumbnail() || get_the_content()) { ?>
			<div class="testimonial-image">
				<div class="image-content">
					<div class="image">
						<img src="<?php echo lth_custom_img('full', 370, 238); ?>" alt="Dịch vụ SEO" title="Dịch vụ SEO" width="370" height="238">
					</div>

					<div class="tes-content"><?php the_content(); ?></div>

					<div class="tes-use"><?php the_field('use'); ?></div>
				</div>
			</div>
		<?php } ?>

		<div class="testimonial-content">
			<!-- <div class="tes-rating">
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
			</div> -->

	       <p class="tes-excerpt"><?php echo __('Số liệu thống kê'); ?></p>
	       <p class="top-google">
	       		<span><?php the_field('top_google'); ?></span>
	       		<small><?php echo __('Lọt top Google'); ?></small>
	       </p>
	       <p class="kpis">
	       		<span><?php the_field('kpis'); ?></span>
	       		<small><?php echo __('KPIs cam kết'); ?></small>
	       </p>
		</div>
	</div>
</div>