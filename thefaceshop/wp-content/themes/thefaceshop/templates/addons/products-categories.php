
<?php while( have_rows('categories_products') ): the_row(); ?>
	<div class="module module_categories out-categorie">
		<div class="module_title section-title text-center mb-50">
            <h1><?php the_sub_field('title'); ?></h1>
            <p><?php the_sub_field('description'); ?></p>
        </div>

        <?php $terms = get_sub_field('categories');
        if( $terms ): ?>
		<div class="module_content main-categorie">
			<!-- Categorie Activation Start -->
            <div class="categorie-acitve owl-carousel text-center pb-80">
				<?php foreach( $terms as $term ): ?>
                <!-- Single Categorie Start -->
                <div class="single-categorie">
                    <div class="cat-img">
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><img src="<?php echo wp_get_attachment_url( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) ); ?>" alt="cat-img"></a>
                    </div>
                    <div class="cat-name">
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?> <span class="cat-number">(<?php echo esc_html( $term->count ); ?>)</span></a>
                    </div>
                </div>
                <!-- Single Categorie End -->
            	<?php endforeach; ?>
            </div>
            <!-- Categorie Activation End -->
		</div>
		<?php endif; ?>
	</div>
<?php endwhile; ?>