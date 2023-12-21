<?php
/**
 * Template Name: Page flashdeal
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */
 
get_header();?>
<style type="text/css" media="screen">
.shopping_cart {
	display:block;
}
</style>
<?php global $vz_options;?>
<section id="banner-featured_page" class="fadeIn wow" data-wow-delay="0.2s">
	<?php if( have_posts() ): ?>
   <!--  <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full');?>" alt=""> -->
   <img src="<?php echo $vz_options['opt-banner-page_contact']['url'];?>" alt="">
  	<div class="background-overlay">
  		<div class="container">	
    		<!-- <h2 class="title-page"><?php the_title();?></h2> -->
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
					<div class="main-flash-sale__details">
						<div class="img-flash__sale">
                            <img src="<?php bloginfo('template_directory');?>/images/img-time-flash-sale.png" alt="flash sale">
                        </div>
                        <?php $timer_count_down = get_field('timer_count_down');?>
						<div id="timer_count_down" data-id="<?php echo $timer_count_down;?>">
							<div class="clock-times"><span id="days"></span><span class="txt">Ngày</span></div>
						 	<div class="clock-times"> <span id="hours"></span><span class="txt">Giờ</span></div>
						  	<div class="clock-times"><span id="minutes"></span><span class="txt">Phút</span></div>
						  	<div class="clock-times"><span id="seconds"></span><span class="txt">Giây</span></div>
						</div>
					</div>
					<h2 class="tit-section-carousel"><?php the_title();?></h2>
					<div class="line-section"></div>
					<div class="row main_featured_cate">
						<?php
						$flash_deal_cate = get_field('flash_deal_cate');
						$products = new WP_Query(array(
							'post_type'=>'product',
							'post_status'=>'publish',
							'tax_query' => array(
								array(
									'taxonomy'  => 'product_cat',
									'field'     => 'id',
									'terms'     => $flash_deal_cate
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
</section>

<?php get_template_part('sections/specia','partner'); ?>
</div>

<?php get_footer(); ?>

