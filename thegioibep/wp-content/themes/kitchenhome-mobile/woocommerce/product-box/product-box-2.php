<?php global $product; ?>

<div class="items-prd__groups">
    <div class="img-prds__groups">
        <a href="<?php the_permalink(); ?>" title="" class="image" tabindex="0">
			<img src="<?php echo lth_custom_img('full', 220, 220);?>" alt="<?php the_title(); ?>" width="220" height="220">
		</a>
    </div>
    <div class="intros-prds__groups">
        <div class="logos-producer__prds mb-15s">
            <?php $terms_child = get_sub_field('category_child');
					if( $terms_child ) { $j;
						foreach( $terms_child as $term_child ){ $j++;
							if ($j == 1) {
								$term_child_id = $term_child->term_id;
							}
						}
					}
				?>

				<?php
			        $terms = get_the_terms( $post->ID, 'product_cat' );
		 
					if ( $terms && ! is_wp_error( $terms ) ) :
					 
					    foreach ( $terms as $term ) { 
					    	if ($term->term_id == $term_child_id) { ?>
					    		<a href="<?php echo get_term_link( $term ); ?>" title="">
						        	<?php	
										$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
										$image = wp_get_attachment_url( $thumbnail_id );
										if ($image) { ?>
											<img src="<?php echo $image; ?>" alt="Trademark" width="120" height="51">
										<?php } else {
											echo $term->name;
										}
									?>
								</a>
						    <?php }
						}
					endif; 
				?>
        </div>
        <h3>
        	<a href="<?php the_permalink(); ?>" title="" tabindex="0" class="names-prds__groups mb-10s">
				<?php the_title(); ?>
			</a> 
        </h3>
        <?php get_template_part('woocommerce/loop/rating', '2'); ?>        
        <p class="price-prds__groups fs-18s">
        	<?php
			if ($product->get_price_html()) {
				echo $product->get_price_html();
			} else {
				echo '<span class="amount">';
				echo __('Giá: Liên hệ');
				echo '</span>';
			}
			?>
        </p>
    </div>
</div>