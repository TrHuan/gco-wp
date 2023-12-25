<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */

global $sh_option;
get_header(); ?>

<?php 
wp_enqueue_script( 'slick-js');
wp_enqueue_style( 'slick-style' );
wp_enqueue_style( 'slick-theme-style' ); ?>

	<div id="primary" class="content-sidebar-wrap">

		<article class="lth-slidershow">
		    <div class="container-fuild">
		        <div class="row">
		            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
		                <div class="module module_slidershow">
		                    <div class="slick-slider slick-slidershow">			                    	
		                    	<?php $i = 0; foreach ( $sh_option['home-slide'] as $slide ) : ?>
			                        <div class="item">
			                            <div class="content">
			                                <div class="content-image">
		                                        <a href="<?php echo $slide['url'] ?>" title="Image" class="image">
		                                            <img src="<?php echo $slide['image'] ?>" alt="Image" width="1335" height="750">
		                                        </a>
			                                </div>

			                                <div class="content-box">
			                                    <div class="content-text">
				                                    <p class="text-1"><?php echo $slide['title'] ?></p>
				                                    <p class="text-2"><?php echo $slide['description'] ?></p>
			                                	</div>
			                                	<?php if ($slide['url']) { ?>
				                                	<div class="content-button">
				                                		<a href="<?php echo $slide['url'] ?>" title="" class="btn"><?php echo __('Đặt hàng'); ?></a>
				                                	</div>
				                                <?php } ?>
			                                </div>
			                            </div>
			                        </div>	
		                        <?php $i++; endforeach; ?>
		                    </div>
		                </div>
		            </div>

		            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
		            	<div class="module module_banner">
		                    <div class="module_content">
		                        <div class="content">
	                                <div class="content-image">
	                                    <div class="image">
	                                        <a href="#" title="">
	                                            <img src="<?php echo $sh_option['home-slide-banner']['url'] ?>" alt="Image" width="668" height="750">
	                                        </a>
	                                    </div>
	                                </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</article>

		<article class="lth-slider-banners">
		    <div class="container">
		        <div class="row">
		            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		                <div class="module module_slider_banners">
		                    <div class="slick-slider slick-slider-banners">
		                    	<?php $i = 0; foreach ( $sh_option['home-banners-slide'] as $bannersslide ) : ?>
			                        <div class="item">
			                            <div class="content">
			                                <div class="content-image">
		                                        <a href="<?php echo $bannersslide['url'] ?>" title="Image" class="image">
		                                            <img src="<?php echo $bannersslide['image'] ?>" alt="Image" width="450" height="250">
		                                        </a>
			                                </div>
			                            </div>
			                        </div>
		                        <?php $i++; endforeach; ?>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</article>

		<article class="lth-banners">
			<div class="container">
		        <div class="row">
		            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		                <div class="module module_banners">
		                	<div class="module_content">
	                            <div class="content">
	                                <div class="content-image">
                                        <a href="#" title="Image" class="image">
                                            <img src="<?php echo $sh_option['home-banner']['url']; ?>" alt="Image">
                                        </a>
	                                </div>

	                                <div class="content-box">
	                                	<div class="content-text">
		                                    <p class="text-1"><?php echo $sh_option['home-banner-text-top']; ?></p>
		                                    <p class="text-2"><?php echo $sh_option['home-banner-text-bottom']; ?></p>
	                                	</div>
	                                	<div class="content-button">
	                                		<a href="<?php echo $sh_option['home-banner-url']; ?>" title="" class="btn">Đặt hàng</a>
	                                	</div>
		                            </div>
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</article>

		<?php //do_action( 'before_loop_main_content' ) ?>

		<!-- --------------------- Products --------------------- -->
		<?php
		if ( class_exists( 'WooCommerce' ) ) {
			if( $sh_option['list_cat_product'] ) {
				$list_cat_product = $sh_option['list_cat_product'];
				if( $sh_option['number_product'] ) {
					$number_product = $sh_option['number_product'];
				}
				if( $sh_option['number_product_row'] ) {
					$number_product_row = $sh_option['number_product_row'];
				}
				echo '<article class="product-wrap">';
					echo '<div class="container">';
						foreach ($list_cat_product as $key => $idpost) {
							echo '<h2 class="heading title-box"><a class="title" title="'. get_dm_name( $idpost,'product_cat' ) .'" href="'. get_dm_link( $idpost,'product_cat' ) .'">'. get_dm_name( $idpost,'product_cat' ) .'</a></h2>';
							echo do_shortcode('[shproduct posts_per_page="' . $number_product . '" categories="' . $idpost . '" numcol="' . $number_product_row . '"]');
						}
					echo '</div>';
				echo '</article>';
			}
		}
		?>

		<article class="product-wrap">
			<div class="container">
			    <h2 class="heading title-box">
			    	<a class="title" title="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" href="#"><?php echo __('Sản phẩm mới'); ?></a>
			    </h2>

			    <?php $args = array( 'post_type' => 'product','posts_per_page' =>8,); ?>
			    <?php $the_query = new WP_query( $args);?>
				<div class="sh-product-shortcode module_products">
					<!-- <ul class="list-products"> -->
					<ul class="list-products slick-slider slick-products-new">
						<?php
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								wc_get_template_part( 'content', 'product' );
							}
							wp_reset_postdata();
						?>
					</ul>

					<div class="module_button">
                    	<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php echo __('Xem thêm'); ?></a>
                    </div>
				</div>
			</div>
		</article>

		<article class="product-wrap">
			<div class="container">
			    <h2 class="heading title-box">
			    	<a class="title" title="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" href="#"><?php echo __('Tất cả sản phẩm'); ?></a>
			    </h2>

			    <?php $args2 = array( 'post_type' => 'product','posts_per_page' =>12,); ?>
			    <?php $the_query2 = new WP_query( $args2);?>
				<div class="sh-product-shortcode module_products">
					<!-- <ul class="list-products"> -->
					<ul class="list-products groups-box">
						<?php
							while ( $the_query2->have_posts() ) {
								$the_query2->the_post();
								wc_get_template_part( 'content', 'product' );
							}
							wp_reset_postdata();
						?>
					</ul>

					<div class="module_button">
                    	<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php echo __('Xem thêm'); ?></a>
                    </div>
				</div>
			</div>
		</article>

		<article class="lth-features">
		    <div class="container">
		        <div class="row">
		            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		                <div class="module module_features">
		                    <div class="slick-slider slick-features">
		                    	<?php $i = 0; foreach ( $sh_option['home-features-slide'] as $featuresslide ) : ?>
		                    	<div class="item">
									<div class="content">
								        <div class="content-image">
								            <div class="image">
								                <img src="<?php echo $featuresslide['image'] ?>" alt="Icon">
								            </div>
								        </div>

								        <div class="content-box">
								            <h4 class="content-name">
								            	<?php echo $featuresslide['title'] ?>
								            </h4>
								            <div class="content-excerpt">
								                <?php echo $featuresslide['description'] ?>
								            </div>
								        </div>
								    </div>
								</div>
								<?php $i++; endforeach; ?>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</article>

		<article class="lth-testimonials">
			<div class="container">
		        <div class="row">
		            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		                <div class="module module_testimonials">
		                	<div class="module_header title-box">
		                        <h3 class="title"><?php echo __('Đánh giá khách hàng'); ?></h3>
		                    </div>

		                	<div class="slick-slider slick-testimonials">
		                		<?php $i = 0; foreach ( $sh_option['home-testimonials-slide'] as $testimonialsslide ) : ?>
		                            <div class="item">
									    <div class="content">
									        <div class="content-image">
									            <a href="#" title="Image" class="image">
									                <img src="<?php echo $testimonialsslide['image'] ?>" alt="Image">
									            </a>
									        </div>

									        <div class="content-box">
									            <h4 class="content-name">
									                <?php echo $testimonialsslide['title'] ?>
									                <span><?php echo __('Khách hàng'); ?></span>
									            </h4>

									            <div class="content-excerpt">
									                <?php echo $testimonialsslide['description'] ?>
									            </div>
									        </div>
									    </div>
									</div>
								<?php $i++; endforeach; ?>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</article>

		<!-- --------------------- News --------------------- -->
		<?php
		if( $sh_option['list_cat_post'] ) {
			$list_cat_post = $sh_option['list_cat_post'];
			if( $sh_option['number_news'] ) {
				$number_news = $sh_option['number_news'];
			}
			if( $sh_option['type_layout'] ) {
				$type_layout = $sh_option['type_layout'];
			}
			echo '<article class="news-wrap">';
				echo '<div class="container">';
					echo '<div class="module_blogs">';
						foreach ($list_cat_post as $key => $idpost) {
							echo '<h2 class="heading title-box"><a class="title" title="'. get_cat_name( $idpost ) .'" href="'. get_category_link( $idpost ) .'">'. get_cat_name( $idpost ) .'</a></h2>';
							echo do_shortcode('[shblog posts_per_page="' . $number_news . '" categories="' . $idpost . '" number_character="140" style="' . $type_layout . '"]');
						}
					echo '</div>';
				echo '</div>';
			echo '</article>';
		}
		?>

		<article class="lth-brands">
			<div class="container">
		        <div class="row">
		            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		                <div class="module module_brands">
		                	<div class="module_header title-box">
		                        <h3 class="title"><?php echo __('Đối tác'); ?></h3>
		                    </div>

		                	<div class="slick-slider slick-brands">
		                		<?php $i = 0; foreach ( $sh_option['home-brands-slide'] as $brandsslide ) : ?>
		                            <div class="item">
										<div class="content">
									        <div class="content-image">
									            <a href="<?php echo $brandsslide['url'] ?>" title="Image" class="image">
									                <img src="<?php echo $brandsslide['image'] ?>" alt="Image">
									            </a>
									        </div>
									    </div>
									</div>
								<?php $i++; endforeach; ?>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</article>

	</div><!-- #primary -->
	
<?php
get_footer();