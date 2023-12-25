<?php while( have_rows('categories_products') ): the_row(); ?>
	<h2 class="titles-trademark__mains fs-14s mb-10s"><?php echo __('Thương hiệu'); ?></h2>
    <div class="row gutter-6">
    	<?php $terms = get_sub_field('category');
		if( $terms ): ?>
		    <?php foreach( $terms as $term ): ?>
		        <div class="col-4">
		            <div class="items-trademark__mains">
		                <a href="<?php echo get_term_link( $term ); ?>" target=">" title="" class="image" tabindex="0">
							<?php $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
							$image = wp_get_attachment_url( $thumbnail_id );
							if ($image) { ?>
								<img src="<?php echo $image; ?>" alt="Trademark" width="170" height="72">
							<?php } else {
								echo $term->name;
							} ?>
						</a>
		            </div>
		        </div>
		    <?php endforeach; ?>
		<?php endif; ?>
    </div>
<?php endwhile; ?>