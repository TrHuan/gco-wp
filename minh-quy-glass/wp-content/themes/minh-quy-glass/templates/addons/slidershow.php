<div class="module module__slidershow">
	<div class="module_content">
		<div class="slick-slider slick-slidershow">

		    <?php
		    	$post_id = get_sub_field('slidershow');

		    	if( have_rows('slidershow', $post_id) ): $i;
		    		while( have_rows('slidershow', $post_id) ) : the_row(); $i++;
		    			$image = get_sub_field('image');
		    			$text_1 = get_sub_field('text_1');
		    			$text_2 = get_sub_field('text_2');
		    			$text_3 = get_sub_field('text_3');

		    			$link = get_sub_field('url');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						endif;
		    		?>

		    		<div class="item item-<?php echo $i; ?>">
		    			<style type="text/css">
		    				.module__slidershow .item-<?php echo $i; ?> .content-box {
		    					color: <?php echo $color; ?>;
		    				}
		    			</style>

		    			<div class="content">
		    				<?php if ($image) { ?>
			    				<div class="content-image">
			    					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>>" title="" class="image">
			    						<img src="<?php echo $image; ?>" alt="Slide" width="1920" height="1080">
			    					</a>
			    				</div>
			    			<?php } ?>

		    				<?php if ($text_1 || $text_2 || $text_3) { ?>
			    				<div class="content-box <?php echo $animation; ?>">
			    					<?php if ($text_1) { ?>
			    						<p class="text-1"><?php echo $text_1; ?></p>
			    					<?php } ?>

			    					<?php if ($text_2) { ?>
			    						<p class="text-2"><?php echo $text_2; ?></p>
			    					<?php } ?>

			    					<?php if ($text_3) { ?>
			    						<p class="text-3"><?php echo $text_3; ?></p>
			    					<?php } ?>
			    				</div>
			    			<?php } ?>
		    			</div>
		    		</div>

		    		<?php endwhile;
				endif;
		    ?>

		</div>
	</div>
</div>