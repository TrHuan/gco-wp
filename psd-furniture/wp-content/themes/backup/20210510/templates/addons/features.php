<?php
/**
 * Template Name: Addon Features
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $rands = rand();
    $rand = $rands;

    $id = get_sub_field('id');
    if ($id) {
    	$id = 'lth-' . $id;
    }

    $class = get_sub_field('class');

    $owl_xl_items = get_sub_field('owl_xl_items');
	$owl_lg_items = get_sub_field('owl_lg_items');
	$owl_md_items = get_sub_field('owl_md_items');
	$owl_sm_items = get_sub_field('owl_sm_items');
	$owl_items = get_sub_field('owl_items');

	$owl_xl_rows = get_sub_field('owl_xl_rows');
	$owl_lg_rows = get_sub_field('owl_lg_rows');
	$owl_md_rows = get_sub_field('owl_md_rows');
	$owl_sm_rows = get_sub_field('owl_sm_rows');
	$owl_rows = get_sub_field('owl_rows');
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-features <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="module module__features">
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

					<div class="module__content">
						<div class="slick-slider slick-features slick-features-<?php echo $rand; ?>">							
							<?php if( have_rows('features') ): ?> 
					            <?php while( have_rows('features') ): the_row(); ?>
					                <div class="item">
					                    <div class="content-box">
					                        <?php
					                            $select = get_sub_field_object( 'select' );
					                            $value = $select['value'];
					                            $img = get_sub_field('image');
					                            $icon_class = get_sub_field('icon_class');
					                            $title = get_sub_field('title');
					                            $description = get_sub_field('description');
					                        ?>
					                        
					                        <?php if ($img || $icon_class) { ?>
					                            <div class="content-image">
					                                <div class="image">
					                                    <?php if ($value == 'image') { ?>
					                                        <img src="<?php echo $img; ?>" alt="feature" width="1920" height="1080">
					                                    <?php } else { ?>
					                                        <i class="<?php echo $icon_class; ?>"></i>
					                                    <?php } ?>
					                                </div>
					                            </div>
					                        <?php } ?>                                      

					                        <?php if ($title || $description) { ?>
					                            <div class="content">
					                                <?php if ($title) { ?>
					                                    <h4 class="content-name">
					                                        <?php echo $title; ?>
					                                    </h4>
					                                <?php } ?>

					                                <?php if ($description) { ?>
					                                    <div class="content-excerpt">
					                                        <?php echo $description; ?>
					                                    </div>
					                                <?php } ?>
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

	<script type="text/javascript">		
		jQuery(document).ready(function($) {
		    $(".slick-features-<?php echo $rand; ?>").slick({
		        loop: true,
		        autoplay: false,
		        autoplaySpeed: 3000,
		        dots: false,
		        infinite: true,
		        speed: 500,
		        rows: <?php echo $owl_xl_rows; ?>,
		        slidesPerRow: <?php echo $owl_xl_items; ?>,
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        adaptiveHeight: true,
		        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
		        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
		        responsive: [
		            {
		                breakpoint: 1200,
		                settings: {
		                    rows: <?php echo $owl_lg_rows; ?>,
		                    slidesPerRow: <?php echo $owl_lg_items; ?>,
		                }
		            },
		            {
		                breakpoint: 992,
		                settings: {
		                    rows: <?php echo $owl_md_rows; ?>,
		                    slidesPerRow: <?php echo $owl_md_items; ?>,
		                }
		            },
		            {
		                breakpoint: 768,
		                settings: {
		                    rows: <?php echo $owl_sm_rows; ?>,
		                    slidesPerRow: <?php echo $owl_sm_items; ?>,
		                }
		            },
		            {
		                breakpoint: 480,
		                settings: {
		                    rows: <?php echo $owl_rows; ?>,
		                    slidesPerRow: <?php echo $owl_items; ?>,
		                }
		            }
		        ]
		    });
		});
	</script>
</article>