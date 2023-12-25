<?php $imgsrc = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>

<div class="items-prj__pages">
	<?php if ($imgsrc) { ?>
		<a href="<?php the_permalink(); ?>" title="" class="image">
	        <img src="<?php echo $imgsrc; ?>" width="" height="" alt="<?php the_title(); ?>">
	    </a>
	<?php } ?>
	<div class="intros-prj__pages">
		<p class="days-news fs-13s mb-10s"><?php the_time('d'); ?> <?php echo __('Thg '); the_time('m,'); ?> <?php the_time('Y'); ?></p>
		<h3>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="name-prj__pages fs-17s titles-medium__alls">
	    		<?php the_title(); ?>
	    	</a>   
		</h3>
	</div>
</div>