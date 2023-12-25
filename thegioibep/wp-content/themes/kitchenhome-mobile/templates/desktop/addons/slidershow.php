<div class="module module__slidershow">
  	<div class="module_content">
    	<div class="slick-slidershow">
			<?php if( have_rows('slidershow') ): ?>
			<?php while( have_rows('slidershow') ): the_row(); ?>
			<?php
				$slideimage = get_sub_field('image');
			?>
      		<div class="item">
        		<div class="content">
          			<?php if ($slideimage) { ?>
          				<div class="content-image">
            				<div class="image">
              					<img src="<?php echo $slideimage; ?>" alt="Slide" width="1903" height="800">
            				</div>
          				</div>
          			<?php } ?>
        		</div>
      		</div>
      		<?php endwhile; endif; ?>
    	</div>
  	</div>
</div>