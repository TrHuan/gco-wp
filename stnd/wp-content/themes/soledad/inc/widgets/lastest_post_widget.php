<?php
/**
 * Lastest post widget
 * Get recent posts and display in widget
 *
 * @package Wordpress
 * @since 1.0
 */

add_action( 'widgets_init', 'penci_latest_news_load_widget' );

function penci_latest_news_load_widget() {
	register_widget( 'penci_latest_news_widget' );
}

if( ! class_exists( 'penci_latest_news_widget' ) ) {
	class penci_latest_news_widget extends WP_Widget {

		/**
		 * Widget setup.
		 */
		function __construct() {
			/* Widget settings. */
			$widget_ops = array( 'classname' => 'penci_latest_news_widget', 'description' => esc_html__('A widget that displays your recent posts from all categories or a category', 'soledad') );

			/* Widget control settings. */
			$control_ops = array( 'id_base' => 'penci_latest_news_widget' );

			/* Create the widget. */
			global $wp_version;
			if( 4.3 > $wp_version ) {
				$this->WP_Widget( 'penci_latest_news_widget', esc_html__('.Soledad Recent Posts', 'soledad'), $widget_ops, $control_ops );
			} else {
				parent::__construct( 'penci_latest_news_widget', esc_html__( '.Soledad Recent Posts', 'soledad' ), $widget_ops, $control_ops );
			}
		}

		/**
		 * How to display the widget on the screen.
		 */
		function widget( $args, $instance ) {
			extract( $args );

			/* Our variables from the widget settings. */
			$title       = apply_filters( 'widget_title', $instance['title'] );
			$categories  = isset( $instance['categories'] ) ? $instance['categories'] : '';
			$orderby      = isset( $instance['orderby'] ) ? $instance['orderby'] : 'date';
			$order      = isset( $instance['order'] ) ? $instance['order'] : 'DESC';
			$number      = isset( $instance['number'] ) ? $instance['number'] : '';
			$offset      = isset( $instance['offset'] ) ? $instance['offset'] : '';
			$title_length      = isset( $instance['title_length'] ) ? $instance['title_length'] : '';
			$featured    = isset( $instance['featured'] ) ? $instance['featured'] : false;
			$twocolumn   = isset( $instance['twocolumn'] ) ? $instance['twocolumn'] : false;
			$featured2   = isset( $instance['featured2'] ) ? $instance['featured2'] : false;
			$allfeatured = isset( $instance['allfeatured'] ) ? $instance['allfeatured'] : false;
			$thumbright  = isset( $instance['thumbright'] ) ? $instance['thumbright'] : false;
			$postdate    = isset( $instance['postdate'] ) ? $instance['postdate'] : false;
			$icon        = isset( $instance['icon'] ) ? $instance['icon'] : false;
			$image_type  = isset( $instance['image_type'] ) ? $instance['image_type'] : 'default';
			$ptfsfe  = isset( $instance['ptfsfe'] ) ? absint( $instance['ptfsfe'] ) : '';
			$ptfs  = isset( $instance['ptfs'] ) ? absint( $instance['ptfs'] ) : '';
			$pmfs  = isset( $instance['pmfs'] ) ? absint( $instance['pmfs'] ) : '';

			$query = array( 'showposts' => $number );

			$term_name = get_cat_name( $categories );
			$term = term_exists( $term_name, 'category');
			
			if ($term !== 0 && $term !== null) {
				$query['cat'] = $categories;
			}
			if( $orderby ){
				$query['orderby'] = $orderby;
			}
			if( $order ){
				$query['order'] = $order;
			}
			if( $offset ) {
				$query['offset'] = $offset;
			}

			$loop = new WP_Query($query);
			if ($loop->have_posts()) :

				/* Before widget (defined by themes). */
				echo ent2ncr( $before_widget );

				/* Display the widget title if one was input (before and after defined by themes). */
				if ( $title ){
					echo ent2ncr( $before_title ) . $title . ent2ncr( $after_title );
				}
				
				$rand = rand( 1000, 10000);
				?>
				<ul id="penci-latestwg-<?php echo sanitize_text_field( $rand ); ?>" class="side-newsfeed<?php if( $twocolumn && ! $allfeatured ): echo ' penci-feed-2columns'; if( $featured ){ echo ' penci-2columns-featured'; } else { echo ' penci-2columns-feed'; } endif;?>">
					<?php $num = 1; while ($loop->have_posts()) : $loop->the_post(); ?>
						<li class="penci-feed<?php if( ( ( $num == 1 ) && $featured ) || $allfeatured ): echo ' featured-news'; if( $featured2 ): echo ' featured-news2'; endif; endif;  ?><?php if( $allfeatured ): echo ' all-featured-news'; endif;  ?>">
							<div class="side-item">

								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
									<div class="side-image<?php if( $thumbright ): echo ' thumbnail-right'; endif;  ?>">
										<?php
										/* Display Review Piechart  */
										if( function_exists('penci_display_piechart_review_html') ) {
											$size_pie = 'small';
											if( ( ( $num == 1 ) && $featured ) || $allfeatured ): $size_pie = 'normal'; endif;
											penci_display_piechart_review_html( get_the_ID(), $size_pie );
										}
										$thumb = penci_featured_images_size('small');
										if( ( ( $num == 1 ) && $featured ) || $allfeatured ): $thumb = penci_featured_images_size(); endif;
										if( $image_type == 'horizontal' ){
											$thumb = 'penci-thumb-small';
											if( ( ( $num == 1 ) && $featured ) || $allfeatured ): $thumb = 'penci-thumb'; endif;
										} elseif( $image_type == 'square' ) {
											$thumb = 'penci-thumb-square';
										} elseif( $image_type == 'vertical' ) {
											$thumb = 'penci-thumb-vertical';
										}
										?>
										<?php if( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
											<a class="penci-image-holder penci-lazy<?php if( ( ( $num == 1 ) && $featured ) || $allfeatured ){ echo ''; } else { echo ' small-fix-size'; } ?>" rel="bookmark" data-src="<?php echo penci_get_featured_image_size( get_the_ID(), $thumb ); ?>" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
										<?php } else { ?>
											<a class="penci-image-holder<?php if( ( ( $num == 1 ) && $featured ) || $allfeatured ){ echo ''; } else { echo ' small-fix-size'; } ?>" rel="bookmark" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumb ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
										<?php }?>

										<?php if( $icon ): ?>
											<?php if ( has_post_format( 'video' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('fas fa-play'); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'audio' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('fas fa-music'); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'link' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('fas fa-link'); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'quote' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('fas fa-quote-left'); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'gallery' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('far fa-image'); ?></a>
											<?php endif; ?>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<div class="side-item-text">
									<h4 class="side-title-post">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
											<?php
											if( ! $title_length || ! is_numeric( $title_length ) ){
												if( $featured2 && ( ( ( $num == 1 ) && $featured ) || $allfeatured ) ) { echo wp_trim_words( wp_strip_all_tags( get_the_title() ), 12, '...' ); } else { the_title(); } 
											} else {
												echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' );
											}
											?>
										</a>
									</h4>
									<?php if( ! $postdate ): ?>
										<span class="side-item-meta"><?php penci_soledad_time_link(); ?></span>
									<?php endif; ?>
								</div>
							</div>
						</li>
						<?php $num++; endwhile; ?>
				</ul>
			<?php
			$attrstyle = '';
			if( $ptfsfe ){ $attrstyle .= '.widget ul#penci-latestwg-'. $rand .' li.featured-news .side-item .side-item-text h4 a{ font-size: '. $ptfsfe .'px; }'; }
			if( $ptfs ){ $attrstyle .= '.widget ul#penci-latestwg-'. $rand .' li:not(.featured-news) .side-item .side-item-text h4 a{ font-size: '. $ptfs .'px; }'; }
			if( $pmfs ){ $attrstyle .= '.widget ul#penci-latestwg-'. $rand .' li .side-item .side-item-text .side-item-meta{ font-size: '. $pmfs .'px; }'; }
			if( $image_type == 'horizontal' ){
				$attrstyle .= '#penci-latestwg-' . $rand . ' .penci-image-holder:before{ padding-top: 66.6667%; }';
			} elseif( $image_type == 'square' ) {
				$attrstyle .= '#penci-latestwg-' . $rand . ' .penci-image-holder:before{ padding-top: 100%; }';
			} elseif( $image_type == 'vertical' ) {
				$attrstyle .= '#penci-latestwg-' . $rand . ' .penci-image-holder:before{ padding-top: 135.4%; }';
			}
			
			if( $attrstyle ){ echo '<style type="text/css">'. $attrstyle .'</style>'; }
			
			/* After widget (defined by themes). */
			echo ent2ncr( $after_widget );
			
			wp_reset_postdata();
			endif;
		}

		/**
		 * Update the widget settings.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['title']        = $new_instance['title'];
			$instance['categories']   = $new_instance['categories'];
			$instance['orderby'] = $new_instance['orderby'];
			$instance['order']   = $new_instance['order'];
			$instance['number']       = $new_instance['number'];
			$instance['offset']       = $new_instance['offset'];
			$instance['title_length'] = $new_instance['title_length'];
			$instance['featured']     = $new_instance['featured'];
			$instance['twocolumn']    = $new_instance['twocolumn'];
			$instance['featured2']    = $new_instance['featured2'];
			$instance['allfeatured']  = $new_instance['allfeatured'];
			$instance['thumbright']   = $new_instance['thumbright'];
			$instance['postdate']     = $new_instance['postdate'];
			$instance['icon']         = $new_instance['icon'];
			$instance['image_type']   = $new_instance['image_type'];
			$instance['ptfsfe']   = $new_instance['ptfsfe'];
			$instance['ptfs']   = $new_instance['ptfs'];
			$instance['pmfs']   = $new_instance['pmfs'];

			return $instance;
		}


		function form( $instance ) {

			/* Set up some default widget settings. */
			$defaults = array( 'title' => esc_html__('Recent Posts', 'soledad'), 'ptfsfe' => '', 'ptfs' => '', 'orderby' => 'date', 'order' => 'DESC', 'pmfs' => '', 'image_type' => 'default', 'title_length' => '', 'number' => 5, 'offset' => '', 'categories' => '', 'featured' => false, 'allfeatured' => false, 'thumbright' => false, 'twocolumn' => false, 'featured2' => false, 'postdate' => false, 'icon' => false );
			$instance = wp_parse_args( (array) $instance, $defaults );

			$instance_title = $instance['title'] ? str_replace( '"','&quot;', $instance['title'] ) : '';
			?>

			<!-- Widget Title: Text Input -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'soledad'); ?></label>
				<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo $instance_title; ?>"  />
			</p>

			<!-- Category -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('categories') ); ?>"><?php esc_html_e('Filter by Category:', 'soledad'); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id('categories') ); ?>" name="<?php echo esc_attr( $this->get_field_name('categories') ); ?>" class="widefat categories" style="width:100%;">
					<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php esc_html_e('All categories', 'soledad'); ?></option>
					<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
					<?php foreach($categories as $category) { ?>
						<option value='<?php echo esc_attr( $category->term_id ); ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo sanitize_text_field( $category->cat_name ); ?></option>
					<?php } ?>
				</select>
			</p>
			
			<!-- Image Size -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('image_type') ); ?>"><?php esc_html_e('Featured Images Type:', 'soledad'); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id('image_type') ); ?>" name="<?php echo esc_attr( $this->get_field_name('image_type') ); ?>" class="widefat image_type" style="width:100%;">
					<option value='default' <?php if ('default' == $instance['image_type']) echo 'selected="selected"'; ?>><?php esc_html_e('Default ( follow on Customize )', 'soledad'); ?></option>
					<option value='horizontal' <?php if ('horizontal' == $instance['image_type']) echo 'selected="selected"'; ?>><?php esc_html_e('Horizontal Size', 'soledad'); ?></option>
					<option value='square' <?php if ('square' == $instance['image_type']) echo 'selected="selected"'; ?>><?php esc_html_e('Square Size', 'soledad'); ?></option>
					<option value='vertical' <?php if ('vertical' == $instance['image_type']) echo 'selected="selected"'; ?>><?php esc_html_e('Vertical Size', 'soledad'); ?></option>
				</select>
			</p>
			
			<!-- Order by -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('orderby') ); ?>"><?php esc_html_e('Order By:', 'soledad'); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id('orderby') ); ?>" name="<?php echo esc_attr( $this->get_field_name('orderby') ); ?>" class="widefat orderby" style="width:100%;">
					<option value='date' <?php if ('date' == $instance['orderby']) echo 'selected="selected"'; ?>><?php esc_html_e('Published Date', 'soledad'); ?></option>
					<option value='ID' <?php if ('ID' == $instance['orderby']) echo 'selected="selected"'; ?>><?php esc_html_e('Posts ID', 'soledad'); ?></option>
					<option value='title' <?php if ('title' == $instance['orderby']) echo 'selected="selected"'; ?>><?php esc_html_e('Posts Titles', 'soledad'); ?></option>
					<option value='modified' <?php if ('modified' == $instance['orderby']) echo 'selected="selected"'; ?>><?php esc_html_e('Modified Date', 'soledad'); ?></option>
					<option value='comment_count' <?php if ('comment_count' == $instance['orderby']) echo 'selected="selected"'; ?>><?php esc_html_e('Comment Count', 'soledad'); ?></option>
					<option value='rand' <?php if ('rand' == $instance['orderby']) echo 'selected="selected"'; ?>><?php esc_html_e('Random', 'soledad'); ?></option>
				</select>
			</p>
			
			<!-- Order -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('order') ); ?>"><?php esc_html_e('Select Order Type:', 'soledad'); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id('order') ); ?>" name="<?php echo esc_attr( $this->get_field_name('order') ); ?>" class="widefat orderby" style="width:100%;">
					<option value='DESC' <?php if ('DESC' == $instance['order']) echo 'selected="selected"'; ?>><?php esc_html_e('DESC ( Descending Order )', 'soledad'); ?></option>
					<option value='ASC' <?php if ('ASC' == $instance['order']) echo 'selected="selected"'; ?>><?php esc_html_e('ASC ( Ascending Order )', 'soledad'); ?></option>
				</select>
			</p>

			<!-- Number of posts -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e('Number of posts to show:', 'soledad'); ?></label>
				<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>" size="3" />
			</p>
			
			<!-- Offset of posts -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e('Number of offset Posts:', 'soledad'); ?></label>
				<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" value="<?php echo esc_attr( $instance['offset'] ); ?>" size="3" />
			</p>
			
			<!-- Custom trim post titles -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>"><?php esc_html_e('Custom words length for post titles:', 'soledad'); ?></label>
				<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_length' ) ); ?>" value="<?php echo esc_attr( $instance['title_length'] ); ?>" size="3" />
				<span class="description" style="display: block; padding: 0;font-size: 12px;">If your post titles is too long - You can use this option for trim it. Fill number value here.</span>
			</p>

			<!-- Display thumbnail right -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'thumbright' ) ); ?>"><?php esc_html_e('Display thumbnail on right?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'thumbright' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumbright' ) ); ?>" <?php checked( (bool) $instance['thumbright'], true ); ?> />
			</p>

			<!-- 2 Columns -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'twocolumn' ) ); ?>"><?php esc_html_e('Display on 2 columns?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'twocolumn' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twocolumn' ) ); ?>" <?php checked( (bool) $instance['twocolumn'], true ); ?> />
				<span class="description" style="display: block; padding: 0;font-size: 12px;">If you use 2 columns option, it will ignore option display thumbnail on right.</span>
			</p>

			<!-- Display latest post featured -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"><?php esc_html_e('Display 1st post featured?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" <?php checked( (bool) $instance['featured'], true ); ?> />
			</p>

			<!-- Display latest post featured style 2 -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'featured2' ) ); ?>"><?php esc_html_e('Display featured post style 2?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'featured2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'featured2' ) ); ?>" <?php checked( (bool) $instance['featured2'], true ); ?> />
			</p>

			<!-- Display big post -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'allfeatured' ) ); ?>"><?php esc_html_e('Display all post featured?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'allfeatured' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'allfeatured' ) ); ?>" <?php checked( (bool) $instance['allfeatured'], true ); ?> />
				<span class="description" style="display: block; padding: 0;font-size: 12px;">If you use all post featured option, it will ignore option display thumbnail on right & 2 columns.</span>
			</p>

			<!-- Hide post date -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'postdate' ) ); ?>"><?php esc_html_e('Hide post date?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'postdate' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'postdate' ) ); ?>" <?php checked( (bool) $instance['postdate'], true ); ?> />
			</p>

			<!-- Enable post format icon -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php esc_html_e('Show icon post format?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" <?php checked( (bool) $instance['icon'], true ); ?> />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ptfsfe' ) ); ?>"><?php esc_html_e('Post Title Font Size on Featured Posts ( Default: 18 )', 'soledad'); ?></label>
				<input  type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ptfsfe' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ptfsfe' ) ); ?>" value="<?php echo esc_attr( $instance['ptfsfe'] ); ?>" size="3" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ptfs' ) ); ?>"><?php esc_html_e('Post Title Font Size ( Default: 16 )', 'soledad'); ?></label>
				<input  type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ptfs' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ptfs' ) ); ?>" value="<?php echo esc_attr( $instance['ptfs'] ); ?>" size="3" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'pmfs' ) ); ?>"><?php esc_html_e('Post Meta Font Size ( Default: 13 )', 'soledad'); ?></label>
				<input  type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pmfs' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pmfs' ) ); ?>" value="<?php echo esc_attr( $instance['pmfs'] ); ?>" size="3" />
			</p>

			<?php
		}
	}
}
?>