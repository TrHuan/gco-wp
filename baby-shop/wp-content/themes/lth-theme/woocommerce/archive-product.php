<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<?php $cat = get_queried_object(); ?>

<main class="main-site main-page main-products">
	<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <div class="container">

        <div class="vk-shop__box vk-shop__box--style-1">
            <h1 class="vk-page__title">
            	<?php 
					if (get_post_type() == 'page') {
						the_title();
					}

					if (get_post_type() == 'product') {
						woocommerce_page_title();
					}
				?>
            </h1>


            <div class="vk-shop__top">

                <div class="vk-shop__row row no-gutters">

                    <div class="col-lg-3 _left">
                        <div class="vk-sidebar__box vk-sidebar__box--style-1">
                            <?php if (is_active_sidebar('sidebar_product_price')) {
					            dynamic_sidebar('sidebar_product_price');
					        } ?>

                            <p class="mb-2 pt-2"><b><?php echo __('Hoặc'); ?></b></p>

                            <div class="vk-sidebar__checkbox">
                                <form class="products-ordering" method="get">
									<ul>
										<li>
											<input type="submit" name="orderby" value="price">
											<span><?php echo __('Giá thấp đến cao'); ?></span>
										</li>
										<li>
											<input type="submit" name="orderby" value="price-desc">
											<span><?php echo __('Giá cao đến thấp'); ?></span>
										</li>
									</ul>
								</form>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-9 _right">
                    	<?php
                    	if (get_post_type() == 'product') {
							$breadcrumb_products = get_field('breadcrumb', woocommerce_get_page_id('shop'));

							$term = get_queried_object();
							$breadcrumb_cats_products = get_field('category_product', $term);
							$breadcrumb_cat_products = $breadcrumb_cats_products['breadcrumb'];

							if (!is_single() && $breadcrumb_products || is_tax() && $breadcrumb_cat_products) {
								if ($breadcrumb_cat_products) {
									$img_url = $breadcrumb_cat_products;
								} else {
									$img_url = $breadcrumb_products;
								}
							}	
						}
                    	?>

                        <div class="vk-banner vk-img vk-img--cover">
                            <img src="<?php echo $img_url; ?>" alt="Breadcrumb" style= "width: 100%;">
                        </div>

                    </div>

                </div> <!--./row-->

            </div> <!--./top-->
            <div class="vk-shop__mid">
                <div class="vk-shop__row row no-gutters align-items-center">
                    <?php if (is_active_sidebar('sidebar_blocks_trademark')) {
			            dynamic_sidebar('sidebar_blocks_trademark');
			        } ?>
                </div>
            </div> <!--./mid-->
            <div class="vk-shop__bot">

                <div class="row no-gutters">
                    <div class="col-lg-3 order-1 order-lg-0 pt-5 pt-lg-0">
                        <?php
                        	if ($cat) {
                        		$par = $cat->term_id;
                        	} else {
                        		$par = 0;
                        	}

                        	$taxonomies = get_terms( array(
							    'taxonomy' => 'product_cat',
							    'hide_empty' => false,
							    'parent' => $par,
						        'orderby'	   => 'ID',
						        'order'   => 'ASC',
							) );
							 
							if ( !empty($taxonomies) ) : ?>
							    <div class="sidebar-product">
                            		<ul class="">
								    <?php foreach( $taxonomies as $category ) { ?>
								    	<li class="vk-list__item" data-value="1">
								    		<a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo $category->name; ?></a>
								    	</li>
								    <?php } ?>
								    </ul>
								</div>
							<?php endif;
                        ?>

                        <?php if (is_active_sidebar('sidebar_product')) { ?>
                            <aside class="sidebars">
                                <?php dynamic_sidebar('sidebar_product'); ?>
                            </aside>
                        <?php } ?>
                    </div>
                    <div class="col-lg-9 pt-5 pt-lg-0">
                        <?php
                            if ( woocommerce_product_loop() ) {
								/**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );

								woocommerce_product_loop_start();

								if ( wc_get_loop_prop( 'total' ) ) {
									while ( have_posts() ) {
										the_post();

										/**
										 * Hook: woocommerce_shop_loop.
										 */
										do_action( 'woocommerce_shop_loop' );

										wc_get_template_part( 'content', 'product' );
									}
								}

								woocommerce_product_loop_end();

								/**
								 * Hook: woocommerce_after_shop_loop.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								do_action( 'woocommerce_after_shop_loop' );
							} else {
								/**
								 * Hook: woocommerce_no_products_found.
								 *
								 * @hooked wc_no_products_found - 10
								 */
								do_action( 'woocommerce_no_products_found' );
							}
                        ?>
                    </div>
                </div>

            </div> <!--./bot-->


        </div> <!--./box-->

        <?php if (is_active_sidebar('sidebar_blocks_categories')) {
            dynamic_sidebar('sidebar_blocks_categories');
        } ?>

    </div>
</main>

<?php get_footer( 'shop' );
