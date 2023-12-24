<?php
    $header_top = get_field('header_top', 'option');

	$color = $header_top['color'];
	$bg_color = $header_top['background_color'];

?>
<style type="text/css">
	.header-top {
		background-color: <?php echo $bg_color; ?>;
		color:  <?php echo $color; ?>;
	}

	.header-top a {
		color:  <?php echo $color; ?>;
	}
</style>

<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-column column-1">
					<div class="header-top-box">
						<?php if( have_rows('top_box', 'option') ): ?> 
    						<?php while( have_rows('top_box', 'option') ): the_row(); ?>
	    						<?php if( have_rows('items', 'option') ): ?> 
    								<div class="item">
	    								<ul class="groups-box">
				    						<?php while( have_rows('items', 'option') ): the_row(); ?>
				    							<?php
							            			$item = get_sub_field('item');
							            			$url = get_sub_field('url');
							            		?>

							            		<li>
								            		<?php if ($url) { ?>
									            		<a href="<?php echo $url; ?>">
									            	<?php } else { ?>
									            		<span>
									            	<?php } ?>
									            			<?php echo $item; ?>
									            	<?php if ($url) { ?>
									            		</a>
									            	<?php } else { ?>
									            		</span>
									            	<?php } ?>
									            </li>
							            	<?php endwhile; ?>
					    				</ul>
			            			</div>
			    				<?php endif; ?>
			            	<?php endwhile; ?>
    					<?php endif; ?>

    					<div class="item">    						
							<ul class="groups-box">
								<?php
									$hotmail = get_field('hotmail', 'option');
									$website = get_field('website', 'option');
									if( $website ) {
									    $url = $website['url'];
									    $title = $website['title'];
									    $target = $website['target'] ? $website['target'] : '_self';
									}
								?>
								<?php if ($hotmail) { ?>
									<li>
										<label>Hotmail:</label>
										<a href="mailto: <?php echo $hotmail; ?>" title=""><?php echo $hotmail; ?></a>
									</li>
								<?php } ?>

								<?php if ($title) { ?>
									<li>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-07.png" alt="Icon">
										<a href="<?php echo $url; ?>" target="<?php echo $target; ?>" title=""><?php echo $title; ?></a>
									</li>
								<?php } ?>
							</ul>
    					</div>
					</div>
				</div>
			</div>
		</div>
	</div>