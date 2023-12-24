<?php
/**
 * Template Name: Addon Categories
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $id = get_sub_field('id');
    if ($id) {
    	$id = 'lth-' . $id;
    }

    $class = get_sub_field('class');
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-categories <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="module module__categories">
            		<?php
						$title = get_sub_field('title');
						$description = get_sub_field('description');

						if ($title || $description) {
					?>
						<div class="title-box">
							<?php if ($title) { ?>
								<h3 class="title"><?php echo $title; ?></h3>
							<?php }?>
							<?php if ($description) { ?>
								<p><?php echo $description; ?></p>
							<?php }?>
						</div>
					<?php } ?>

					<?php if( have_rows('categories') ): ?> 
						<div class="module__content">
							<div class="slick-slider slick-categories">
								<?php while( have_rows('categories') ): the_row(); ?>
									<div class="item">
										<div class="content-box">
								    		<?php
								    			$img = get_sub_field('image');

												$term = get_sub_field('category');
												$cat = get_term( $term );
												if( $cat ): 
											?>
												<?php if ($img) { ?>
													<div class="content-image">
														<div class="image">
															<a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" title="">
																<img src="<?php echo $img; ?>" alt="Category" width="1920" height="1080">
															</a>
														</div>
													</div>
												<?php } ?>

												<div class="content">
												    <h4 class="content-name">
												    	<a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" title="">
												    		<?php echo esc_html( $cat->name ); ?>
												    	</a>
												    </h4>

												    <div class="content-excerpt">
				                                        <?php echo esc_html( $cat->description ); ?>
				                                    </div>

				                                    <div class="content-button">
				                                    	<a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" title=""><?php echo __('Xem thêm'); ?> <i class="icofont-arrow-right icon"></i></a>
				                                    </div>
												</div>
											<?php endif; ?>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</article>