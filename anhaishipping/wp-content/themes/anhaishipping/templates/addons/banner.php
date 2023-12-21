
<?php while( have_rows('banner') ): the_row(); ?>
	<div class="module module_banner module_ve_chung_toi">
		<?php if (get_sub_field('title')) { ?>
			<div class="module_title">
				<h1 class="title">
					<?php the_sub_field('title'); ?>
				</h1>
			</div>
		<?php } ?>

		<div class="module_content">
				<?php
			    	if( have_rows('contents') ):
			    		while( have_rows('contents') ) : the_row();

						$image = get_sub_field('video');
						$date = get_sub_field('date');
						$title = get_sub_field('title');
						$content = get_sub_field('content');

						$btn_url = get_sub_field('button');
						if( $btn_url ) {
						    $url_btn = $btn_url['url'];
						    $btn_title = $btn_url['title'];
						    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
						}	
				?>

					<?php if ($image) { ?>
						<div class="content-image">
							<img src="<?php echo ASSETS_URI; ?>/images/bg-video.jpg" alt="Video Bg">

							<?php echo $image; ?>
						</div>
					<?php } ?>

					<?php if ($date || $title || $content || $btn_url) { ?>
						<div class="content-box">
							<div>
								<?php if ($date) { ?>
									<p class="text-1"><?php echo $date; ?></p>
								<?php } ?>

								<?php if ($title) { ?>
									<h3 class="text-2 title"><?php echo $title; ?></h3>
								<?php } ?>

								<?php if ($content) { ?>
									<p class="text-3"><?php echo $content; ?></p>
								<?php } ?>
							</div>

							<?php if ($btn_url) { ?>
								<a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>" title="" class="btn btn-banner">
									<?php echo $btn_title; ?>
								</a>
							<?php } ?>
						</div>
					<?php } ?>

				<?php endwhile; endif; ?>
		</div>
	</div>
<?php endwhile; ?>