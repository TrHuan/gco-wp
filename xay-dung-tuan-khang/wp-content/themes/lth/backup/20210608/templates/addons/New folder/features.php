<div class="module module__features">
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
			$rands = rand();
		    $rand = $rands;		    
		?>
		<div class="slick-slider slick-features slick-features-<?php echo $rand; ?>">

		    <?php
		    	$post_id = get_sub_field('features');

		    	if( have_rows('features', $post_id) ): $i;
		    		while( have_rows('features', $post_id) ) : the_row(); $i++;
		    			$class_icon = get_sub_field('class_icon');
		    			$image_icon = get_sub_field('image_icon');
		    			$title = get_sub_field('title');
		    			$content = get_sub_field('content');

		    			$btn_url = get_sub_field('button');
		    			if( $btn_url ) {
						    $url_btn = $btn_url['url'];
						    $btn_title = $btn_url['title'];
						    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
						}

						$text_align = get_sub_field('text_align');

		    		?>

		    		<div class="item item-<?php echo $i; ?>">
		    			<style type="text/css">
		    				.module__features .item-<?php echo $i; ?> .content {
		    					text-align: <?php echo $text_align; ?>;
		    				}
		    			</style>

		    			<div class="content">
		    				<?php if ($image_icon || $class_icon) { ?>
			    				<div class="content-image">
			    					<?php if ($image_icon) { ?>
			    						<img src="<?php echo $image_icon; ?>" alt="Feature">
			    					<?php } else { ?>
			    						<i class="<?php echo $class_icon; ?>"></i>
			    					<?php } ?>
			    				</div>
			    			<?php } ?>

		    				<?php if ($title || $content || $btn_url) { ?>
			    				<div class="content-box <?php echo $animation; ?>">
			    					<?php if ($title) { ?>
			    						<h4 class="text-1"><?php echo $title; ?></h4>
			    					<?php } ?>

			    					<?php if ($content) { ?>
			    						<p class="text-2"><?php echo $content; ?></p>
			    					<?php } ?>

			    					<?php if ($btn_url) { ?>
			    						<a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>>" title="" class="btn btn-feature">
			    							<?php echo $btn_title; ?>
			    						</a>
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
			    $(".slick-features-<?php echo $rand; ?>").slick({
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