<?php
/**
 * Template Name: Addon Posts
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $rands = rand();
    $rand = $rands;

    $id = get_sub_field('id');
    if ($id) {
    	$id = 'lth-' . $id;
    }

    $class = get_sub_field('class');

	$posts = get_sub_field('blogs');
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-blogs <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="posts-box">
            		

					<div class="content-box">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</article>

<section <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="news lth-blogs <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">
		<?php
			$title = get_sub_field('title');
			$description = get_sub_field('description');

			if ($title || $description) {
		?>
			<div class="text-center index-title">
				<?php if ($title) { ?>
					<h2 class="title text-center mgb-20"><?php echo $title; ?></h2>
				<?php }?>
				<?php if ($description) { ?>
					<p><?php echo $description; ?></p>
				<?php }?>
			</div>
		<?php } ?>   
	    
	    <div class="news-list">
	        <div class="row">
	        	<?php if ($posts == 'blogs') {
					$blogs = get_sub_field('posts');
					if( $blogs ):
				?>
				    <?php foreach( $blogs as $post ): 
				        setup_postdata($post); ?>

				        <div class="col-md-3">
			                <div class="news-item">
			                    <?php get_template_part('template-parts/post/content', get_post_format()); ?>
			                </div>
			            </div>

				    <?php endforeach; ?>
				<?php 
				    wp_reset_postdata();
					else:
						get_template_part('template-parts/content', 'none');
					endif;
				} else {
					$number_show = get_sub_field('number_of_posts_to_show');

					$show_ps_by_cat = get_sub_field('show_products_by_category');
					
					if ($show_ps_by_cat == 'yes') {
						$cat = get_sub_field('category');
						$term = get_term( $cat, 'category' );
					}

					$args = array(
						'post_type' => 'post',
				        'post_status' => 'publish',
				        'posts_per_page' => $number_show,
				        'product_cat' => $term->slug,
					);

					$getposts = new WP_query( $args);
					if ($getposts->have_posts()) { ?>
						<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
							<div class="col-md-3">
				                <div class="news-item">
				                    <?php get_template_part('template-parts/post/content', get_post_format()); ?>
				                </div>
				            </div>
						<?php endwhile; wp_reset_postdata(); ?>
					<?php } else { ?> 
						<?php get_template_part('template-parts/content', 'none'); ?>
					<?php } ?>
				<?php } ?>
	        </div>
	    </div>
	</div>
	</section>