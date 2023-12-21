<li class="item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<h3 class="post-name">
    		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	    		<?php the_title(); ?>
	    	</a>    		
    	</h3>  

    	<?php $information_fleet = get_field('information_fleet'); ?>
    	<?php if ($information_fleet) { ?>
		    <div class="post-dwt">
		    	<?php echo $information_fleet['dwt']; ?>
		    </div>
		<?php } ?>

	    <div class="post-flag">
	    	<?php echo $information_fleet['flag']; ?>
	    </div>
	</article>
</li>