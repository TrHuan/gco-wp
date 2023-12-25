

<!-- Singel Testmonial Start Here -->
<div class="single-testmonial text-center">
    <div class="testmonial-img">
        <img src="<?php echo lth_custom_img('full', 66, 66);?>" alt="<?php the_title(); ?>">
    </div>
    <h3><?php the_title(); ?></h3>

    <?php
		$field = get_field('rating');
	?>
    <div class="post-rating">			
		<div class="star-rating">
			<div style="display: inline-block;">
				<span style="width: <?php echo $field/5*100; ?>%; overflow: hidden; white-space: nowrap; display: inline-block;">
		    		<i class="icofont-star icon"></i>
		    		<i class="icofont-star icon"></i>
		    		<i class="icofont-star icon"></i>
		    		<i class="icofont-star icon"></i>
		    		<i class="icofont-star icon"></i>
		    	</span>
			</div>
		</div>
	</div>

    <p><?php the_content(); ?></p>
</div>
<!-- Singel Testmonial End Here -->