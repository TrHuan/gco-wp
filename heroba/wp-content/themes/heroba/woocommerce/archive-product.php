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

get_header( 'shop' );
$cat = get_queried_object(); ?>

<main class="main-site main-page main-products">
	<?php //require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <section class="prds-pages mt-50s mb-60s wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
        <div class="container">
            <h2 class="fs-60s mb-50s titles-center__alls"><?php echo __('Recommend Product'); ?></h2>
            <div class="sl-prds__pages swiper mb-60s">
                <?php
                    if ( woocommerce_product_loop() ) { ?>

						<?php woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 */
								do_action( 'woocommerce_shop_loop' ); ?>
								<div class="swiper-slide">
									<?php wc_get_template_part( 'content', 'product' ); ?>
								</div>
							<?php }
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

            <?php
			$link = get_field('link_amazon', woocommerce_get_page_id('shop'));

			if( $link ): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>

				<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn-see__amazons">
	                <span class="text-btn__amazon">
	                    <?php echo __('To purchase, please go to'); ?>
	                    <br>
	                    <span class=""><?php echo __('Amazon.jp'); ?></span>
	                </span>
	                <span class="icon-btn__amazon">
	                    &#10142;
	                </span>
	            </a>
			<?php endif; ?>            
        </div>
    </section>

    <?php if( have_rows('infomations', woocommerce_get_page_id('shop')) ): ?>
		<?php while( have_rows('infomations', woocommerce_get_page_id('shop')) ): the_row(); ?>
		    <section class="prds-infomations__pages wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
		        <div class="content-prds__infomations">
		            <div class="text-prds__infomations">
		                <p class="fs-32s mb-30s"><?php the_sub_field('text_top'); ?></p>
		                <?php if (get_locale()=='ja') { ?>
		            		<p class="fs-32s mb-30s title-infomationss__pages"><?php the_sub_field('title'); ?></p>
		            	<?php } else { ?>
		                	<p class="fs-32s mb-30s titles-medium__alls"><?php the_sub_field('title'); ?></p>
		                <?php } ?>
		                <?php if( have_rows('content') ): ?>
							<?php while( have_rows('content') ): the_row(); ?>
		                		<p class="fs-22s mb-30s titles-untra__lights"><?php if (get_locale()=='ja') { ?><span class="number-infomationss__pages"><?php the_sub_field('number'); ?></span><?php } else { ?><span class="titles-light__alls"><?php the_sub_field('number'); ?></span><?php } ?> <?php the_sub_field('text'); ?></p>
		                	<?php endwhile; ?>
						<?php endif; ?>
		            </div>
		            <img src="<?php the_sub_field('image'); ?>" alt="Image" width="930" height="707">
		            <div class="text-prds__infomations">
		            	<?php if (get_locale()=='ja') { ?>
		            		<p class="fs-22s mb-10s"><?php the_sub_field('text_bottom'); ?></p>
		            	<?php } else { ?>
		                	<p class="fs-22s mb-10s titles-thin__alls"><?php the_sub_field('text_bottom'); ?></p>
		                <?php } ?>

		                <?php
						$link = get_sub_field('button');

						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
				            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn-abouts__prds fs-24s"><?php echo $link_title; ?> ⇨</a>
						<?php endif; ?> 
		            </div>
		        </div>
		    </section>
	    <?php endwhile; ?>
	<?php endif; ?>
    
</main>

<?php get_footer( 'shop' );
