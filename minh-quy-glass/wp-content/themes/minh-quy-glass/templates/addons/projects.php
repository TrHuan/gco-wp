
<?php $projects = get_sub_field('projects'); 
    if ($projects) {
?>
    <div class="module module_projects">
        <div class="module_title">
            <h2 class="title"><?php echo $projects['title']; ?></h2>
            <p class="infor"><?php echo $projects['description']; ?></p>
        </div>

        <div class="module_content">
        	<?php
	            $args = [
	                'post_type' => 'project',
	                'post_status' => 'publish',
	                'order' => 'DESC',
	                'posts_per_page' => 3,
	            ];
	            $tets = new WP_Query($args);
	            if ($tets->have_posts()) { ?>

					<div class="slick-slider slick-projects">
	                    <?php while ($tets->have_posts()) {
	                        $tets-> the_post(); ?>
	                        
	                        <?php get_template_part('template-parts/project/content', ''); ?>
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