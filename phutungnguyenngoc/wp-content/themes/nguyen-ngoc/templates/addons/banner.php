<div class="module module_banner">
	<div class="module_content">
		<?php while( have_rows('banner') ): the_row(); ?>
			<?php				
				$image = get_sub_field('image');
				$text_1 = get_sub_field('text_1');
				$text_2 = get_sub_field('text_2');
				$text_3 = get_sub_field('text_3');

				$btn_url = get_sub_field('button');
				if( $btn_url ) {
				    $url_btn = $btn_url['url'];
				    $btn_title = $btn_url['title'];
				    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
				}	
			?>

			<?php if ($image) { ?>
				<div class="content-image">
					<a href="<?php echo $url_btn; ?>" target="<?php echo $btn_target; ?>>" title="" class="image">
						<img src="<?php echo $image; ?>" alt="Banner" width="1920" height="1080">
					</a>
				</div>
			<?php } ?>

			<?php if ($text_1 || $text_2 || $text_3 || $btn_url) { ?>
				<div class="content-box <?php echo $animation; ?>">
					<?php if ($text_1) { ?>
						<p class="text-1"><?php echo $text_1; ?></p>
					<?php } ?>

					<?php if ($text_2) { ?>
						<p class="text-2"><?php echo $text_2; ?></p>
					<?php } ?>

					<?php if ($text_3) { ?>
						<p class="text-3"><?php echo $text_3; ?></p>
					<?php } ?>

					<?php if ($btn_url) { ?>
						<a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>" title="" class="btn btn-slider">
							<?php echo $btn_title; ?>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		<?php endwhile; ?>
	</div>
</div>