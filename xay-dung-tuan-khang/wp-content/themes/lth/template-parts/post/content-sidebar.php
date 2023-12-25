
<!--Start single blog item-->
    <div class="single-blog-item">
        <div class="img-holder">
        	<?php if (has_post_thumbnail()) { ?>
		        <img src="<?php echo lth_custom_img('full', 370, 250);?>" alt="Awesome Image">
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
                <li><?php the_time('F j, Y'); ?></li>
            </ul>
        </div>    
    </div>  
<!--End single blog item-->