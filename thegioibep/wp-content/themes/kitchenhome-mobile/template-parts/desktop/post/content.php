<div class="item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if (has_post_thumbnail()) { ?>
	        <div class="post-image">
	        	<a href="<?php the_permalink(); ?>" title="" class="image">
		            <img src="<?php echo lth_custom_img('full', 370, 200);?>" alt="<?php the_title(); ?>" width="370" height="200">
		        </a>
	        </div>
	    <?php } ?>

	    <div class="post-content">
	    	<h3 class="post-name">
	    		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a>    		
	    	</h3>

	    	<!-- <div class="post-meta"> -->
	    		<?php //the_time('d/m/Y'); ?>
	    	<!-- </div>	     -->

	    	<div class="post-excerpt">
		    	<?php the_excerpt(); ?>
		    </div>

		    <div class="post-btn">
				<a href="<?php the_permalink(); ?>" rel="nofollow" class="" tabindex="0">
					<?php echo __('Xem thêm'); ?> 
					<i class="icofont-simple-right"></i>
				</a>
			</div>
	    </div>
	</article>
</div>