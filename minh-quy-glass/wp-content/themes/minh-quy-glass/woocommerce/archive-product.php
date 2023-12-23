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

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main-site main-page main-products">
    <section class="lth-products lth-products-list">
        <div class="container">
            <div class="row">
            	<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
	            	 <aside class="lth-sidebars">
                        <?php
                            if (is_active_sidebar('sidebar_products')) {
                                dynamic_sidebar('sidebar_products');
                            }
                        ?>
                    </aside>
	            </div>

                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="module module_products module_products_list">
	                	<div class="module_content">
	                		<div class="groups-box">
	                			<?php 
					                $terms = get_terms( array( 'taxonomy' => 'product_cat', 'parent' => 0 ) );

					                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
										<?php foreach( $terms as $term ): ?>
								            <div class="item">
												<div class="content">
													<?php if (wp_get_attachment_url( get_term_meta( $term->term_id, 'thumbnail_id', true ) )) { ?>
														<div class="content-image">
															<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" title="" class="image">
																<img src="<?php echo wp_get_attachment_url( get_term_meta( $term->term_id, 'thumbnail_id', true ) ); ?>" alt="Product">
															</a>
														</div>
													<?php } ?>

													<div class="content-box">
														<h3 class="content-name">
															<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" title="<?php echo esc_html( $term->name ); ?>"><?php echo esc_html( $term->name ); ?></a>
														</h3>
													</div>
												</div>
											</div>
									    <?php endforeach;
									}
					            ?>	                			
	                		</div>
	                	</div>
	                </div>
                </div>

                <!-- <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                     <div class="sidebars"> -->
                        <!-- Sidebar -->
                        <?php
                            //if (is_active_sidebar('sidebar_shop')) { ?>

                            <!-- <aside class="lth-sidebars"> -->
                                <?php //dynamic_sidebar('sidebar_shop'); ?>
                            <!-- </aside> -->

                        <?php //} ?>
                    <!-- </div>
                </div> -->
            </div>
        </div>   
    </section>
</main>

<?php get_footer( 'shop' );
