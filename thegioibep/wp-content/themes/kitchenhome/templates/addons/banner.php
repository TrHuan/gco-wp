<div class="module module_banner">
	<div class="module_content">
		<?php while( have_rows('banner') ): the_row(); ?>
			<?php				
				$image = get_sub_field('image');

				$btn_url = get_sub_field('button');
				if( $btn_url ) {
				    $url_btn = $btn_url['url'];
				    $btn_title = $btn_url['title'];
				    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
				}	
			?>

			<?php if ($image) { ?>
				<div class="content-image">
					<a href="<?php echo $url_btn; ?>" target="<?php echo $btn_target; ?>" title="" class="image">
						<img src="<?php echo $image; ?>" alt="Banner" width="1920" height="1080">
					</a>
				</div>
			<?php } ?>
		<?php endwhile; ?>
	</div>
</div>