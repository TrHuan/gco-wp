<?php
    if ( wp_is_mobile() ) { ?>
        <div class="lth-breadcrumbs">
			<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-content.php'); ?>

			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-image.php'); ?>
					</div>
				</div>
			</div>

			<?php $cat = get_queried_object(); ?>

			<?php $category_style = get_field('category_style', $cat);

			if ($category_style == 'style_2') { ?>
				<?php 
		        $args = array(
		            'parent' => $cat->term_id,
		            'orderby' => 'ID',
					'order'   => 'ASC',
		        );

		        $terms = get_terms( 'product_cat', $args );
		                 
		        if ( $terms ) { ?>
					<section class="nav-prds__houseware mt-10s mb-20s">
					    <div class="container">
					        <div class="row gutter-6">
					        	<?php foreach ( $terms as $term ) { ?>
						            <div class="col-3">
						                <div class="items-nav__houseware">
						                	<?php $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
		                                    $image = wp_get_attachment_url( $thumbnail_id );
		                                    if ($image) { ?>
						                    	<a title="" href="<?php echo get_term_link( $term ); ?>"><img alt="<?php echo $term->name; ?>" src="<?php echo $image; ?>"></a>
		                                    <?php } ?>
						                    <h3><a title="" href="<?php echo get_term_link( $term ); ?>" class="names-nav__houseware"><?php echo $term->name; ?></a></h3>
						                </div>
						            </div>
						        <?php } ?>
					        </div>
					    </div>
					</section>
				<?php } ?> 
			<?php } ?>
		</div>
    <?php } else { ?>
        <div class="lth-breadcrumbs">
			<?php require_once(LIBS_DIR . '/breadcrumbs/desktop/breadcrumb-content.php'); ?>

			<?php $cat = get_queried_object(); ?>

			<?php $category_style = get_field('category_style', $cat);

			if ($category_style == 'style_2') { ?>
				<div class="container">
					<div class="row">
						
						<?php 
						$args = array(
							'parent' => $cat->term_id,
							'orderby' => 'ID',
							'order'   => 'ASC',
						);

						$terms = get_terms( 'product_cat', $args );
						if ( $terms ) { ?>
							<section class="nav-prds__housewarePC">
								<?php foreach ( $terms as $term ) { ?>
									<div class="items-nav__housewarePC">
										<?php $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
										$image = wp_get_attachment_url( $thumbnail_id );
										if ($image) { ?>
											<a title="" href="<?php echo get_term_link( $term ); ?>"><img alt="<?php echo $term->name; ?>" src="<?php echo $image; ?>"></a>
										<?php } ?>
										<h3><a title="" href="<?php echo get_term_link( $term ); ?>" class="names-nav__houseware"><?php echo $term->name; ?></a></h3>
									</div>
								<?php } ?>
							</section>
						<?php } ?>    
					       
					</div>
				</div>
			<?php } ?>

			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<?php require_once(LIBS_DIR . '/breadcrumbs/desktop/breadcrumb-image.php'); ?>
					</div>
				</div>
			</div>
		</div>
    <?php }
?>

