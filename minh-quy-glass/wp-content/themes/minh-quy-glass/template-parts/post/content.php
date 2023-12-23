
<div class="item">
	<div class="content">
		<?php if (has_post_thumbnail()) { ?>
		<div class="content-image">
			<div class="image">
				<a href="<?php the_permalink(); ?>" title="">
		            <img src="<?php echo lth_custom_img('full', 330, 180);?>" alt="<?php the_title(); ?>" width="330" height="180">
		        </a>
			</div>
		</div>
		<?php } ?>

		<div class="content-box">
			<h3 class="content-name">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a> 
			</h3>

			<div class="content-date">
				<?php the_time('F j, Y'); ?>
			</div>

			<div class="content-infor">
				<?php the_excerpt(); ?>
			</div>

			<div class="content-button">
				<a class="button btn btn-read-more" href="<?php the_permalink(); ?>" title="">
			        <?php echo __('Chi tiết'); ?> <i class="icofont-thin-right icon"></i>
			    </a>
			</div>
		</div>
	</div>
</div>