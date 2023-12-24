
 <div class="single-best-seller">
    <div class="best-seller-img">
        <a href="<?php the_permalink(); ?>" title="" class="image">
            <img src="<?php echo lth_custom_img('full', 300, 300);?>" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="best-seller-text">
        <h3>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	    		<?php the_title(); ?>
	    	</a> 
        </h3>
        <span><?php the_time('d/m/Y'); ?></span>
    </div>
</div>