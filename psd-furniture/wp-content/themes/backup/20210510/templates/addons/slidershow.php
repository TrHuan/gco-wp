<?php
/**
 * Template Name: Addon Slidershow
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $rands = rand();
    $rand = $rands;

    $ids = get_sub_field('id');
    if ($ids) {
    	$id = 'lth-' . $ids;
    }

    $class = get_sub_field('class');

    $owl_xl_items = get_sub_field('owl_xl_items');
	$owl_lg_items = get_sub_field('owl_lg_items');
	$owl_md_items = get_sub_field('owl_md_items');
	$owl_sm_items = get_sub_field('owl_sm_items');
	$owl_items = get_sub_field('owl_items');
?>

<article <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-slidershow <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">        		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="module module__slidershow">
            		<div class="module_content">
	            		<div class="slick-slider slick-slidershow slick-slidershow-<?php echo $rand; ?>" >
	            			<?php if( have_rows('slider') ): ?> 
	            				<?php $i; ?>
	    						<?php while( have_rows('slider') ): the_row(); ?>
				            		<?php
				            			$i++;
				            			$image = get_sub_field('image');
				            			$link = get_sub_field('url');
                                        if( $link ) {
                                            $url = $link['url'];
                                            $target = $link['target'] ? $link['target'] : '_self';
                                        }
    									$countdown = get_sub_field('countdown');
				            			$class_item = get_sub_field('class_item');

    									$psab = get_sub_field('content_position_absolute');
    									$top = get_sub_field('top');
    									$bottom = get_sub_field('bottom');
    									$left = get_sub_field('left');
    									$right = get_sub_field('right');

    									$button = get_sub_field('button');

    									$text_1 = get_sub_field('text_1');
    									$text_2 = get_sub_field('text_2');
				            		?>

				            		<div class="item item-<?php echo $i; ?> <?php echo $class_item; ?>">
					            		<div class="contents-box" <?php if ($psab == "yes") { ?>style="position: relative; display: flex; justify-content: center; align-items: center;"<?php }?>>
						            		<div class="content-image" <?php if ($psab == "yes") { ?>style="width: 100%;"<?php }?>>
						            			<div class="image">
						            				<?php if ($url) { ?> <a href="<?php echo $url; ?>" title="" target="<?php echo $target; ?>"> <?php } ?>
						            					<img src="<?php echo $image; ?>" alt="Slider" style="width: 100%;" width="1920" height="1280">
						            				<?php if ($url) { ?> </a> <?php } ?>
						            			</div>
						            		</div>
						            		
						            		<?php if ($text_1 || $text_2 || $countdown || $button == 'yes') { ?>
						            			<div class="content-box" <?php if ($psab == "yes") { ?>style="position: absolute; top: <?php echo $top; ?>; bottom: <?php echo $bottom; ?>; left: <?php echo $left; ?>; right: <?php echo $right; ?>;"<?php }?>>
						            				<?php if ($countdown) { ?>
						            					<div class="clock" data-countdown="<?php echo $countdown; ?>"></div>
						            				<?php } ?>

						            				<?php if ($text_1 || $text_2 ) { ?>
						            				<div class="content">
						            					<p class="text-1"><?php echo $text_1; ?></p>
                                    					<p class="text-2"><?php echo $text_2; ?></p>
						            				</div>
						            				<?php } ?>

							            			<?php if ($button == 'yes') { ?>
							            				<div class="buttons">
							            					<?php if( have_rows('add_buttons') ): ?>
							            						<?php while( have_rows('add_buttons') ): the_row(); ?>
							            							<?php
							            								$text = get_sub_field('text');
							            								$link = get_sub_field('url');
								                                        if( $link ) {
								                                            $url = $link['url'];
								                                            $target = $link['target'] ? $link['target'] : '_self';
								                                        }
							            								$class = get_sub_field('class');
							            							?>
							            							<?php if ($text) { ?>
										            					<a href="<?php if ($url) { echo $url; } elseif ($url == '#' || !$url) { echo 'javascript:0'; } ?>" class="btn <?php echo $class; ?>" title="" target="<?php echo $target; ?>">
										            						<span><?php echo $text; ?></span>
										            						<i class="icofont-arrow-right icon"></i>
										            					</a>
										            				<?php } ?>
								            					<?php endwhile; ?>
							            					<?php endif; ?>	
							            				</div>
							            			<?php } ?>
						            			</div>
						            		<?php } ?>
						            	</div>
						            </div>
	    						<?php endwhile; ?>
	    					<?php endif; ?>
	    				</div>

	    				<div class="socials-box">
                        	<label><?php echo __('Liên hệ'); ?></label>
							<ul>
								<?php if( have_rows('socials') ): ?> 
									<?php while( have_rows('socials') ): the_row(); ?>
										<?php
											$title = get_sub_field('title');
											$url = get_sub_field('url');
											$icon_image = get_sub_field('icon_image');
											$icon_class = get_sub_field('icon_class');
										?>

										<li>
											<a href="<?php if ($url) {echo $url;} else { echo '#';} ?>" title="" target="_blank">
												<?php if ($icon_image || $icon_class) { ?>
													<span class="icon">
														<?php if ($icon_image) { ?>
															<img src="<?php echo $icon_image; ?>" alt="Social">
														<?php } else { ?>
															<i class="<?php echo $icon_class; ?>"></i>
														<?php } ?>
													</span>
												<?php } ?>

												<?php if ($title) { ?>
													<span class="icon-title"><?php echo $title; ?></span>
												<?php } ?>
											</a>
										</li>
									<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>

						<div class="hotline-box">
							<label><?php echo __('Hotline'); ?></label>
							<a href="tel:<?php the_field('hotline', 'option'); ?>" title="<?php the_field('hotline', 'option'); ?>"><?php the_field('hotline', 'option'); ?></a>
						</div>
					</div>
            	</div>
            </div>
        </div>
	</div>

	<script type="text/javascript">		
		jQuery(document).ready(function($) {
		    $(".slick-slidershow-<?php echo $rand; ?>").slick({
		        loop: true,
		        autoplay: false,
		        autoplaySpeed: 3000,
		        dots: false,
		        infinite: true,
		        speed: 500,
		        rows: 1,
		        slidesPerRow: <?php echo $owl_xl_items; ?>,
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        adaptiveHeight: true,
		        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
		        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
		        responsive: [
		            {
		                breakpoint: 1200,
		                settings: {
		                    rows: 1,
		                    slidesPerRow: <?php echo $owl_lg_items; ?>,
		                }
		            },
		            {
		                breakpoint: 992,
		                settings: {
		                    rows: 1,
		                    slidesPerRow: <?php echo $owl_md_items; ?>,
		                }
		            },
		            {
		                breakpoint: 768,
		                settings: {
		                    rows: 1,
		                    slidesPerRow: <?php echo $owl_sm_items; ?>,
		                }
		            },
		            {
		                breakpoint: 480,
		                settings: {
		                    rows: 1,
		                    slidesPerRow: <?php echo $owl_items; ?>,
		                }
		            }
		        ]
		    });
		});
	</script>
</article>