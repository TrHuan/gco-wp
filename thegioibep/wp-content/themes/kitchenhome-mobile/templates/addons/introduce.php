
<?php while( have_rows('introduce') ): the_row(); ?>
	<?php				
		$image = get_sub_field('image');
		$title = get_sub_field('title');
		$description = get_sub_field('description');
	?>
	<div class="module module_banner module_introduce">
		<?php if ($title || $description) { ?>
			<div class="module_title">
				<h1 class="title">
					<?php the_sub_field('title'); ?>
				</h1>
				<p class="info">
					<?php the_sub_field('description'); ?>
				</p>
			</div>
		<?php } ?>

		<div class="module_content">
			<?php if ($image) { ?>
				<div class="content-image">
					<div class="image">
						<img src="<?php echo $image; ?>" alt="Banner" width="1920" height="1080">
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php endwhile; ?>