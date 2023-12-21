<?php
get_header(); 
get_template_part('sections/specia','breadcrumb'); ?>

<section class="page-wrapper">
	<div class="background-overlay">
	<div class="container">
		<div class="row">
			<?php
			if ( have_posts() ) :
			
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					if ('product' == get_post_type()) {
						get_template_part( 'template-parts/content', 'woo' );
					} else {
						if ('page' == get_post_type()) {
							
						}else {
							get_template_part( 'template-parts/content', 'search' );
						}
						
					}
					
					
					

				endwhile;


			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
		</div>
	</div>
	</div>
</section>

<?php
get_footer();
