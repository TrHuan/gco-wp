<li class="item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			$img = get_the_post_thumbnail();
			$content = get_the_content();
		?>

		<?php if ($img) {?>
			<div class="post-image">
				<div class="image">
					<?php echo $img; ?>
				</div>
			</div>
		<?php } ?>

		<?php if ($content) {?>
			<div class="post-content">
				<img src="<?php echo ASSETS_URI; ?>/images/bg-video-2.jpg" alt="Video Bg">
				<?php echo $content; ?>
			</div>
		<?php } ?>
	</article>
</li>