<?php global $product; ?>

<div class="item">
	<div class="single-shop-item">
        <div class="img-holder">
        	<?php if (has_post_thumbnail()) { ?>
				<div class="post-image">
		        	<a href="<?php the_permalink(); ?>" title="">
			            <img src="<?php echo lth_custom_img('full', 300, 300);?>" alt="<?php the_title(); ?>">
			        </a>

			        <?php
						$regular_price = $product->get_regular_price();
						$sale_price = $product->get_sale_price();
					?>

					<?php if ($sale_price) { 
						$sale = ($regular_price - $sale_price) * 100 / $regular_price;
					?>
						<span class="on-sale"><?php echo round($sale) . '%'; ?></span>
					<?php } ?>
		        </div>
			<?php } ?>
            
            <div class="overlay">
                <div class="box">
                    <div class="content">
                        <a href="<?php the_permalink(); ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-holder">
            <div class="product-title">
                <h3 class="post-name">
		    		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			    		<?php the_title(); ?>
			    	</a>    		
		    	</h3>	
            </div>

       		<?php if ($product->price) { ?>
			    <h4><?php echo $product->get_price_html(); ?></h4>
			<?php } else { ?>
			    <h4><?php echo __('Liên hệ'); ?></h4>
			<?php } ?>

            <div class="review-box">
                <?php get_template_part('woocommerce/loop/rating', ''); ?>

                <ul>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                </ul>
            </div>
        </div>
    </div>
</div>