
<!--Start single blog item-->
<div class="col-md-4">
    <div class="single-blog-item">
        <div class="img-holder">
        	<?php if (has_post_thumbnail()) { ?>
		        <img src="<?php echo lth_custom_img('full', 370, 250);?>" alt="Awesome Image" width="370" height="250">
		    <?php } ?>
            
            <div class="overlay">
                <div class="box">
                    <div class="content">
                        <a href="<?php the_permalink(); ?>"><i class="fa fa-link" aria-hidden="true"></i></a> 
                    </div>
                </div>
            </div>
        </div>
        <div class="text-holder">
            <a href="<?php the_permalink(); ?>">
                <h3 class="blog-title"><?php the_title(); ?></h3>
            </a>
            <ul class="meta-info">
                <li><i class="fa fa-user" aria-hidden="true"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(	); ?></a></li>
                <li><i class="fa fa-clock-o" aria-hidden="true"></i><a href="#"><?php the_time('F j, Y'); ?></a></li>
            </ul>
            <div class="text">
                <?php the_excerpt(); ?>

                <a class="readmore" href="<?php the_permalink(); ?>"><?php echo __('Xem tiếp'); ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
            </div>
        </div>    
    </div>    
</div>
<!--End single blog item-->