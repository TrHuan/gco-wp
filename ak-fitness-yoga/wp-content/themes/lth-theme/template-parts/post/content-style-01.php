
<div class="single-blog">
    <div class="blog-img">
        <a href="<?php the_permalink(); ?>" title="" class="image">
            <img src="<?php echo lth_custom_img('full', 370, 246);?>" width="370" height="246" alt="<?php the_title(); ?>">
        </a>
        <div class="entry-meta">
            <div class="date">
                <p><span><?php the_time('j'); ?></span> <?php echo __('Tháng'); ?> <?php the_time('m Y'); ?></p>
            </div>
        </div>
    </div>
    <div class="blog-content">
        <h4>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	    		<?php the_title(); ?>
	    	</a> 
        </h4>
        <ul class="meta-box">
            <li class="meta-date"><span><i class="fa fa-calendar" aria-hidden="true"></i><?php echo __('Tháng'); ?> <?php the_time('m'); ?>, <?php the_time('j'); ?>, <?php the_time('Y'); ?></span></li>
            <li><i class="fa fa-user" aria-hidden="true"></i><?php echo __('Bởi'); ?> <a href="#"> <?php the_author(	); ?></a></li>
        </ul>
        <?php the_excerpt(); ?>
        <a class="blg-readmore" href="<?php the_permalink(); ?>" title="">
	        <?php echo __('Đọc thêm'); ?>
	    </a>
    </div>
</div>