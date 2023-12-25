
<!--Start single slide item-->
<div class="single-slide-item">
    <div class="img-box">
        <img src="<?php echo lth_custom_img('full', 394, 264);?>" alt="Awesome Image" width="394" height="264">
        <div class="client-photo">
            <img src="<?php the_field('avata'); ?>" alt="Awesome Image" width="90" height="90">
        </div>
        <div class="review-box">
            <span><?php echo __('Đánh giá:'); ?></span>

            <div style="display: inline-block;">
            	<?php
					$field = get_field('rating');
				?>
				<ul style="width: <?php echo $field/5*100; ?>%; overflow: hidden; white-space: nowrap; display: inline-block;">
		    		<li><i class="fa fa-star"></i></li>
		    		<li><i class="fa fa-star"></i></li>
		    		<li><i class="fa fa-star"></i></li>
		    		<li><i class="fa fa-star"></i></li>
		    		<li><i class="fa fa-star"></i></li>
		    	</ul>
			</div>
        </div>
    </div>
    <div class="text-box">
        <span class="flaticon-right"></span>
        <div class="text">
            <?php
                $title = get_the_title();
                $content = get_the_content();
                $excerpt = get_the_excerpt();
            ?>

            <?php if ($content) { ?>
                <p><?php echo $content; ?></p>
            <?php } ?>

            <h3><?php echo $title; ?></h3>

            <?php if (has_excerpt()) { ?>
                <h4><?php echo $excerpt; ?></h4>
            <?php } ?>
        </div>
    </div>
</div>
<!--End single slide item-->