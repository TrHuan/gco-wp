<?php
if ( ! class_exists( 'Shortcode_Blog' ) ) {
	class Shortcode_Blog extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'blog';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'blog', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-blogs equal-container better-height' );
			$css_class[] = $atts['el_class'];
			$css_class[] = $atts['blog_custom_id'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'blog', $atts );
			$args = array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'suppress_filter'     => true,
				'orderby'             => $atts['orderby'],
				'order'               => $atts['order'],
			);
			if ( $atts['category_slug'] != '' ) {
				$args['category_name'] = $atts['category_slug'];
			}
			if ( $atts['select_post'] == 1 ) {
				$args['post__in']       = explode( ',', $atts['post_ids'] );
				$args['posts_per_page'] = - 1;
			} else {
				$args['posts_per_page'] = $atts['per_page'];
			}
			$loop_posts   = new WP_Query( $args );
			$i            = 0;

			$rands = rand();
		    $rand = $rands;
			ob_start();
			?>
            <div class="vk-home__blog mb-4">
	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-6">
	                        <div class="vk-blog__list vk-slider--style-2" data-slider="blog">
	                        	<?php while ( $loop_posts->have_posts() ) : $loop_posts->the_post(); ?>	
									<?php get_template_part( 'template-parts/post/content', '' ); ?>
								<?php endwhile; ?>	                            
	                        </div>

	                        <div class="vk-blog__nav">
	                            <div>
	                                <a href="#" class="vk-btn vk-btn--grey-1 _prev"><img src="<?php echo ASSETS_URI; ?>/images/ar-5.png" alt="" class="_icon">Tin trước</a>
	                                <a href="#" class="vk-btn vk-btn--grey-1 _next"><img src="<?php echo ASSETS_URI; ?>/images/ar-6.png" alt="" class="_icon">Tin sau</a>
	                            </div>
	                        </div>

	                    </div>
	                    <div class="col-lg-6">
	                        <div class="vk-video">
	                            <div class="embed-responsive embed-responsive-16by9">	
	                                <iframe class="embed-responsive-item" src="<?php echo $atts['video']; ?>" allowfullscreen></iframe>
	                            </div>
	                            <h3 class="vk-video__title"><img src="images/i11.png" alt="" class="_icon">
	                            	<?php echo $atts['video_title']; ?></h3>
	                        </div>

	                    </div>
	                </div>
	            </div>
	        </div>
			<?php
			wp_reset_postdata();
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Blog', $html, $atts, $content );
		}
	}

	new Shortcode_Blog();
}