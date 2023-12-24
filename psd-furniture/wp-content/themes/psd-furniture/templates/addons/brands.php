<?php
/**
 * Template Name: Addon Brands
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $id = get_sub_field('id');
    if ($id) {
    	$id = 'lth-' . $id;
    }

    $class = get_sub_field('class');
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-brands <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="module module__brands">
            		<?php
						$title = get_sub_field('title');
						$description = get_sub_field('description');

						if ($title || $description) {
					?>
						<div class="title-box">
							<?php if ($title) { ?>
								<h3 class="title"><?php echo $title; ?></h3>
							<?php }?>
							<?php if ($description) { ?>
								<p><?php echo $description; ?></p>
							<?php }?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

    <div class="module module__brands">
		<div class="module__content">
			<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
		        <div class="row">
		            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="slick-slider slick-brands">	
							<?php echo lth_brand_box('full', 170, 111); ?>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</article>