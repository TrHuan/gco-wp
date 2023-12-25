<div class="agent-list-wrap">
	<div class="d-flex">
		<div class="agent-list-image">
			<a href="<?php the_permalink(); ?>">
				<?php get_template_part('template-parts/realtors/investor/image'); ?>
			</a>
		</div>

		<div class="agent-list-content flex-grow-1 investor-page">
			<div class="d-flex xxs-column">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
				<?php 
                if( houzez_option( 'agency_review', 0 ) != 0 ) {
                    get_template_part('template-parts/realtors/rating'); 
                }?>
			</div>
			
			<?php 
			if( houzez_option('agency_address', 1) ) {
				get_template_part('template-parts/realtors/investor/address'); 
			}?>

			<div class="agent-list-contact investor-description">
				
				<?php
				$agency_desc = get_field('investor_description');
				if( $agency_desc ) {
					echo $agency_desc;
				} 

				?>
			</div>

			<div class="d-flex sm-column">
				<div class="agent-social-media flex-grow-1"></div>
				<a class="agent-list-link" href="<?php the_permalink(); ?>"><strong><?php esc_html_e('Xem chi tiết', 'houzez'); ?></strong></a>
			</div>

			<hr>

			<div class="d-flex sm-column">
				<div class="agent-social-media flex-grow-1 project-social">
					<?php 
					$investor_project = get_field('investor_project');
					if( $investor_project ) {
						echo '<a href="'. $investor_project .'" target=_blank> Dự án nổi bật</a>'; 
					}?>
				</div>
				<div class="project-social">
					<?php 
						$new_galaxy = get_field('new_galaxy');
						if( $new_galaxy ) {
							echo '<a href="'. $new_galaxy .'" target=_blank> New Galaxy</a>'; 
						}
					?>
					<span> | </span>
					<?php 
						$q7_boulevard = get_field('q7_boulevard');
						if( $q7_boulevard ) {
							echo '<a href="'. $q7_boulevard .'" target=_blank> Q7 Boulevard</a>'; 
						}
					?>
				</div>
			</div>

		</div>
	</div>
</div>