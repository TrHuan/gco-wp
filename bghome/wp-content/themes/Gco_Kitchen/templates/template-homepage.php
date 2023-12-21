<?php 

/**

Template Name: Homepage

*/

get_header();

?>



<?php global $vz_options;?>

<section id="section-banner">

    <div class="background-overlay">

		<div class="heading-bannerpage container">

			<h2 class="title-bannerpage">Tủ bếp module</h2>

		</div>

    	<?php $banner_homepage = get_field('banner_homepage');?>

        <?php if ($banner_homepage) : ?>

          <div id="banner-carousel" class="owl-carousel owl-theme">

            <?php 

              foreach ($banner_homepage as $value) {

            ?>        

            <div class="item-banner">

                <img src="<?php echo $value['url'];?>" alt=""/> 

                <div class="cover-banner">

                    <div class="container">

                        <div class="infor-banner">

                            <div class="line-banner"></div>

                            <h2 class="name-banner"><?php echo $value['caption'];?></h2>

                        </div>

                    </div>

                </div>     

            </div>

            <?php } ?> 

          </div>

        <?php endif;?>

    </div>

</section>

<div class="nav-menu_categories">

	<?php 

		wp_nav_menu( array(

		    'theme_location'    => 'menu_categories', 

		    'menu_id'           => 'menu_category_product', 

		    'menu_class'        => 'menu',

		) );

	?> 

</div>

<?php get_template_part('sections/specia','videos'); ?>

<?php if( have_rows('categories_product') ): ?>

<section id="homepage-wrapper">

	<div class="background-overlay">

	<?php $i=1;while( have_rows('categories_product') ): the_row(); 

	    $name_categories_product = get_sub_field('name_categories_product');

	    $select_categories_product = get_sub_field('select_categories_product');

	    $banner_categories_product = get_sub_field('banner_categories_product');

	    $link_banner_sale = get_sub_field('link_banner_sale');

	    $terms = get_term($select_categories_product);

    ?>

    	<div class="container categories_product_<?php echo $i;?>">

    		<div class="headding-section">

	    		<h2 class="title-section"><?php echo $name_categories_product;?></h2>

	    		<div class="readmore-section"><a href="<?php echo $terms->slug;?>">Xem thêm</a></div>

    		</div>

	    	<!-- <div id="product_<?php //echo $i;?>-carousel" class="owl-carousel owl-theme"> -->
	    	<div id="" class="swiper swiper-slider products-slick">

	            <?php
	            $categories = new WP_Query(array(

	            'post_type'=>'product',

	            'post_status'=>'publish',

	            'tax_query' => array(

					array(

						'taxonomy'  => 'product_cat',

						'field'     => 'id',

						'terms'     => $terms->term_id,

					)

				),

	            'orderby' => 'Date',

	            'order' => 'DESC',

	            'posts_per_page'=> 8));

	            ?>

	            <?php while ($categories->have_posts()) : $categories->the_post(); ?>

	            	<div class="items-product">

	            		<div class="box-product">

				             <div class="img-product">

				                 <a href="<?php the_permalink() ;?>"> 

				                     <?php the_post_thumbnail("large",array( "title" => get_the_title(),"alt" => get_the_title() ));?>

				                 </a>

				                 <div class="details-product">

				                    <?php global $product;

				                        echo sprintf( '<a href="%s" title="Thêm giỏ hàng" data-quantity="1" class="%s btn-addtocart" %s><i class="fal fa-shopping-cart"></i> '.__( 'Cart', 'woocommerce' ).'</a>',

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

				                <p class="price-product"><span><?php global $product;echo $product->get_price_html(); ?></span></p>

				             </div>

				        </div>                                

					</div>

	            <?php endwhile ; wp_reset_query() ;?>

	         </div>

	         <?php if ($banner_categories_product): ?>

	        <div class="banner_categories_product">

    			<a href="<?php echo $link_banner_sale;?>">

					<img src="<?php echo $banner_categories_product['url'];?>" alt="">

				</a>

			</div>

			<?php endif ?>

    	</div>

    	<?php $i++;endwhile; ?>

    </div>

</section>

<?php endif; ?>



<?php get_template_part('sections/specia','blog');?>



<?php get_template_part('sections/specia','partner'); ?>



<?php get_footer();?>

