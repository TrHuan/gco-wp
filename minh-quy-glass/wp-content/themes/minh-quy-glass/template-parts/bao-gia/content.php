
<div class="item">
	<div class="content">
		<?php if (has_post_thumbnail()) { ?>
		<div class="content-image">
			<div class="image">
				<a href="<?php the_permalink(); ?>" title="">
		            <img src="<?php echo lth_custom_img('full', 330, 250);?>" alt="<?php the_title(); ?>" width="330" height="250">
		        </a>
			</div>
		</div>
		<?php } ?>

		<div class="content-box">
			<h3 class="content-name">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a> 
			</h3>
		</div>
	</div>
</div>