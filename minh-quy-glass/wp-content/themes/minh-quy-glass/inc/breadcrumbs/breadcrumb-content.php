
<div class="nav-breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<?php if (!is_home()) : ?>
					<div class="content-box">
						<?php						
							if ( get_post_type() != 'product' ) {
								the_breadcrumb(); 
							} else {
								do_action('woo_custom_breadcrumb'); 
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>