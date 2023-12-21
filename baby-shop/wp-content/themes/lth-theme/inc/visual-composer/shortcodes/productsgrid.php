<?php
if ( ! class_exists( 'Shortcode_Products_Grid' ) ) {
	class Shortcode_Products_Grid extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'productsgrid';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'productsgrid', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-products equal-container better-height' );
			$css_class[] = $atts['el_class'];
			$css_class[] = $atts['product_custom_id'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'productsgrid', $atts );
			$term = $atts['product_cat_slug'];
			if ($term != 'all') {
				if ($atts['ids']) {
					$args = array(
						'post_type'           => 'product',
						'post_status'         => 'publish',
						'ignore_sticky_posts' => 1,
						'suppress_filter'     => true,
						'orderby'             => $atts['orderby'],
						'order'               => $atts['order'],
						'posts_per_page'	  => $atts['per_page'],
						'post__in'			  => explode( ',', $atts['ids'] ),
						'tax_query' => array(
					        array(
					            'taxonomy' => 'product_cat',
					            'field'    => 'term_id',
					            'terms'    => $term,
					        ),
					    ),
					);
				} else {
					$args = array(
						'post_type'           => 'product',
						'post_status'         => 'publish',
						'ignore_sticky_posts' => 1,
						'suppress_filter'     => true,
						'orderby'             => $atts['orderby'],
						'order'               => $atts['order'],
						'posts_per_page'	  => $atts['per_page'],
						'tax_query' => array(
					        array(
					            'taxonomy' => 'product_cat',
					            'field'    => 'term_id',
					            'terms'    => $term,
					        ),
					    ),
					);
				}
			} elseif ($term == 'all') {
				if ($atts['ids']) {
					$args = array(
						'post_type'           => 'product',
						'post_status'         => 'publish',
						'ignore_sticky_posts' => 1,
						'suppress_filter'     => true,
						'orderby'             => $atts['orderby'],
						'order'               => $atts['order'],
						'posts_per_page'	  => $atts['per_page'],
						'post__in'			  => explode( ',', $atts['ids'] ),
					);
				} else {
					$args = array(
						'post_type'           => 'product',
						'post_status'         => 'publish',
						'ignore_sticky_posts' => 1,
						'suppress_filter'     => true,
						'orderby'             => $atts['orderby'],
						'order'               => $atts['order'],
						'posts_per_page'	  => $atts['per_page'],
						// 'post__in'			  => explode( ',', $atts['ids'] ),
					);
				}
			}
			$loop_posts   = new WP_Query( $args );
			$i            = 0;
			ob_start();
			?>
		        <?php if ( $loop_posts->have_posts() ) : ?>
		          	<div class="vk-home__shop mb-4">
			            <div class="container">
			                <div class="vk-home__title-box">
			                    <h2 class="vk-home__title"><?php echo $atts['title']; ?></h2>

			                    <?php
			                    	$args = array(
								        'taxonomy'     => 'product_cat',
								        'parent'       => $term,
								        'orderby'	   => 'ID',
								        'order'   => 'ASC',
								    );
								    $all_categories = get_terms( $args );
			                    ?>
			                    <ul class="vk-home__cat-list vk-list vk-list--inline">
			                    	<?php foreach ($all_categories as $cat) { ?>
				                        <li class="vk-list__item">
				                        	<a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>"><?php echo $cat->name; ?></a>
				                        </li>
				                    <?php } ?>
			                    </ul>
			                </div>

			                <div class="vk-shop__box vk-shop__box--style-1">
			                    <div class="vk-shop__list row no-gutters">
			                    	<?php while ( $loop_posts->have_posts() ) : $loop_posts->the_post(); ?>
			                        <div class="col-6  col-md-4 col-lg-3 col-lg-5--self _item">
			                        	<?php get_template_part('woocommerce/product-box/product-box', ''); ?>			                            
			                        </div>
			                        <?php endwhile; ?>
			                    </div>

			                </div>

			            </div>
			        </div>
			    <?php endif; ?>
			<?php
			wp_reset_postdata();
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Products_Grid', $html, $atts, $content );
		}
	}

	new Shortcode_Products_Grid();
}