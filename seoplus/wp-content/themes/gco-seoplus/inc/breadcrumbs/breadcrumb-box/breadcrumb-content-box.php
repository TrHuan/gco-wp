<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="breadcrumbs-content">
				<div class="title-box">
					<?php if (!is_single()) { ?>
						<h1 class="title d-none">
							<?php
								if (is_category()) {
									single_cat_title();
								} else {
	                            	if ( get_post_type() == 'product' && !is_single() ) {
			                            woocommerce_page_title();
		                            } else {
		                            	the_title();
		                            }
								}
							?>	
						</h1>
					<?php } ?>

					<h2 class="title">
						<?php
							if (is_category()) {
								single_cat_title();
							} else {
                            	if ( get_post_type() == 'product' && !is_single() ) {
		                            woocommerce_page_title();
	                            } else {
	                            	the_title();
	                            }
							}
						?>					
					</h2>
				</div>
				
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