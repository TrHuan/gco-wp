
<?php $blogs = get_sub_field('blogs'); 
    if ($blogs) {
?>
	<div class="module module_blogs">
	    <div class="module_title">
	    	<?php if ($blogs['title']) { ?>
				<h2 class="title"><?php echo $blogs['title']; ?></h2>
			<?php } ?>
            <?php if ($blogs['description']) { ?>
            	<p class="infor"><?php echo $blogs['description']; ?></p>
            <?php } ?>
		</div>

	    <div class="module_content">
            <?php
	            $args = [
	                'post_type' => 'post',
	                'post_status' => 'publish',
	                'order' => 'DESC',
	                'posts_per_page' => 5,
	            ];
	            $tets = new WP_Query($args);
	            if ($tets->have_posts()) { ?>

					<div class="slick-slider slick-blogs">
	                    <?php while ($tets->have_posts()) {
	                        $tets-> the_post(); ?>
	                        
	                        <?php get_template_part('template-parts/post/content', ''); ?>
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
<?php } ?>