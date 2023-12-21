<?php
/**
 * Template Name: Page Collection
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */
 
get_header();?>

<?php global $vz_options;?>
<style type="text/css" media="screen">
.shopping_cart {
	display:block;
}
</style>
<div id="page-bosuutap">
<section id="categories_collection">
	<div class="background-overlay">
		<?php 
		$taxonomy = get_field('categories_collection');
		if( $taxonomy ): ?>
		   <div class="row content-cate_collection">
		    <?php $i=1;foreach( $taxonomy as $term ): ?>
		    <?php $term_ids = get_term($term)->term_id;
		    	$thumbnail_id = get_woocommerce_term_meta( $term_ids, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
		    ?>
		        <?php if ($i==6): ?>
		        	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 items-cate_collection">
		                <div class="box-cate_collection">
	                        <img src="<?php echo $image;?>" alt="<?php echo get_term($term)->name;?>"/>
	                        <div class="infor-cate_collection">
	                            <h3>
	                            	<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="name-cate_collection">
	                            		Bộ sưu tập
	                            		<span><?php echo get_term($term)->name;?></span>
	                            	</a>
	                            </h3>
	                        </div>
		                </div>
		            </div>
		        	<?php else: ?>
		        	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 items-cate_collection">
		                <div class="box-cate_collection">
	                        <img src="<?php echo $image;?>" alt="<?php echo get_term($term)->name;?>"/>
	                        <div class="infor-cate_collection">
	                            <h3>
	                            	<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="name-cate_collection">
	                            		Bộ sưu tập
	                            		<span><?php echo get_term($term)->name;?></span>
	                            	</a>
	                            </h3>
	                        </div>
		                </div>
		            </div>
		        <?php endif ?>
		    <?php $i++;endforeach; ?>
		   </div>
		<?php endif; ?>
    </div>
</section>

<section id="wrapper_collection">
	<div class="background-overlay">
		<div class="container">
			<div class="row main_collection">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar_collection">
					<div class="sidebar" role="complementary">
						<?php dynamic_sidebar('sidebar-collection'); ?>
					</div><!-- #collection -->
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content_collection">
					<div class="row content-flash-sale_product">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="main-flash-sale__details">
								<div class="img-flash__sale">
		                            <img src="<?php bloginfo('template_directory');?>/images/img-time-flash-sale.png" alt="Flash Sale">
		                        </div>
								<?php $timer_count_down = get_field('timer_count_down');?>
								<div id="timer_count_down" data-id="<?php echo $timer_count_down;?>">
									<div class="clock-times"><span id="days"></span><span class="txt">Ngày</span></div>
								 	<div class="clock-times"> <span id="hours"></span><span class="txt">Giờ</span></div>
								  	<div class="clock-times"><span id="minutes"></span><span class="txt">Phút</span></div>
								  	<div class="clock-times"><span id="seconds"></span><span class="txt">Giây</span></div>
								</div>
							</div>
						</div>
						<?php
						$featured_posts = get_field('flash_deal_product');
						if( $featured_posts ): ?>
						    <?php foreach( $featured_posts as $post ): 
						        // Setup this post for WP functions (variable must be named $post).
								setup_postdata($post); ?>
						        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="box-product">
					                     <div class="img-product">
					                         <a href="<?php the_permalink() ;?>"> 
					                             <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
					                         </a>
					                         <div class="details-product">
					                         	<?php global $product;
					                                echo sprintf( '<a href="%s" title="Add to cart" data-quantity="1" class="%s btn-addtocart" %s><i class="fal fa-shopping-cart"></i> '.__( 'Cart', 'woocommerce' ).'</a>',
					                                    esc_url( $product->add_to_cart_url() ),
					                                    esc_attr( implode( ' ', array_filter( array(
					                                        'button', 'product_type_' . $product->get_type(),
					                                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					                                        $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
					                                    ) ) ) ),
					                                    wc_implode_html_attributes( array(
					                                        'data-product_id'  => $product->get_id(),
					                                        'data-product_sku' => $product->get_sku(),
					                                        'aria-label'       => $product->add_to_cart_description(),
					                                        'rel'              => 'nofollow',
					                                    ) ),
					                                    esc_html( $product->add_to_cart_text() )
					                                );
					                              ?>
									        </div>
									        <?php if ( $product->is_on_sale() ) : ?>
										        <div class="box-sale_percentage">
										            <?php echo sale_badge_percentage();?>
										        </div>
									        <?php endif;?>
					                     </div>
					                     <div class="info-product">
					                        <a class="name-product" href="<?php the_permalink() ;?>" title=""><?php the_title() ;?></a>
					                        <p class="sku-product">Mã sản phẩm: <?php global $product;echo $product->get_sku();?></p>
					                        <p class="price-product"><span><?php global $product;echo $product->get_price_html(); ?></span></p>
					                     </div>
					                </div>                                 
								</div>
						    <?php endforeach; ?>
						    <?php 
							// Reset the global post object so that the rest of the page works correctly.
							wp_reset_postdata(); ?>
						<?php endif; ?>
					</div>
					<div class="project-featured">
						<h2 class="tit-section-carousel">Dự án tiêu biểu</h2>
						<?php
						$ads_banner_cate_top = get_field('ads_banner_cate_top');?>
						<?php if ($ads_banner_cate_top): ?>
							<div class="banner-ads-project">
								<img src="<?php echo $ads_banner_cate_top['url']?>" alt="Banner">
							</div>
						<?php endif ?>
						<div class="row main_featured_cate">
							<?php
							$featuredcatetop = get_field('featured_cate_top');
							$products = new WP_Query(array(
								'post_type'=>'product',
								'post_status'=>'publish',
								'tax_query' => array(
									array(
										'taxonomy'  => 'product_cat',
										'field'     => 'id',
										'terms'     => $featuredcatetop
									)
								),
								'orderby' => 'Date',
								'order' => 'DESC',
								'posts_per_page'=> 3));
								?>
								<?php while ($products->have_posts()) : $products->the_post(); ?>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 colums-product">
									<div class="box-product">
					                     <div class="img-product">
					                         <a href="<?php the_permalink() ;?>"> 
					                             <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
					                         </a>
					                         <div class="details-product">
					                         	<?php global $product;
					                                echo sprintf( '<a href="%s" title="Add to cart" data-quantity="1" class="%s btn-addtocart" %s><i class="fal fa-shopping-cart"></i> '.__( 'Cart', 'woocommerce' ).'</a>',
					                                    esc_url( $product->add_to_cart_url() ),
					                                    esc_attr( implode( ' ', array_filter( array(
					                                        'button', 'product_type_' . $product->get_type(),
					                                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					                                        $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
					                                    ) ) ) ),
					                                    wc_implode_html_attributes( array(
					                                        'data-product_id'  => $product->get_id(),
					                                        'data-product_sku' => $product->get_sku(),
					                                        'aria-label'       => $product->add_to_cart_description(),
					                                        'rel'              => 'nofollow',
					                                    ) ),
					                                    esc_html( $product->add_to_cart_text() )
					                                );
					                              ?>
									        </div>
									        <?php if ( $product->is_on_sale() ) : ?>
										        <div class="box-sale_percentage">
										            <?php echo sale_badge_percentage();?>
										        </div>
									        <?php endif;?>
					                     </div>
					                     <div class="info-product">
					                        <a class="name-product" href="<?php the_permalink() ;?>" title=""><?php the_title() ;?></a>
					                        <p class="sku-product">Mã sản phẩm: <?php global $product;echo $product->get_sku();?></p>
					                        <p class="price-product"><span><?php global $product;echo $product->get_price_html(); ?></span></p>
					                     </div>
					                </div>                                 
								</div>
							<?php endwhile ; wp_reset_query() ;?>
						</div>
						<?php
						$ads_banner_cate_bottom = get_field('ads_banner_cate_bottom');?>
						<?php if ($ads_banner_cate_bottom): ?>
							<div class="banner-ads-project">
								<img src="<?php echo $ads_banner_cate_bottom['url']?>" alt="Banner">
							</div>
						<?php endif ?>

						<div class="row main_featured_cate">
							<?php
							$featuredcatebottom = get_field('featured_cate_bottom');
							$products = new WP_Query(array(
								'post_type'=>'product',
								'post_status'=>'publish',
								'tax_query' => array(
									array(
										'taxonomy'  => 'product_cat',
										'field'     => 'id',
										'terms'     => $featuredcatebottom
									)
								),
								'orderby' => 'Date',
								'order' => 'DESC',
								'posts_per_page'=> 9));
								?>
								<?php while ($products->have_posts()) : $products->the_post(); ?>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 colums-product">
									<div class="box-product">
					                     <div class="img-product">
					                         <a href="<?php the_permalink() ;?>"> 
					                             <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
					                         </a>
					                         <div class="details-product">
					                         	<?php global $product;
					                                echo sprintf( '<a href="%s" title="Add to cart" data-quantity="1" class="%s btn-addtocart" %s><i class="fal fa-shopping-cart"></i> '.__( 'Cart', 'woocommerce' ).'</a>',
					                                    esc_url( $product->add_to_cart_url() ),
					                                    esc_attr( implode( ' ', array_filter( array(
					                                        'button', 'product_type_' . $product->get_type(),
					                                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					                                        $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
					                                    ) ) ) ),
					                                    wc_implode_html_attributes( array(
					                                        'data-product_id'  => $product->get_id(),
					                                        'data-product_sku' => $product->get_sku(),
					                                        'aria-label'       => $product->add_to_cart_description(),
					                                        'rel'              => 'nofollow',
					                                    ) ),
					                                    esc_html( $product->add_to_cart_text() )
					                                );
					                              ?>
									        </div>
									        <?php if ( $product->is_on_sale() ) : ?>
										        <div class="box-sale_percentage">
										            <?php echo sale_badge_percentage();?>
										        </div>
									        <?php endif;?>
					                     </div>
					                     <div class="info-product">
					                        <a class="name-product" href="<?php the_permalink() ;?>" title=""><?php the_title() ;?></a>
					                        <p class="sku-product">Mã sản phẩm: <?php global $product;echo $product->get_sku();?></p>
					                        <p class="price-product"><span><?php global $product;echo $product->get_price_html(); ?></span></p>
					                     </div>
					                </div>                                 
								</div>
							<?php endwhile ; wp_reset_query() ;?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>

<section id="videos_collection">
	<div class="background-overlay">
		<div class="container">
			<?php if( have_rows('featured_videos') ): ?>
			    <div class="row content-videos_collection">
			    <?php while( have_rows('featured_videos') ): the_row(); 
			        $name_video_featured = get_sub_field('name_video_featured');
			        $image_video_featured = get_sub_field('image_video_featured');
		        	$link_video_featured = get_sub_field('link_video_featured');
			        ?>
			        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 items-videos_collection">
			            <div class="box-videos_collection">
				          <a href="<?php echo $link_video_featured;?>" class="swipebox popup-youtube">
				            <img src="<?php echo $image_video_featured['url'];?>" alt="Videos">
				            <span class="play"></span>
				            <div class="ovrly"></div>
				         </a>
				         <h3 class="name-videos_collection"><?php echo $name_video_featured;?></h3>
						</div>
			        </div>
			    <?php endwhile; ?>
			    </div>
			<?php endif; ?>	
		</div>
    </div>
</section>

<?php get_template_part('sections/specia','partner'); ?>
</div>

<?php get_footer(); ?>

