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
?>

<section <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="why lth-features <?php echo $class; ?>">
    <div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">
    	<?php
			$title = get_sub_field('title');
			$description = get_sub_field('description');

			if ($title || $description) {
		?>
			<?php if ($title) { ?>
	        	<h1 class="title text-center"><?php echo $title; ?></h1>
	        <?php }?>

			<?php if ($description) { ?>
	        	<p class="text-center desc"><?php echo $description; ?></p>
	        <?php }?>
	    <?php }?>

        <div class="row">
        	<?php if( have_rows('features') ): ?> 
				<?php while( have_rows('features') ): the_row(); ?>
		            <div class="col-md-3 wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
		                <div class="text-center why-item">
		                	<?php
	                            $select = get_sub_field_object( 'select' );
	                            $value = $select['value'];
	                            $img = get_sub_field('image');
	                            $icon_class = get_sub_field('icon_class');
	                            $title = get_sub_field('title');
	                            $description = get_sub_field('description');
	                        ?>

	                        <?php if ($img || $icon_class) { ?>
	                            <span class="mgb-20">
	                            	<?php if ($value == 'image') { ?>
	                            		<img src="<?php echo $img; ?>" alt="" title="">
	                            	<?php } else { ?>
                                        <i class="<?php echo $icon_class; ?>"></i>
                                    <?php } ?>
	                            </span>
	                        <?php } ?>                                      

	                        <?php if ($title || $description) { ?>
                                <?php if ($title) { ?>
                                	<h4><?php echo $title; ?></h4>
                                <?php } ?>

                                <?php if ($description) { ?>
                                    <p><?php echo $description; ?></p>
                                <?php } ?>
	                        <?php } ?>	 
		                </div>
		            </div>
		        <?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>
</section>