<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="single-service-item">
        <div class="img-holder">
        	<?php if (has_post_thumbnail()) { ?>
		        <img src="<?php echo lth_custom_img('full', 370, 180);?>" alt="Awesome Image" width="370" height="180">
		    <?php } ?>
            
            <div class="overlay">
                <div class="box">
                    <div class="content">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-holder">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>

            <?php the_excerpt(); ?>

            <a class="readmore" href="<?php the_permalink(); ?>">Xem tiếp</a>
        </div>    
    </div>
</div>