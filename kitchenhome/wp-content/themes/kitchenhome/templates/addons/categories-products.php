<?php while( have_rows('categories_products') ): the_row(); ?>
	<div class="module module__header">
		<img src="<?php echo ASSETS_URI; ?>/images/icon-21.png" alt="Icon" width="498" height="34">
	</div>

	<div class="module module__brands">
		<div class="module_content">
			<div class="slick-slider slick-brands">
	    		<?php $terms = get_sub_field('category');
				if( $terms ): ?>
				    <?php foreach( $terms as $term ): ?>
						<div class="item">
			    			<div class="content">
								<div class="content-image">
									<a href="<?php echo $term->slug; ?>" target=">" title="" class="image" tabindex="0">
										<?php $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
										$image = wp_get_attachment_url( $thumbnail_id );
										if ($image) { ?>
											<img src="<?php echo $image; ?>" alt="Trademark" width="120" height="51">
										<?php } else {
											echo $term->name;
										} ?>
									</a>
								</div>
							</div>
			    		</div>
			    		<!-- item -->
				    <?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="module module__footer">
		<img src="<?php echo ASSETS_URI; ?>/images/icon-22.png" alt="Icon" width="233" height="26">
	</div>
<?php endwhile; ?>