
<div class="blog-item">
	<?php if (has_post_thumbnail()) { ?>
    <div class="text-center blog-item-img">
        <a href="<?php the_permalink(); ?>" title="">
            <img src="<?php echo lth_custom_img('full', 355, 226);?>" alt="<?php the_title(); ?>" width="355" height="226">
        </a>
    </div>
    <?php } ?>
    <div class="blog-item-info">
        <h3 class="bold">
        	<a href="<?php the_permalink(); ?>" title="">
	    		<?php the_title(); ?>
	    	</a>
        </h3>
        
        <div class="s15 s15 blog-info-wrap">
            <?php the_excerpt(); ?>
        </div>        
    </div>
    <div class="d-flex align-items-center justify-content-between btime">
        <div class="d-flex align-items-center">
            <span class="s36 t4"><?php the_time('d'); ?></span>
            <span class="s15 t2">
                <span class="d-block"><?php the_time('F'); ?></span> 
                <span class="d-block"><?php the_time('Y'); ?></span>
            </span>
        </div>
        <span class="t2"><?php echo __('By'); ?> <span class="bold"><?php the_author(); ?></span></span>
    </div>
</div>