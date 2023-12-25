<div class="item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if (has_post_thumbnail()) { ?>
	        <div class="post-image">
	        	<a href="javascript:0" title="" class="image">
		            <img src="<?php echo lth_custom_img('full', 624, 624);?>" alt="<?php the_title(); ?>">
		        </a>
	        </div>
	    <?php } ?>

	    <?php
			$facebook = get_field('facebook');
			$instagram = get_field('instagram');
		?>

	    <div class="post-content">
	    	<h3 class="post-name">
	    		<a href="javascript:0" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a>

		    	<?php if ($facebook || $instagram) { ?>
			    	<ul>
			    		<?php if ($facebook) { ?>
				    		<li>
				    			<a href="<?php echo $facebook; ?>" title="">
				    				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-01.png" alt="Icon">
				    			</a>
				    		</li>
				    	<?php } ?>

				    	<?php if ($instagram) { ?>
				    		<li>
				    			<a href="<?php echo $instagram; ?>" title="">
				    				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-02.png" alt="Icon">
				    			</a>
				    		</li>
				    	<?php } ?>
			    	</ul>
			    <?php } ?>
	    	</h3> 

	    	<div class="post-comment"><?php the_content(); ?></div>
	    </div>
	</article>
</div>