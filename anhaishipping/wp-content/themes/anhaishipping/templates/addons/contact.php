<?php while( have_rows('contact') ): the_row(); ?>
	<div class="module module_contact">
		<div class="module_title">
			<h2 class="title">
				<?php the_sub_field('title'); ?>
			</h2>
		</div>

		<div class="module_content">
			<?php echo do_shortcode(get_sub_field('content')); ?>
		</div>
	</div>
<?php endwhile; ?>