<?php
/**
Template Name: Page Box Width
**/
get_header();
get_template_part('sections/specia','breadcrumb'); ?>
<section id="page-box-width" class="page-wrapper">
	<?php if( have_posts()) :  the_post();?>
	    <div class="background-overlay">
	    	<div class="container">
	    	<h2 class="title-section"><?php the_title();?></h2>
	    	<div class="line-section"></div>
		    <div class="entry-content">
		    	<?php the_content();?>
			</div>	
			</div>
	    </div>
    <?php endif;?>		
</section>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>

