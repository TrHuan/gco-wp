<?php while( have_rows('brands') ): the_row(); ?>
	<div class="module module_brands">
		<div class="module_title">
			<h2 class="title">
				<?php the_sub_field('title'); ?>
			</h2>
			<p class="info">
				<?php the_sub_field('description'); ?>
			</p>
		</div>

		<div class="module_content">
			<div class="slick-slider slick-brands">

			    <?php
			    	if( have_rows('contents') ): $i;
			    		while( have_rows('contents') ) : the_row(); $i++;
			    			$image = get_sub_field('image');
			    			$title = get_sub_field('title');
			    			$content = get_sub_field('content');

			    			$url = get_sub_field('url');
			    			if( $url ) {
							    $url_img = $url['url'];
							    $url_title = $url['title'];
							    $url_target = $url['target'] ? $url['target'] : '_self';
							}
							
							$settings = get_sub_field('settings');
							$width = $settings['image_width'];
							$height = $settings['image_height'];

			    		?>

			    		<div class="item item-<?php echo $i; ?>">
			    			<div class="content">
			    				<div class="content-image">
			    					<a href="<?php echo $url_img; ?>" target="<?php echo $target; ?>>" title="" class="image">
			    						<img src="<?php echo $image; ?>" alt="Brands" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
			    					</a>
			    				</div>

			    				<?php if ($title || $content) { ?>
				    				<div class="content-box <?php echo $animation; ?>">
				    					<?php if ($title) { ?>
				    						<h4 class="text-1"><?php echo $title; ?></h4>
				    					<?php } ?>

				    					<?php if ($content) { ?>
				    						<p class="text-2"><?php echo $content; ?></p>
				    					<?php } ?>
				    				</div>
				    			<?php } ?>
			    			</div>
			    		</div>

			    		<?php endwhile;
					endif;
			    ?>

			</div>

			<?php
				$settings = get_sub_field('settings');
			    $autoplay = $settings['autoplay'];
			    $loop = $settings['loop'];
			    $dots = $settings['dots'];
			    $vertical = $settings['vertical'];    

			    $rows = $settings['rows'];
			    if ($rows == '1') {
			    	$slnumber = 'slidesToShow';
			    } else {
			    	$slnumber = 'slidesPerRow';
			    	$slidesToShow = 'slidesToShow: 1,';
			    }

			    $arrow = $settings['arrow'];
			    if ($arrow == 'true') {
			    	$prevArrow = '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>';
			    	$nextArrow = '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>';
			    }

			    $owl_xl_items = $settings['owl_xl_items'];
				$owl_lg_items = $settings['owl_lg_items'];
				$owl_md_items = $settings['owl_md_items'];
				$owl_sm_items = $settings['owl_sm_items'];
				$owl_items = $settings['owl_items'];
			?>

		    <script type="text/javascript">		
				jQuery(document).ready(function($) {
				    $(".slick-brands-<?php echo $rand; ?>").slick({
				        loop: <?php echo $loop; ?>,
				        autoplay: <?php echo $autoplay; ?>,
				        autoplaySpeed: 3000,
				        dots: <?php echo $dots; ?>,
				        infinite: true,
				        speed: 500,
				        vertical: <?php echo $vertical; ?>,
				        verticalSwiping: <?php echo $vertical; ?>,
				        rows: <?php echo $rows; ?>,
				        <?php echo $slnumber; ?>: <?php echo $owl_xl_items; ?>,
				        <?php echo $slidesToShow; ?>
				        slidesToScroll: 1,
				        adaptiveHeight: true,
				        prevArrow: '<?php echo $prevArrow; ?>',
				        nextArrow: '<?php echo $nextArrow; ?>',
				        responsive: [
				            {
				                breakpoint: 1200,
				                settings: {
				                    rows: <?php echo $rows; ?>,
				                    <?php echo $slnumber; ?>: <?php echo $owl_xl_items; ?>,
				                }
				            },
				            {
				                breakpoint: 992,
				                settings: {
				                    rows: <?php echo $rows; ?>,
				                    <?php echo $slnumber; ?>: <?php echo $owl_xl_items; ?>,
				                }
				            },
				            {
				                breakpoint: 768,
				                settings: {
				                    rows: 1,
				                    <?php echo $slnumber; ?>: <?php echo $owl_xl_items; ?>,
				                }
				            },
				            {
				                breakpoint: 480,
				                settings: {
				                    rows: 1,
				                    <?php echo $slnumber; ?>: <?php echo $owl_xl_items; ?>,
				                }
				            }
				        ]
				    });
				});
			</script>
		</div>
	</div>
<?php endwhile; ?>