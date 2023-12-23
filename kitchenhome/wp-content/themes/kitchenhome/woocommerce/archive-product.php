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

<main class="main-site main-page main-products">
	<section class="lth-page-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_banner"> 
                        <div class="module_content">
                            <?php if( have_rows('contact_banner', woocommerce_get_page_id('shop')) ): ?>
                                <?php while( have_rows('contact_banner', woocommerce_get_page_id('shop')) ): the_row(); ?>
                                    <div class="banner-image">
                                        <div class="image">
                                            <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">

                                            <h1><?php the_sub_field('title'); ?></h1>
                                        </div>
                                    </div>
                                    <div class="banner-content">
                                        <div class="content">
                                        	<?php the_sub_field('description'); ?>
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

    <?php 
        $terms = get_terms( array( 'taxonomy' => 'product_cat', 'parent' => 0 ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>

           <section class="products categories-product">
                <div class="container">
                    <div class="row">
                    	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    		<div class="categories-title">
	                    		<?php if( have_rows('categories', woocommerce_get_page_id('shop')) ): ?>
	                                <?php while( have_rows('categories', woocommerce_get_page_id('shop')) ): the_row(); ?>
	                                    <h2><?php the_sub_field('title'); ?></h2>
	                                <?php endwhile; ?>
	                            <?php endif; ?>
	                        </div>
                    	</div>

            			<?php foreach ( $terms as $term ) { 
                            $slug = $term->slug;
                            if ($slug == 'menu-nha-hang' || $slug == 'menu-giao-hang') { ?>
                    			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    				<article class="post-box">
    									<div class="post-image">
    							        	<a href="<?php echo get_category_link($term->term_id); ?>" title="" class="image">
    								            <?php
    								            	$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
    												$image = wp_get_attachment_url( $thumbnail_id );
    								            ?>
    								            <img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>" width="801" height="500" />
    								        </a>
    							        </div>

    									<div class="post-content">
    										<h3 class="post-name">
    								    		<a href="<?php echo get_category_link($term->term_id); ?>" title="">
    									    		<?php echo $term->name; ?>
    									    	</a>    		
    								    	</h3>	
    									</div>
    								</article>
                    			</div>
                			<?php }
                        }?>

            			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            				<div class="categories-content">
	                    		<?php if( have_rows('categories', woocommerce_get_page_id('shop')) ): ?>
	                                <?php while( have_rows('categories', woocommerce_get_page_id('shop')) ): the_row(); ?>
	                                    <?php the_sub_field('content'); ?>
	                                <?php endwhile; ?>
	                            <?php endif; ?>
	                        </div>
                    	</div>
            		</div>
                </div>
            </section>

        <?php } ?>
</main>

<?php get_footer( 'shop' );
