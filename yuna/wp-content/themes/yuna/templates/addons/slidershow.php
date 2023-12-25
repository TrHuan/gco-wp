
<div id="slider">
	<?php $i; while( have_rows('slidershow') ): the_row(); $i++; ?>
		<?php
			$image = get_sub_field('image');
			$btn_url = get_sub_field('button');
			if( $btn_url ) {
			    $url_btn = $btn_url['url'];
			    $btn_title = $btn_url['title'];
			    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
			}
		?>

	    <a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>" title="" class="btn btn-slider">
	    	<img class="slider-img" src="<?php echo get_sub_field('image'); ?>" alt="slider-img" title="#caption<?php echo $i; ?>" />
	    </a>	    
    <?php endwhile; ?>
</div>

<?php $j; while( have_rows('slidershow') ): the_row(); $j++; ?>
	<?php
		$btn_url = get_sub_field('button');
		if( $btn_url ) {
		    $url_btn = $btn_url['url'];
		    $btn_title = $btn_url['title'];
		    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
		}
	?>

	<div class="nivo-caption" id="caption<?php echo $j; ?>" >
	    <div class="container">
	        <div class="d-flex align-items-center">
	            <div class="slider-text">
	                <h2 class="s36 text-uppercase slider-tit wow fadeInLeft" data-wow-delay=".3s">
	                	<a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>" title="" class="">
							<?php echo $btn_title; ?>
						</a>
	                </h2>
	            </div>
	        </div>
	    </div>
	</div>
<?php endwhile; ?>