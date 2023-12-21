<?php
if ( ! class_exists( 'Shortcode_Products' ) ) {
	class Shortcode_Products extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'productsslider';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'productsslider', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-products equal-container better-height' );
			$css_class[] = $atts['el_class'];
			$css_class[] = $atts['product_custom_id'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'productsslider', $atts );
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

			$rands = rand();
		    $rand = $rands;
			ob_start();
			?>
	          <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>">
				<?php if ( $loop_posts->have_posts() ) : ?>
                    <div class="product-list-owl owl-slick <?php echo esc_attr( $owl_settings ); ?> slick-slider-<?php echo $rand; ?>">
					<?php while ( $loop_posts->have_posts() ) : $loop_posts->the_post();
						?>
                       
						<?php get_template_part('woocommerce/product-box/product-box', ''); ?>

					<?php endwhile; ?>
                    </div>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
	          </div>

	          <?php
		          $arrow = $atts['owl_navigation'];
			    	if ($arrow == 'true') {
				    	$prevArrow = '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>';
				    	$nextArrow = '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>';
			    	}
	            ?>
	            <script type="text/javascript">		
				jQuery(document).ready(function($) {
				    $(".slick-slider-<?php echo $rand; ?>").slick({
				        rows: <?php echo $atts['owl_number_row']; ?>,
				        vertical: <?php echo $atts['owl_vertical']; ?>,
				        verticalSwiping: <?php echo $atts['owl_verticalswiping']; ?>,
				        autoplay: <?php echo $atts['owl_autoplay']; ?>,
				        autoplaySpeed: <?php echo $atts['owl_autoplayspeed']; ?>,
				        prevArrow: '<?php echo $prevArrow; ?>',
				        nextArrow: '<?php echo $nextArrow; ?>',
				        dots: <?php echo $atts['owl_dots']; ?>,
				        loop: <?php echo $atts['owl_loop']; ?>,
				        speed: <?php echo $atts['owl_slidespeed']; ?>,
				        infinite: true,
				        slidesPerRow: <?php echo $atts['owl_ls_items']; ?>,
				        slidesToShow: 1,
				        adaptiveHeight: true,
				        responsive: [
				            {
				                breakpoint: 1500,
				                settings: {
				                    rows: <?php echo $atts['owl_number_row']; ?>,
				                    slidesPerRow: <?php echo $atts['owl_xl_items']; ?>,
				                }
				            },
				            {
				                breakpoint: 1200,
				                settings: {
				                    rows: <?php echo $atts['owl_number_row']; ?>,
				                    slidesPerRow: <?php echo $atts['owl_lg_items']; ?>,
				                }
				            },
				            {
				                breakpoint: 992,
				                settings: {
				                    rows: <?php echo $atts['owl_number_row']; ?>,
				                    slidesPerRow: <?php echo $atts['owl_md_items']; ?>,
				                }
				            },
				            {
				                breakpoint: 768,
				                settings: {
				                    rows: 1,
				                    slidesPerRow: <?php echo $atts['owl_sm_items']; ?>,
				                }
				            },
				            {
				                breakpoint: 576,
				                settings: {
				                    rows: 1,
				                    slidesPerRow: <?php echo $atts['owl_ts_items']; ?>,
				                }
				            }
				        ]
				    });
				});
			</script>
			<?php
			wp_reset_postdata();
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Products', $html, $atts, $content );
		}
	}

	new Shortcode_Products();
}