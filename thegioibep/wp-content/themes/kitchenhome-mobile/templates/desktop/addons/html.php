<div class="module module__html">
	<div class="module_title">
		<h2 class="title">
			<?php the_sub_field('title'); ?>
		</h2>
		<p class="info">
			<?php the_sub_field('description'); ?>
		</p>
	</div>

	<div class="module_content">
		<?php				
			$content = get_sub_field('content');
		?>

		<?php if ($content) { echo $content; } ?>
	</div>
</div>