<?php
/**
 * Template Name: Addon Slidershow
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $rands = rand();
    $rand = $rands;

    $ids = get_sub_field('id');
    if ($ids) {
    	$id = 'lth-' . $ids;
    }

    $class = get_sub_field('class');
?>

<section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="banner <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">        		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			    <div class="slider-general owl-carousel banner-slider">
			        <?php if( have_rows('slider') ): ?> 
						<?php while( have_rows('slider') ): the_row(); ?>
		            		<?php
		            			$image = get_sub_field('image');
		            			$url = get_sub_field('url');
		            		?>

		            		<div class="item">
			            		<div class="slider-box">
				            		<div class="slider-image">
				            			<div class="image">
				            				<?php if ($url) { ?> <a href="<?php echo $url; ?>"> <?php } ?>
				            					<img src="<?php echo $image; ?>" alt="Slider" style="width: 100%;" width="1920" height="1280">
				            				<?php if ($url) { ?> </a> <?php } ?>
				            			</div>
				            		</div>
				            	</div>
				            </div>
						<?php endwhile; ?>
					<?php endif; ?>
			    </div>
			</div>
		</div>
	</div>
</section>