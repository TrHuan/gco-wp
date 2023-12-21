<?php 
/**
Template Name: Homepage
*/
get_header();
?>
<style type="text/css" media="screen">
.shopping_cart {
	display:block;
}
</style>
<?php global $vz_options;?>
<section id="categories_main">
  	<div class="background-overlay">
		<?php if( have_rows('categories_main') ): ?>
		   <div class="row content-categories_main">
		    <?php $i=1;while( have_rows('categories_main') ): the_row(); 
		        $image_categories_main = get_sub_field('image_categories_main');
		        $name_categories_main = get_sub_field('name_categories_main');
		        $url_categories_main = get_sub_field('url_categories_main');
		        ?>
	        	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 items-categories_main">
	                <div class="box-categories_main">
                        <img src="<?php echo $image_categories_main['url'];?>" alt=""/>
                        <div class="infor-categories_main">
                            <h3>
                            	<a href="<?php echo $url_categories_main;?>" class="name-categories_main">
                            		<?php echo $name_categories_main;?>
                            	</a>
                            </h3>
                        </div>
	                </div>
	            </div>
		    <?php $i++;endwhile; ?>
		   </div>
		<?php endif; ?>
    </div>
</section>
<div class="clearfix"></div>
<section id="homepage-wrapper">
	<div class="background-overlay">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar-homepage">
					<div class="woo-sidebar">
						<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content-homepage">
					<?php
					$hero = get_field('product_featured');
					if( $hero ): ?>
						<div class="content-product_featured">
				    		<h2 class="title-archive-woo"><?php echo $hero['title_product_featured'];?></h2>
				    		<div class="banner_cate_product_ads">
				    			<a href="<?php echo$hero['url_product_featured'];?>">
									<img src="<?php echo $hero['banner_product_featured']['url'];?>" alt="">
								</a>
							</div>
				    		<div id="product_featured_list" class="row content-product">
				            <?php
				            $product_featured = new WP_Query(array(
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
				            'posts_per_page'=> 3));
				            ?>
				            <?php while ($product_featured->have_posts()) : $product_featured->the_post(); ?>
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
				<?php endif; ?>

				<!-- /End product_sale featured-->

				<?php
					$sale = get_field('product_sale');
					if( $sale ): ?>
						<div class="content-product_featured">
				    		<h2 class="title-archive-woo"><?php echo $sale['title_product_sale'];?></h2>
				    		<div class="banner_cate_product_ads">
				    			<a href="<?php echo$sale['url_product_sale'];?>">
									<img src="<?php echo $sale['banner_product_sale']['url'];?>" alt="">
								</a>
							</div>
				        <div id="product_sale_list" class="row content-product">
					        <?php
					        $product_sale = new WP_Query(array(
					        'post_type'=>'product',
					        'post_status'=>'publish',
					    	'meta_query' => WC()->query->get_meta_query(),
    						'post__in' => array_merge(array(0), wc_get_product_ids_on_sale()),
					        'orderby' => 'Date',
					        'order' => 'DESC',
					        'posts_per_page'=> 9));
					        ?>
					        <?php while ($product_sale->have_posts()) : $product_sale->the_post(); ?>
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
				<?php endif; ?>
			    	<!-- /End product_sale-->
			    <div class="row content-video_homepage">
					<?php if( have_rows('video_homepage') ): ?>
					    <?php while( have_rows('video_homepage') ): the_row(); 
					        $name_video_homepage = get_sub_field('name_video_homepage');
					        $image_video_homepage = get_sub_field('image_video_homepage');
				        	$url_video_homepage = get_sub_field('url_video_homepage');
					        ?>
					        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 items-video_homepage">
					            <div class="box-video_homepage">
						          <a href="<?php echo $url_video_homepage;?>" class="swipebox popup-youtube">
						            <img src="<?php echo $image_video_homepage['url'];?>" alt="">
						            <span class="play"></span>
						            <div class="ovrly"></div>
						         </a>
						         <h3 class="name-video_homepage"><?php echo $name_video_homepage;?></h3>
								</div>
					        </div>
					    <?php endwhile; ?>
					<?php endif; ?>	
				</div>
				</div>
    		</div>
    	</div>
    </div>
</section>

<?php get_template_part('sections/specia','partner'); ?>

<?php get_footer();?>
