<?php
get_header();?>
<section id="banner-featured_page" class="fadeIn wow abc" data-wow-delay="0.2s">
	<?php if( have_posts() ): ?>
    <img src="<?php echo $vz_options['opt-banner-posts']['url'];?>" alt="">
  	<div class="background-overlay">
  		<div class="container">	
  			<div class="page-breadcrumb">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p>','</p>' );
                }
                ?>
            </div>
    		<h2 class="title-page"><?php single_cat_title();?></h2>
  		</div>
  	</div>
  	<?php endif; ?>
</section>

<!-- Blog & Sidebar Section -->
<section id="archive_posts" class="page-wrapper">
	<div class="background-overlay">
		<div class="container">
            <!-- <h2 class="title-section"><span><?php single_cat_title();?></span></h2>
			<div class="des-section"></div> -->
			<div class="row content-posts">	
				
	        	<div class="col-xs-12 col-sm-8 col-md-7 col-lg-7 content-posts">
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
				<?php get_sidebar(); ?>
			</div>	
		</div>
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_template_part('sections/specia','partner'); ?>

<?php get_footer(); ?>
