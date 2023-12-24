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
    // if ($ids) {
    // 	$id = 'lth-' . $ids;
    // }

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
            	<div class="slidershow-box">
            		<div class="content-box">
	            		<div class="slick-slider slick-slidershow slick-slidershow-<?php echo $rand; ?>" >
	            		<!-- <div class="slick-slider slick-slidershow" data-slick='{"slidesPerRow": <?php echo $owl_xl_items; ?>}' data-responsive='{"responsive": {"breakpoint": 1200, "settings"{"slidesPerRow": <?php echo $owl_lg_items; ?>},"breakpoint": 992, "settings"{"slidesPerRow": <?php echo $owl_md_items; ?>},"breakpoint": 768, "settings"{"slidesPerRow": <?php echo $owl_sm_items; ?>},"breakpoint": 480, "settings"{"slidesPerRow": <?php echo $owl_items; ?>}}'> -->
	            			<?php if( have_rows('slider') ): ?> 
	            				<?php $i; ?>
	    						<?php while( have_rows('slider') ): the_row(); ?>
				            		<?php
				            			$i++;
				            			$image = get_sub_field('image');
				            			$url = get_sub_field('url');
				            			$content = get_sub_field('content');
    									$countdown = get_sub_field('countdown');
				            			$class_item = get_sub_field('class_item');

    									$psab = get_sub_field('content_position_absolute');
    									$top = get_sub_field('top');
    									$bottom = get_sub_field('bottom');
    									$left = get_sub_field('left');
    									$right = get_sub_field('right');

    									$button = get_sub_field('button')
				            		?>

				            		<div class="item item-<?php echo $i; ?> <?php echo $class_item; ?>">
					            		<div class="slider-box" <?php if ($psab == "yes") { ?>style="position: relative; display: flex; justify-content: center; align-items: center;"<?php }?>>
						            		<div class="slider-image" <?php if ($psab == "yes") { ?>style="width: 100%;"<?php }?>>
						            			<div class="image">
						            				<?php if ($url) { ?> <a href="<?php echo $url; ?>"> <?php } ?>
						            					<img src="<?php echo $image; ?>" alt="Slider" style="width: 100%;" width="1920" height="1280">
						            				<?php if ($url) { ?> </a> <?php } ?>
						            			</div>
						            		</div>
						            		
						            		<?php if ($content || $countdown || $button == 'yes') { ?>
						            			<div class="slider-content" <?php if ($psab == "yes") { ?>style="position: absolute; top: <?php echo $top; ?>; bottom: <?php echo $bottom; ?>; left: <?php echo $left; ?>; right: <?php echo $right; ?>;"<?php }?>>
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
							            							?>
									            					<a href="<?php if ($url) { echo $url; } elseif ($url == '#' || !$url) { echo 'javascript:0'; } ?>" class="btn <?php echo $class; ?>">
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
	    					<?php endif; ?>
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
		        dots: true,
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