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
				                	$term_id = get_queried_object()->term_id;
									$taxonomy_name = 'product_cat';
									$termchildren = get_term_children( $term_id, $taxonomy_name );
									 
									foreach ( $termchildren as $child ) {
									    $term = get_term_by( 'id', $child, $taxonomy_name );
										$term_parent = $term->parent;

										if ($term_parent == $term_id) { ?>
									    	<!-- get_term_link( $child, $taxonomy_name )
									    	$term->name -->
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
									    <?php }
								} ?>

								<?php
	                                if ( !$termchildren ) { 
	                                	$category = get_term($term_id);
	                            ?>
	                            	<?php
                						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	                                    $args = array(
	                                        'post_type' => 'product',
	                                        'post_status' => 'publish',
	                                        'posts_per_page' => $posts_per_page,
	                                        'product_cat' => $category->name,
	                                        'orderby' => $orderby,
	                                        'paged' => $paged,
	                                    );

	                                    $getposts = new WP_query( $args);
	                                    if ($getposts->have_posts()) { ?>

	                                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
	                                            <?php global $product; ?>
	                                            
	                                            <div class="col-md-3 mgb-20">
	                                                <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
	                                            </div>
	                                            
	                                        <?php endwhile; wp_reset_postdata(); ?>

	                                    <?php } else { ?> 
	                                        <?php get_template_part('template-parts/content', 'none'); ?>
	                                    <?php } ?>
								<?php } ?>
							</div>
                                    
                            <?php require_once(LIBS_DIR . '/pagination.php'); ?>
						</div>
					</div>
				</div>
            </div>
        </div>   
    </section>
</main>

<?php get_footer( 'shop' );
