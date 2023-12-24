<?php
/**
 * Template Name: Addon Banners
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $id = get_sub_field('id');
    // if ($id) {
    // 	$id = 'lth-' . $id;
    // }

    $clas = get_sub_field('class');

	$style = get_sub_field('styles');

	$class = $clas . ' ' . $style;
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-banners <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            	<div class="banners-box">
					<?php
						$title = get_sub_field('title');
						$description = get_sub_field('description');

						if ($title || $description) {
					?>
						<div class="title-box">
							<?php if ($title) { ?>
								<h3 class="title"><?php echo $title; ?></h3>
							<?php }?>
							<?php if ($description) { ?>
								<p><?php echo $description; ?></p>
							<?php }?>
						</div>
					<?php } ?>

					<?php if( have_rows('banner') ): ?>
						<div class="content-box">
							<div class="groups-box"> 
								<?php $i; ?>
								<?php while( have_rows('banner') ): the_row(); ?>
						    		<?php
						    			$i++;
						    			$image = get_sub_field('image');
						    			$url = get_sub_field('url');
										$alt = get_sub_field('alt');

						    			$video = get_sub_field('video');

										$title = get_sub_field('title');
										$font_size_title = get_sub_field('font_size_title');
										$color_title = get_sub_field('color_title');
										$font_weight_title = get_sub_field('font_weight_title');

						    			$content = get_sub_field('content');
    									$countdown = get_sub_field('countdown');

    									$class_item = get_sub_field('class_item');

    									$class = 'item-'. $i;

    									$psab = get_sub_field('content_position_absolute');
    									$top = get_sub_field('top');
    									$bottom = get_sub_field('bottom');
    									$left = get_sub_field('left');
    									$right = get_sub_field('right');
    									
    									$button = get_sub_field('button');
						    		?>

						    		<div class="item <?php echo $class; ?>">
						        		<div class="banner-box <?php if ($psab == "yes") { ?>banner-box-content-absolute<?php }?>" <?php if ($psab == "yes") { ?>style="position: relative; display: flex; justify-content: center; align-items: center;"<?php }?>>
						            		<?php if ($video) { ?>
							            		<div class="banner-image" <?php if ($psab == "yes") { ?>style="width: 100%;"<?php }?>>
							            			<div class="video">
							            				<?php echo $video; ?>
							            			</div>
							            		</div>
						            		<?php } if ($image) { ?>
							            		<div class="banner-image" <?php if ($psab == "yes") { ?>style="width: 100%;"<?php }?>>
							            			<div class="image">
							            				<?php if ($url) { ?> <a href="<?php echo $url; ?>"> <?php } ?>
							            					<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>"  style="width: 100%;" width="1920" height="1080">
							            				<?php if ($url) { ?> </a> <?php } ?>
							            			</div>
							            		</div>
						            		<?php } ?>

						            		<?php if ($content || $countdown || $button == 'yes' || $title) { ?>
						            			<div class="banner-content" <?php if ($psab == "yes") { ?>style="position: absolute; top: <?php echo $top; ?>; bottom: <?php echo $bottom; ?>; left: <?php echo $left; ?>; right: <?php echo $right; ?>;"<?php }?>>

						            				<?php if ($title) { ?>
														<div class="title" style="font-size: <?php echo $font_size_title; ?>;color: <?php echo $color_title; ?>"><?php echo $title; ?></div>
													<?php }?>

						            				<?php if ($countdown) { ?>
						            					<div class="clock" data-countdown="<?php echo $countdown; ?>"></div>
						            				<?php } ?>

						            				<?php if ($content) { ?>
							            				<div class="content">
							            					<?php echo $content; ?>
							            				</div>
							            			<?php } ?>

							            			<?php if ($button == 'yes') { ?>
							            				<div class="buttons">
							            					<?php if( have_rows('add_buttons') ): ?>
							            						<?php while( have_rows('add_buttons') ): the_row(); ?>
							            							<?php
							            								$text = get_sub_field('text');
							            								$url = get_sub_field('url');
							            								$class = get_sub_field('class');
							            								$data_popup = get_sub_field('data_popup');
							            							?>
									            					<a href="<?php if ($url) { echo $url; } elseif ($url == '#' || !$url) { echo __('javascript:0'); } ?>" class="btn <?php echo $class; ?>" <?php if ($data_popup) { ?>data_popup="<?php echo $data_popup; ?>"<?php } ?>>
									            						<?php echo $text; ?>
									            					</a>
								            					<?php endwhile; ?>
							            					<?php endif; ?>	
							            				</div>
							            			<?php } ?>
							            			
						            			</div>
						            		<?php } ?>
						            	</div>
						            </div>
								<?php endwhile; ?>
							</div>
						</div>	
					<?php endif; ?>				
            	</div>
            </div>
        </div>
	</div>
</article>