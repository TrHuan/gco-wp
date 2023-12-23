
<div class="lth-breadcrumbs">
	<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-content.php'); ?>

	<?php $cat = get_queried_object(); ?>

	<?php $category_style = get_field('category_style', $cat);

	if ($category_style == 'style_2') { ?>
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<?php 
			        $args = array(
			            'parent' => $cat->term_id,
			            'orderby' => 'ID',
						'order'   => 'ASC',
			        );

			        $terms = get_terms( 'product_cat', $args );
			                 
			        if ( $terms ) { ?>
			            <div class="module_categories">
			                <div class="module_content">
			                    <div class="groups-box">
			                    	<?php foreach ( $terms as $term ) { ?>
			                        <div class="item">
			                            <article class="post-box">
			                                <div class="post-image">
			                                    <a href="<?php echo get_term_link( $term ); ?>" title="" tabindex="0" class="image">
			                                    	<?php $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                                                    $image = wp_get_attachment_url( $thumbnail_id );
                                                    if ($image) { ?>
                                                        <img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>" width="118" height="100">
                                                    <?php } ?>
			                                    </a>
			                                </div>
			                                <div class="post-content">
			                                    <h3 class="post-name">
			                                        <a href="<?php echo get_term_link( $term ); ?>" title="" tabindex="0"><?php echo $term->name; ?></a>
			                                    </h3>   
			                                </div>
			                            </article>
			                        </div>
			                        <!-- item -->
			                    	<?php } ?>
			                    </div>
			                </div>
			            </div>                  
			        <?php } ?> 
				</div>
			</div>
		</div>
	<?php } ?>

	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-image.php'); ?>
			</div>
		</div>
	</div>
</div>