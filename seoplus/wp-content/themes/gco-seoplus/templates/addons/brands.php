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
    // if ($id) {
    // 	$id = 'lth-' . $id;
    // }

    $class = get_sub_field('class');
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-brands <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="brands-box">
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

					<div class="content-box">
						<div class="slick-slider slick-brands">	
							<?php //echo lth_brand_box('full', 231, 231); ?>

							<?php if( have_rows('brands') ): ?> 
					            <?php while( have_rows('brands') ): the_row(); ?>
					                <div class="item">
					                    <div class="brand-box">
					                        <?php
					                            $url = get_sub_field('url');

					                            $img = get_sub_field('image');

					                            $title = get_sub_field('title');

					                            $description = get_sub_field('description');
					                        ?>
					                        
					                        <?php //if ($img) { ?>
					                            <div class="brand-image">
					                                <div class="image">
					                                    <a href="<?php if ($url) {echo $url;} else {echo 'javascript:0';} ?>">
					                                        <img src="<?php echo $img; ?>" alt="Brand" width="230" height="230">
					                                    </a>
					                                </div>
					                            </div>
					                        <?php //} ?>

					                        <?php if ($title || $description) { ?>
					                            <div class="brand-content">
					                                <div class="brand-title">
					                                    <a href="<?php if ($url) {echo $url;} else {echo 'javascript:0';} ?>">
					                                        <?php echo $title; ?>
					                                    </a>
					                                </div>
					                                <div class="brand-description">
					                                    <?php echo $description; ?>
					                                </div>
					                            </div>
					                        <?php } ?>
					                    </div>
					                </div>
					            <?php endwhile; ?>
					        <?php endif; ?>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</article>