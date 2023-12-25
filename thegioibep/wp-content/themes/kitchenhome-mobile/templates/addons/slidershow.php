
<div class="banner-mains swiper-container">
    <div class="swiper-wrapper">
    	<?php $i; while( have_rows('slidershow') ): the_row(); ?>

		    <?php
		    	$i++;

    			$image = get_sub_field('image');
    			$title = get_sub_field('title');

    			$top = get_sub_field('top');
    			$bottom = get_sub_field('bottom');
    			$left = get_sub_field('left');
    			$right = get_sub_field('right');
    		?>

            <div class="swiper-slide item item-<?php echo $i; ?>">
    			<style type="text/css">
					.module__slidershow .item-<?php echo $i; ?> .content {
						position: relative;
						display: flex;
						flex-wrap: wrap;
						justify-content: center;
						align-items: center;
					}								
					.module__slidershow .item-<?php echo $i; ?> .content-box {
						position: absolute;
						top: <?php echo $top; ?>;
						left: <?php echo $left; ?>;
						bottom: <?php echo $bottom; ?>;
						right: <?php echo $right; ?>;
					}
				</style>

                <div class="items-banner__mains">
					<?php if( have_rows('links') ) { ?>
						<?php while( have_rows('links') ) { the_row();

			    			$btn_url = get_sub_field('button');
			    			if( $btn_url ) {
							    $url_btn = $btn_url['url'];
							    $btn_title = $btn_url['title'];
							    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
							}
						} ?>				
					<?php } ?>

                	<?php if ($image) { ?>
                    <a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>" title="">
                        <img src="<?php echo $image; ?>" alt="Slide" width="1903" height="800">
                    </a>
                    <?php } ?>

    				<div class="content-box <?php echo $animation; ?>">
    					<?php if ($title) { ?>
    						<h2><?php echo $title; ?></h2>
    					<?php } ?>
    				</div>
                </div>
            </div>

		<?php endwhile; ?>
    </div>
</div>