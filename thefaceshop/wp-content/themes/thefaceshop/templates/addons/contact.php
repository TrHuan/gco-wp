<?php while( have_rows('contacts', 'options') ): the_row(); ?>
	<div class="module module_contacts ptb-80" <?php if (get_sub_field('image')) { ?>style="background-image: url(<?php the_sub_field('image'); ?>)"<?php } ?>>
		<?php if (get_sub_field('title') || get_sub_field('description')) { ?>
			<div class="module_title section-title text-center mb-50">
	            <h2><?php the_sub_field('title'); ?></h2>
	            <p><?php the_sub_field('description'); ?></p>
	        </div>
	    <?php } ?>

		<div class="module_content subscribe-content subscribe-content-two offset-lg-6  text-center">
			<?php echo do_shortcode(get_sub_field('content')); ?>
		</div>
	</div>
<?php endwhile; ?>