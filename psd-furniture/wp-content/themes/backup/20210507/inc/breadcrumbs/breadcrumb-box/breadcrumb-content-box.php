<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="position: initial;">
			<div class="module module__breadcrumbs">
				<div class="module__content">
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
								} else if (is_tax()) {
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

				<div class="socials-box">
					<ul>
						<?php if( have_rows('socials_breadcrumb', 'option') ): ?> 
							<?php while( have_rows('socials_breadcrumb', 'option') ): the_row(); ?>
								<?php
									$title = get_sub_field('title', 'option');
									$url = get_sub_field('url', 'option');
									$icon_image = get_sub_field('icon_image', 'option');
									$icon_class = get_sub_field('icon_class', 'option');
								?>

								<li>
									<a href="<?php if ($url) {echo $url;} else { echo '#';} ?>">
										<?php if ($icon_image || $icon_class) { ?>
											<span class="icon">
												<?php if ($icon_image) { ?>
													<img src="<?php echo $icon_image; ?>" alt="Social">
												<?php } else { ?>
													<i class="<?php echo $icon_class; ?>"></i>
												<?php } ?>
											</span>
										<?php } ?>

										<?php if ($title) { ?>
											<span class="icon-title"><?php echo $title; ?></span>
										<?php } ?>
									</a>
								</li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>