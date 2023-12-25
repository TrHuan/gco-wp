<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<?php
    if ( wp_is_mobile() ) { ?>
        <section id="product-<?php the_ID(); ?>" class="lth-single-product">	
		    <div class="container">
		        <!-- <div class="row"> -->
		        	<h2 class="names-prds__details titles-md__alls fs-16s mb-25s"><?php the_title(); ?></h2>
			        <div class="show-prds__details mb-25s">
			            <div class="tag-insurance__prds">
			                <?php if (get_field('insurance')) { ?>
								<span class="on-sale"><img src="<?php echo ASSETS_URI; ?>/images/icon-24.png" alt="Icon"><span><?php the_field('insurance'); ?></span></span>
							<?php } ?>
			            </div>
			            <div class="prds-made__in">
			                <?php if (get_field('made_in')) { ?>
								<span class="on-sale on-sale-2"><img src="<?php echo ASSETS_URI; ?>/images/icon-25.png" alt="Icon"><span><?php the_field('made_in'); ?></span></span>
							<?php } ?>
			            </div>
			            <div class="sl-prds__details swiper-container">
			                <?php
								/**
								 * Hook: woocommerce_before_single_product_summary.
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								do_action( 'woocommerce_before_single_product_summary' );
							?>	
			                <div class="swiper-pagination"></div>
			            </div>
			        </div>

			        <p class="price-prds__shows mb-20s" style="width: 100%;">
			        	<?php echo __('Giá bán:'); ?>
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

			        <?php if( have_rows('special_offer') ) { ?>
						<?php while( have_rows('special_offer') ) { the_row(); ?>
					        <div class="gift-prds__details mb-25s">
					            <h2 class="titles-gift__details">
					                <i class="fa fa-gift" aria-hidden="true"></i>
					                <span class="titles-md__alls fs-12s color-blues"><?php echo __('Tổng trị giá quà tặng'); ?></span>
					                <span class="titles-md__alls fs-14s color-growns"><?php the_sub_field('total_offer'); ?></span>
					            </h2>
								<?php if( have_rows('endow') ) { ?>
						            <div class="list-gift__details row gutter-0">
						            	<?php while( have_rows('endow') ) { the_row(); ?>
							                <div class="col-4">
							                    <div class="items-gift__details">
							                        <h3 class="names-gift__details"><?php the_sub_field('title'); ?></h3>
							                        <p><?php echo __('Trị giá'); ?> <span class="color-growns"><?php the_sub_field('value'); ?></span></p>
							                        <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
							                    </div>
							                </div>
							            <?php } ?>
						            </div>
								<?php } ?>
					        </div>
						<?php } ?>
					<?php } ?>

					<div class="register-sale__buys mb-10s">
			            <?php the_field('form_sign_up_offers'); ?>
			            <?php echo do_shortcode('[contact-form-7 id="359" title="Đăng ký ưu đãi"]'); ?>
			            <?php
							$link_od = get_field('link_offer_details');
							if( $link_od ) {
							    $link_url_od = $link_od['url'];
							    $link_title_od = $link_od['title'];
							    $link_target_od = $link_od['target'] ? $link_od['target'] : '_self'; ?>
							<?php }
						?>
			            <a href="<?php echo $link_url_od; ?>" target="<?php echo $link_target_od; ?>>" title="" class="btn btn-oranges__linear"><?php echo __('Xem chi tiết >'); ?></a>
			        </div>

			        <div class="groups-method__buy mb-10s">
			        	<?php
							$link_cs = get_field('link_consulting_survey');
							if( $link_cs ) {
							    $link_url_cs = $link_cs['url'];
							    $link_title_cs = $link_cs['title'];
							    $link_target_cs = $link_cs['target'] ? $link_cs['target'] : '_self';
							}

							$link_installment = get_field('link_installment');
							if( $link_installment ) {
							    $link_url_installment = $link_installment['url'];
							    $link_title_installment = $link_installment['title'];
							    $link_target_installment = $link_installment['target'] ? $link_installment['target'] : '_self';
							}
						?>

						<a href="<?php echo $link_url_cs; ?>" target="<?php echo $link_target_cs; ?>>" title="" class="button btn-service buy-btn__details orange-buys__btn">
							<p class="titles-md__alls fs-16s"><?php echo __('Khảo sát tư vấn lắp đặt miễn phí'); ?></p>
							<p class="fs-15s"><?php echo __('(Dịch vụ khảo sát tư vấn miễn phí)'); ?></p>
						</a>

			            <form class="cart" action="<?php echo wc_get_cart_url(); ?>" method="post" enctype="multipart/form-data">
							<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
							sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
						     class="%s button ajax_add_to_cart single_add_to_cart_button buy-btn__details blues-buys__btn" data_link_cart="'.wc_get_checkout_url().'"><p class="titles-md__alls fs-16s">Mua ngay</p> <p class="fs-15s">(Xem hàng, không mua không sao)</p></a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( $product->id ),
							esc_attr( $product->get_sku() ),
							$product->is_purchasable() ? 'add_to_cart_button' : '',
							esc_attr( $product->product_type ),
							esc_html( $product->add_to_cart_text() ) ), $product ); ?>
						</form>

			            <?php if (get_field('piles')) { ?>
							<a href="<?php echo $link_url_installment; ?>" target="<?php echo $link_target_installment; ?>>" title="" class="button btn-installment buy-btn__details growns-buys__btn">
								<p class="titles-md__alls fs-16s"><?php echo __('Trả góp'); ?></p>
								<p class="fs-15s"><?php echo __('Cọc '); echo the_field('piles'); ?></p>
							</a>
						<?php } ?>
			        </div>

			        <?php if( have_rows('hotline_advise', 'option') ) { $i; ?>
			        <div class="hotline-prds__details mb-10s" style="width: 100%;">
			            <div class="row gutter-6">
			            	<?php while( have_rows('hotline_advise', 'option') ) { the_row(); $i++; ?>
			                <div class="col-6">
			                    <div class="items-hotline__details">
			                        <a title="" href="#" class="number-hotline__details fs-18s titles-md__alls color-growns"><?php the_sub_field('phone'); ?></a>
			                        <p><?php echo __('Tổng đài tư vấn'); ?> (<?php the_sub_field('work_time'); ?>)</p>
			                    </div>
			                </div>
			            <?php } ?>
			            </div>
			        </div>
			        <?php } ?>

			        <?php if( have_rows('product_details', 'option') ) {
		            	while( have_rows('product_details', 'option') ) { the_row();
		            		if( have_rows('why_buy_eu_kitchen') ) { ?>
						        <div class="commit-prds__details mb-25s">
						            <div class="row gutter-6">
						            	<?php while( have_rows('why_buy_eu_kitchen') ) { the_row(); ?>
							                <div class="col-4">
							                    <div class="items-commit__prds">
							                        <img alt="" src="<?php the_sub_field('image'); ?>">
							                        <h3 class="fs-13s"><?php the_sub_field('text'); ?></h3>
							                    </div>
							                </div>
						                <?php } ?>
						            </div>
						        </div>
							<?php }
						}
					} ?>  

					<?php if (get_field('video_mobile')) { ?>
						<div class="videos-prds__details mb-25s">
				            <a title="" href="<?php the_field('video_mobile'); ?>" data-fancybox="" class="btn-videos__prds">
				                <i class="fa fa-caret-right" aria-hidden="true"></i>
				            </a>
				            <img alt="" src="<?php the_field('bg_video_mobile'); ?>">
				        </div>
				    <?php } ?>

					<div class="text-alls__pages mb-20s">
				        <div class="intros-text__alls contents-hiddens mb-20s term-description">
				            <p class="fs-16s titles-text__alls"><?php echo __('Tổng quan'); ?></p>
				            <br>
				            <?php the_content(); ?>
				        </div>
				        <!-- <p class="see-text__alls"> <?php //echo __('Xem thêm tổng quan'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></p> -->
						<script src="<?php bloginfo('template_url'); ?>/assets/js/readmore.js"></script>
						<script>
							jQuery('.term-description').readmore({
								speed: 500,
								collapsedHeight: 400,
								moreLink: '<div class="read-full"><a href="#" class="read-more see-text__read-more">Xem thêm tổng quan <i class="fa fa-angle-down"></i></a></div>',
								lessLink: '<div class="read-full"><a href="#" class="read-less see-text__read-more">Thu gọn <i class="fa fa-angle-up"></i></a></div>'
							});
						</script>
				    </div>

				    <div class="text-alls__pages mb-20s" style="width:100%">
					    <div class="intros-table__alls contents-hiddens mb-20s term__description">
					        <p class="fs-18s titles-text__alls mb-20s"><?php echo __('Thông số kĩ thật'); ?></p>
					        <div class="table-all__text table-parameter__prds">
					            <?php the_field('specifications_product'); ?>
					        </div>
					    </div>
					    <!-- <p class="see-text__alls"> <?php //echo __('Xem thêm thông số kĩ thật'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></p> -->
						<script src="<?php bloginfo('template_url'); ?>/assets/js/readmore.js"></script>
						<script>
							jQuery('.term__description').readmore({
								speed: 500,
								collapsedHeight: 300,
								moreLink: '<div class="read-full"><a href="#" class="read-more see-text__read-more">Xem thêm thông số kĩ thật <i class="fa fa-angle-down"></i></a></div>',
								lessLink: '<div class="read-full"><a href="#" class="read-less see-text__read-more">Thu gọn <i class="fa fa-angle-up"></i></a></div>'
							});
						</script>
					</div>

					<?php
						$id = get_queried_object_id();

						$wpseo_primary_term = new WPSEO_Primary_Term( 'product_cat', $id );
						$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
						$term = get_term( $wpseo_primary_term );

					    $args = [
					        'post_type' => 'product',
					        'post_status' => 'publish',
					        'posts_per_page' => 8,
					        'orderby' => 'date',
					        'order' => 'DESC',
					        'post__not_in' => array($id),
					        'tax_query' => array(
					            array(
					                'taxonomy' => 'product_cat',
					                'field' => 'id',
					                'terms' => $term->term_id,
					            )
					        ),

					    ];
					    $tets = new WP_Query($args);
					    if ($tets->have_posts()) { ?>
							<div class="prds-compatible mb-30s" style="width: 100%;">
				                <h2 class="fs-18s mb-15s"><?php echo __('Khách hàng quan tâm'); ?></h2>
				                <ul class="list-prds__compatible" style="width: 100%;">
				                    <?php while ($tets->have_posts()) {
				                        $tets-> the_post(); ?>
				                        <li>
				                        	<?php get_template_part('woocommerce/product-box/product-box', '5'); ?>
				                        </li>
				                    <?php } ?>
				                </ul>
					        </div>                  
					    <?php }
					    wp_reset_postdata();
					?>

			        <?php
					$featured_posts = get_field('compatible_products');
					if( $featured_posts ){
						$cates_com = [];
						$i = 0;

						foreach( $featured_posts as $featured_post ):
							$cates_com[$i] = $featured_post;
							$i++;
						endforeach;

						$args_com = [
						    'post_type' => 'product',
						    'post_status' => 'publish',
						    'order' => 'DESC',
						    'orderby' => $orderby,
						    'post__in' => $cates_com,
						];
						$tets_com = new WP_Query($args_com);
						if ($tets_com->have_posts()) { ?>
							<div class="prds-compatible mb-30s">
					            <div class="container">
					                <h2 class="fs-18s mb-15s"><?php echo __('Sản phẩm tương thích'); ?></h2>
					                <ul class="list-prds__compatible">
					                    <?php while ($tets->have_posts()) {
					                        $tets-> the_post(); ?>
					                        <li>
					                        	<?php get_template_part('woocommerce/product-box/product-box', '5'); ?>
					                        </li>
					                    <?php } ?>
					                </ul>
					            </div>
					        </div>   	                
						 <?php }
					} ?>
				<!-- </div> -->
			</div>
		</section>

		<section class="lth-section lth-comments">
			<div class="container">                   
				<div class="row"> 
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="module  module_comments comment-prds__details">
							<div class="content">
								<?php
		                            if (is_active_sidebar('widget_comment')) {
		                                dynamic_sidebar('widget_comment');
		                            }
		                        ?>
		                        
<!-- 		                        <h2 class="fs-18s mb-15s"><?php //echo __('Bình luận về '); the_title(); ?></h2>

								<div id="fb-root"></div>
								<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="ak8C63Yo"></script>

								<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="690" data-numposts="4"></div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    <?php } else { ?>
        <section id="product-<?php the_ID(); ?>" class="lth-single-product">	
		    <div class="container">
		        <div class="row">
		        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="module module__header">
							<h1 class="product_title entry-title"><?php the_title(); ?></h1>					    
							
						    <ul class="evaluate-star__prds mb-10s" style="width: 100%; display: flex; flex-wrap: wrap;">
							    <li style="margin: 5px 15px 0 0;">
							        <div class="rating-item">
							            <p class="rating" style="display: inline-block; position: relative;">
							            	<?php echo $ave = do_shortcode('[site_reviews_summary hide="bars,if_empty,rating,summary"]'); ?>
							            </p>
							        </div>
							    </li>
							    <li style="margin: 0;">
							        <a href="#tab-4"><span>(Viết đánh giá)</span></a>
							    </li>
							</ul>
						</div>
					</div>

					<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="product-images">
							<div class="label-box">
								<?php if (get_field('insurance')) { ?>
									<span class="on-sale"><img src="<?php echo ASSETS_URI; ?>/desktop/images/icon-24.png" alt="Icon"><span><?php the_field('insurance'); ?></span></span>
								<?php } ?>
								<?php if (get_field('made_in')) { ?>
									<span class="on-sale on-sale-2"><img src="<?php echo ASSETS_URI; ?>/desktop/images/icon-25.png" alt="Icon"><span><?php the_field('made_in'); ?></span></span>
								<?php } ?>
							</div>

							<?php
							/**
							 * Hook: woocommerce_before_single_product_summary.
							 *
							 * @hooked woocommerce_show_product_sale_flash - 10
							 * @hooked woocommerce_show_product_images - 20
							 */
							do_action( 'woocommerce_before_single_product_summary' );
							?>					
						</div>
					</div>

					<div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="summary entry-summary">
							<p class="price">
								<label>Giá bán:</label>
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

							<?php
								$link_od = get_field('link_offer_details');
								if( $link_od ) {
								    $link_url_od = $link_od['url'];
								    $link_title_od = $link_od['title'];
								    $link_target_od = $link_od['target'] ? $link_od['target'] : '_self'; ?>
								<?php }
							?>
							<div class="coupons-box">
								<?php $form_sign_up_offers = get_field('form_sign_up_offers'); ?>
								<?php echo do_shortcode($form_sign_up_offers); ?>
		            			<?php echo do_shortcode('[contact-form-7 id="359" title="Đăng ký ưu đãi"]'); ?>

								<div class="button-box">
									<a href="<?php echo $link_url_od; ?>" target="<?php echo $link_target_od; ?>>" title="" class="btn"><?php echo __('Xem chi tiết >'); ?></a>
								</div>
							</div>

							<form class="cart" action="<?php echo wc_get_cart_url(); ?>" method="post" enctype="multipart/form-data">
								<?php
									$link_cs = get_field('link_consulting_survey');
									if( $link_cs ) {
									    $link_url_cs = $link_cs['url'];
									    $link_title_cs = $link_cs['title'];
									    $link_target_cs = $link_cs['target'] ? $link_cs['target'] : '_self';
									}

									$link_installment = get_field('link_installment');
									if( $link_installment ) {
									    $link_url_installment = $link_installment['url'];
									    $link_title_installment = $link_installment['title'];
									    $link_target_installment = $link_installment['target'] ? $link_installment['target'] : '_self';
									}
								?>

								<a href="<?php echo $link_url_cs; ?>" target="<?php echo $link_target_cs; ?>>" title="" class="button btn-service">
									<?php echo __('Khảo sát tư vấn lắp đặt miễn phí'); ?>
									<span><?php echo __('(Dịch vụ khảo sát tư vấn miễn phí)'); ?></span>
								</a>

								<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
								sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
							     class="%s button ajax_add_to_cart single_add_to_cart_button" data_link_cart="'.wc_get_checkout_url().'">Mua ngay <span>(Xem hàng, không mua không sao)</span></a>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								$product->is_purchasable() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type ),
								esc_html( $product->add_to_cart_text() ) ), $product ); ?>

								<?php if (get_field('piles')) { ?>
									<a href="<?php echo $link_url_installment; ?>" target="<?php echo $link_target_installment; ?>>" title="" class="button btn-installment">
										
										<span></span>
										<?php echo __('Trả góp'); ?>
										<span><?php echo __('Cọc '); echo the_field('piles'); ?></span>
									</a>
								<?php } ?>
							</form>

							<?php if( have_rows('hotline_advise', 'option') ) { $i; ?>
								<div class="consultation-call">
									<label><?php echo __('Tổng đài tư vấn miễn phí'); ?></label>
									<p>
										<img src="<?php echo ASSETS_URI; ?>/desktop/images/icon-26.png" alt="Icon">
										<?php while( have_rows('hotline_advise', 'option') ) { the_row(); $i++; ?>
										<span><a href="tel:<?php the_sub_field('phone'); ?>"><span class="<?php if ($i%2==0) {echo 'span';} ?>"><?php the_sub_field('phone'); ?></span></a> <small><?php the_sub_field('work_time'); ?></small></span>
										<?php } ?>
									</p>
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
						<?php
			                if (is_active_sidebar('widget_showroom')) {
			                    dynamic_sidebar('widget_showroom');
			                }
			            ?>

			            <?php if( have_rows('product_details', 'option') ) {
			            	while( have_rows('product_details', 'option') ) { the_row();
			            		if( have_rows('why_buy_eu_kitchen') ) { ?>
									<div class="why-buy-eu">
										<label><?php echo __('Tại sao mua hàng tại bếp EU?'); ?></label>

										<ul>
											<?php while( have_rows('why_buy_eu_kitchen') ) { the_row(); ?>
												<li class="item">
													<div class="content">
														<div class="content-image">
															<img src="<?php the_sub_field('image'); ?>" alt="Feature">
														</div>
														<div class="content-box">
									    					<h4 class="text-1">
									    						<?php the_sub_field('text'); ?>
									    					</h4>
									    				</div>
													</div>
												</li>
											<?php } ?>
										</ul>
									</div>
								<?php }
							}
						} ?>
					</div>
				</div>
			</div>
		</section>

		<?php if( have_rows('special_offer') ) { ?>
			<?php while( have_rows('special_offer') ) { the_row(); ?>
				<?php if( have_rows('endow') ) { ?>
					<section class="lth-endow">
						<div class="container">
							<div class="row">
								<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="module module__header">
										<div>
											<h2 class="title">
												<img src="<?php echo ASSETS_URI; ?>/images/icon-37.png" alt="Icon">
												<?php echo __('Ưu đãi đặc quyền'); ?>
											</h2>
											<p><?php echo __('Khi mua '); the_title(); ?></p>
										</div>
										<span><?php echo __('Tặng'); ?></span>
									</div>
								</div>
								
								<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="endow-eu">
										<ul>
											<?php while( have_rows('endow') ) { the_row(); ?>
												<li class="item">
													<div class="content">
														<div class="content-box">
									    					<h4 class="text-1">
									    						<?php the_sub_field('title'); ?>
									    					</h4>
									    					<p><?php echo __('Trị giá'); ?> <span><?php the_sub_field('value'); ?></span></p>
									    				</div>
														<div class="content-image">
															<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
														</div>
													</div>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>

								<div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="module module__footer">
										<p><img src="<?php echo ASSETS_URI; ?>/images/icon-37.png" alt="Icon"> <?php echo __('Tổng trị giá quà tặng'); ?></p>
										<p class="price"><?php the_sub_field('total_offer'); ?></p>
									</div>
								</div>
							</div>
						</div>
					</section>
				<?php } ?>
			<?php } ?>
		<?php } ?>

		<section class="lth-product-tabs"> 
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="module module__header">
							<ul class="nav nav-tabs tabs-menu">
						        <li class="active">
						        	<a href="tab-1" class="title">
						        		<?php echo __('Đặc điểm nổi bật'); ?>
						        	</a>
						        </li>
						        <li>
						        	<a href="tab-2" class="title">
						        		<?php echo __('Đánh giá chi tiết'); ?>
						        	</a>
						        </li>
						        <li class="">
						        	<a href="tab-3" class="title">
						        		<?php echo __('Thông tin kỹ thuật'); ?>
						        	</a>
						        </li>
						        <li class="">
						        	<a href="tab-4" class="title">
						        		<?php echo __('Bình luận - đánh giá'); ?>
						        	</a>
						        </li>
						    </ul>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="module module__content">
							<div id="tab-2" class="detailed-reviews">
								<div class="detailed-review">
									<h3><?php echo __('Đánh giá chi tiết'); ?></h3>

									<div class="content">
										<?php the_content(); ?>
									</div>
								</div>

								<a href="#" class="btn-read-more">Xem thêm đánh giá chi tiết <i class="icofont-simple-down"></i></a>
							</div>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="module module__content">
							<div id="tab-3">
								<div class="content">
									<h3><?php echo __('Thông số kỹ thuật'); ?></h3>

									<?php the_field('specifications_product'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
		$featured_posts = get_field('compatible_products');
		if( $featured_posts ){
			$cates_com = [];
			$i = 0;

			foreach( $featured_posts as $featured_post ):
				$cates_com[$i] = $featured_post;
				$i++;
			endforeach;

			$args_com = [
			    'post_type' => 'product',
			    'post_status' => 'publish',
			    'order' => 'DESC',
			    'orderby' => $orderby,
			    'post__in' => $cates_com,
			];
			$tets_com = new WP_Query($args_com);
			if ($tets_com->have_posts()) { ?>
				<section class="lth-section lth-products">
					<div class="container">                   
						<div class="row"> 
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="module module__header">
									<div class="module_title">
										<h2 class="title"><?php echo __('Sản phẩm tương thích'); ?></h2>
									</div>
								</div>

								<div class="module module_products">
									<div class="module_content">
										<div class="slick-slider slick-products-3">
											<?php while ($tets_com->have_posts()) {
						                        $tets_com-> the_post(); ?>
						                        
						                        <?php get_template_part('woocommerce/product-box/desktop/product-box', '5'); ?>
						                    <?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>   	                
			 <?php }
		} ?>

		<?php if( have_rows('product_details', 'option') ) {
			while( have_rows('product_details', 'option') ) { the_row();
				if( have_rows('services') ) {
					while( have_rows('services') ) { the_row(); ?>
						<section class="lth-section lth-services">
							<div class="container">                   
								<div class="row"> 
									<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="module  module_services">
											<img src="<?php the_sub_field('image'); ?>" alt="Image">

											<div class="content">
												<h2><?php the_sub_field('title'); ?></h2>
												<p><?php the_sub_field('description'); ?></p>
												<label><?php echo __('ĐIỀU KIỆN:'); ?> <?php the_sub_field('condition'); ?></label>

												<?php if( have_rows('button') ) { $j; ?>
													<div class="button-box">
														<?php while( have_rows('button') ) { the_row(); $j++; ?>
															<?php
																$btn_url = get_sub_field('link');
																if( $btn_url ) {
																    $url_btn = $btn_url['url'];
																    $btn_title = $btn_url['title'];
																    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
																}	
															?>
															<a href="<?php echo $url_btn; ?>" target="<?php echo $btn_target; ?>" class="btn <?php if($j%2==0){echo 'btn-watch-now';} ?>">
																<?php echo $btn_title; ?>
															</a>
														<?php } ?>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>

									<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="module module_hotline">
											<h2><?php echo __('CHÚNG TÔI LUÔN Ở ĐÂY ĐỂ HỖ TRỢ BẠN'); ?></h2>
											<p><?php echo __('Hỗ trợ miễn phí'); ?></p>
											<a href="tel:<?php the_sub_field('support_switchboard_1'); ?>"><p class="phone"><?php the_sub_field('support_switchboard_1'); ?></p></a>
											<p><span><?php echo __('Hoặc'); ?></span></p>
											<ul>
												<li><label><?php echo __('Tel :'); ?></label> <a href="tel:<?php the_sub_field('support_switchboard_2'); ?>"><span><?php the_sub_field('support_switchboard_2'); ?></span></a> <?php the_sub_field('work_time_2'); ?></li>
												<li><label><?php echo __('Hotline :'); ?></label> <a href="tel:<?php the_sub_field('support_switchboard_3'); ?>"><span><?php the_sub_field('support_switchboard_3'); ?></span></a>   <?php the_sub_field('work_time_3'); ?></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</section>
					<?php }
				}
			}
		} ?>

		<?php
			$id = get_queried_object_id();

			$wpseo_primary_term = new WPSEO_Primary_Term( 'product_cat', $id );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$term = get_term( $wpseo_primary_term );

		    $args = [
		        'post_type' => 'product',
		        'post_status' => 'publish',
		        'posts_per_page' => 8,
		        'orderby' => 'date',
		        'order' => 'DESC',
		        'post__not_in' => array($id),
		        'tax_query' => array(
		            array(
		                'taxonomy' => 'product_cat',
		                'field' => 'id',
		                'terms' => $term->term_id,
		            )
		        ),

		    ];
		    $tets = new WP_Query($args);
		    if ($tets->have_posts()) { ?>
		    <section class="lth-section lth-products">
				<div class="container">                   
					<div class="row"> 
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="module module__header">
								<div class="module_title">
									<h2 class="title"><?php echo __('Khách hàng quan tâm'); ?></h2>
								</div>
							</div>

							<div class="module module_products">
								<div class="module_content">
									<div class="slick-slider slick-products-3">
										<?php while ($tets->have_posts()) {
					                        $tets-> the_post(); ?>
					                        
					                        <?php get_template_part('woocommerce/product-box/desktop/product-box', '5'); ?>
					                    <?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>                   
		    <?php }
		    wp_reset_postdata();
		?>

		<section class="lth-section lth-comments" id="tab-4">
			<div class="container">                   
				<div class="row"> 
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="module  module_comments">
							<div class="content">
								<?php
		                            if (is_active_sidebar('widget_comment')) {
		                                dynamic_sidebar('widget_comment');
		                            }
		                        ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    <?php }
?>

