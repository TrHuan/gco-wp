<?php
get_header();?>
<section id="banner-featured_page" class="fadeIn wow" data-wow-delay="0.2s">
	<?php if( have_posts() ): ?>
    <img src="<?php echo $vz_options['opt-banner-posts']['url'];?>" alt="">
  	<?php endif; ?>
</section>
<?php get_template_part('sections/specia','breadcrumb');?>
<!-- Blog & Sidebar Section -->
<section class="page-wrapper">
	<div class="background-overlay">
		<div class="container">
			<h2 class="title-section"><?php single_cat_title();?></h2>
			<div class="row content-posts">	
				<?php if( have_posts() ): ?>
				
					<?php while( have_posts() ): the_post(); ?>
					
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				
					<?php endwhile; ?>
					
					<div class="paginations">
					<?php						
					// Previous/next page navigation.
					the_posts_pagination( array(
					'prev_text' => '<i class="fa fa-angle-double-left"></i>',
					'next_text' => '<i class="fa fa-angle-double-right"></i>',
					) ); ?>
					</div>
					
				<?php else: ?>
					
					<?php get_template_part('template-parts/content','none'); ?>
					
				<?php endif; ?>
			</div>	
		</div>
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>
