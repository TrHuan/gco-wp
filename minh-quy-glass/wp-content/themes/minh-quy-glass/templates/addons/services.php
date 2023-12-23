<div class="module module__services">
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

		    $settings = get_sub_field('settings');
		    $number = $settings['owl_xl_items'];

		    if ($number == '1') {
		    	$number = '5';
		    } else {
		    	$number = $number * 2;
		    }
		?>
		
	    <?php
            $args = [
                'post_type' => 'service',
                'post_status' => 'publish',
                // 'order_by' => 'rand',
                'order' => 'DESC',
                'posts_per_page' => $number,
            ];
            $tets = new WP_Query($args);
            if ($tets->have_posts()) { ?>

				<div class="slick-slider slick-services slick-services-<?php echo $rand; ?>">
                    <?php while ($tets->have_posts()) {
                        $tets-> the_post(); ?>
                        
                        <?php get_template_part('template-parts/service/content', ''); ?>
                    <?php } ?>
                </div>
                
            <?php } else {
                get_template_part('template-parts/content', 'none');
            }
            // reset post data
            wp_reset_postdata();
        ?>

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
			    $(".slick-services-<?php echo $rand; ?>").slick({
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