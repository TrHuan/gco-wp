<?php
get_header();
get_template_part('sections/specia','breadcrumb'); ?>

<section class="page-wrapper">
	<div class="background-overlay">
		<div class="container">
			<h2 class="title-section"><?php the_title();?></h2>
			<div class="line-section"></div>
			<div class="entry-content">
				<!--Blog Detail-->
				
				<?php if( have_posts() ): ?>
					
					<?php while( have_posts() ): the_post(); ?>
						
						<?php the_content();?>
						
					<?php endwhile; ?>
					
					<div class="paginations">
						<?php						
				// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
							'next_text'          => '<i class="fa fa-angle-double-right"></i>',
						) ); ?>
					</div>
					
					<?php else: ?>
						
						<?php get_template_part('template-parts/content','none'); ?>
						
					<?php endif; ?>
					
				</div>
			</div><!-- /.container -->
		</div>
	</section>

	<?php get_footer(); ?>

