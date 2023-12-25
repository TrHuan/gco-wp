<?php global $product; ?>

<div class="item-prds__mains">
	<?php if (has_post_thumbnail()) { ?>
	    <div class="img-prds__mains">
	        <a href="#" title="">
	            <img src="<?php echo lth_custom_img('full', 296, 341);?>" width="296" height="341" alt="<?php the_title(); ?>">
	        </a>
	        <div class="intros-prds__hides titles-light__alls"><?php the_excerpt(); ?></div>
	    </div>
    <?php } ?>
    <div class="intros-prds__mains">
        <h3>
        	<a href="#" class="names-prds__mains fs-22s mb-10s">
        		<?php the_title(); ?>        			
        	</a>
        </h3>
        <div class="star-views__prds">
            <p class="rating">
                <span class="rating-box">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span style="width: <?php echo get_field('rating')/5*100; ?>%; overflow: hidden; white-space: nowrap; display: inline-block;">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                </span>
            </p>
            <p class="numbers-views__prds titles-light__alls fs-18s "> <?php echo __('-' . get_field('reviews')); ?> <?php echo __('Reviews'); ?> </p>
        </div>
    </div>
</div>