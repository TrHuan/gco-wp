
<div class="single-recent-post">
	<?php if (has_post_thumbnail()) { ?>
	    <div class="recent-img">
	        <a href="<?php the_permalink(); ?>" title="" class="image">
	            <img src="<?php echo lth_custom_img('full', 100, 86);?>" alt="<?php the_title(); ?>">
	        </a>
	    </div>
    <?php } ?>
    <div class="recent-desc">
        <h6>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	    		<?php the_title(); ?>
	    	</a> 
	    </h6>
        <span><?php the_time('d/m/Y'); ?></span>
    </div>
</div>