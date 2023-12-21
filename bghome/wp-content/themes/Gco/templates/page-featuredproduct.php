<?php
/**
 * Template Name: Page Featured Product
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

<?php //echo $term_id = get_queried_object_id();
// $term = get_term_by('id', $term_id, 'product_cat');
//$thumbnail_id = get_woocommerce_term_meta($term_id, 'thumbnail_id', true);
//$image = wp_get_attachment_url($thumbnail_id); ?>

<div id="page-featuredproduct">
<section id="banner-featured_page" class="fadeIn wow abc" data-wow-delay="0.2s">
	<?php if( have_posts() ): ?>
    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full');?>" alt="<?php the_title();?>">
  	<div class="background-overlay">
  		<div class="container">	
    		<h2 class="title-page"><?php the_title();?></h2>
    		<div class="page-breadcrumb">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p>','</p>' );
                }
                ?>
            </div>
  		</div>
  	</div>
    <?php endif;?>	
</section>

<section id="wrapper_featuredproduct">
	<div class="background-overlay">
		<div class="container">
			<div class="row main_featuredproduct">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar_featuredproduct">
					<div class="sidebar" role="complementary">
						<?php dynamic_sidebar('sidebar-woocommerce'); ?>
					</div><!-- #featuredproduct -->
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content_featuredproduct">
					<h2 class="tit-section-carousel">Sản phẩm nổi bật</h2>
					<div class="row main_featured_cate">
						<?php
						$products = new WP_Query(array(
							'post_type'=>'product',
							'post_status'=>'publish',
							'tax_query' => array(
		                        array(
		                            'taxonomy' => 'product_visibility',
								    'field'    => 'name',
								    'terms'    => 'featured',
								    'operator' => 'IN',
		                        )
		                    ),
							'orderby' => 'Date',
							'order' => 'DESC',
							'posts_per_page'=> 12));
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
</section>

<?php get_template_part('sections/specia','partner'); ?>
</div>

<?php get_footer(); ?>

