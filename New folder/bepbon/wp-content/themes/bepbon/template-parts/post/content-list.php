<div class="item">
	<article class="post-box">

		<?php if (has_post_thumbnail()) { ?>
	        <div class="post-image">
	        	<a href="<?php the_permalink(); ?>" title="" class="image">
		            <img src="<?php echo lth_custom_img('full', 404, 228);?>" width="404" height="228" alt="<?php the_title(); ?>">
		        </a>
	        </div>
	    <?php } ?>

	    <div class="post-content">
	    	<ul class="post-meta">
			    <li>
			        <i class="fal fa-calendar-alt icon"></i> <span><?php the_time('d'); ?> <?php echo __('Thg '); the_time('m,'); ?> <?php the_time('Y'); ?></span>
			    </li>

			    <li class="poster">
			        <span><?php the_author(	); ?></span>
			    </li>
	    	</ul>	    

	    	<h3 class="post-name">
	    		<a href="<?php the_permalink(); ?>" title="">
		    		<?php the_title(); ?>
		    	</a>    		
	    	</h3>

		    <div class="post-excerpt">
		    	<?php the_excerpt(); ?>		    	
		    </div>

		    <div class="post-button">
		    	<a href="<?php the_permalink(); ?>" title=""><?php echo __('Đọc thêm') ?></a>
		    </div>
	    </div>
	</article>
</div>