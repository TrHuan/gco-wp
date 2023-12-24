<?php
/**
 * Template Name: Addon Testimonials
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $id = get_sub_field('id');
    if ($id) {
    	$id = 'lth-' . $id;
    }

    $class = get_sub_field('class');
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-testimonials <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="testimonials-box">
            		<?php
						$title = get_sub_field('title');
						$description = get_sub_field('description');
						$number = get_sub_field('number_displayed');

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

					<div class="content-box">
						<?php
		                    $args = [
		                        'post_type' => 'testimonial',
		                        'post_status' => 'publish',
		                        'order_by' => 'rand',
		                        // 'order' => 'ASC',
		                        'posts_per_page' => $number,
		                    ];
		                    $tets = new WP_Query($args);
		                    if ($tets->have_posts()) { ?>

								<div class="slick-slider slick-testimonials">
                                    <?php while ($tets->have_posts()) {
			                            $tets-> the_post(); ?>
			                            
                                        <?php get_template_part('template-parts/testimonial/content', 'box'); ?>
			                        <?php } ?>
			                    </div>
			                    
		                    <?php } else {
		                        get_template_part('template-parts/content', 'none');
		                    }
		                    // reset post data
		                    wp_reset_postdata();
		                ?>
		            </div>
				</div>
			</div>
		</div>
	</div>
</article>