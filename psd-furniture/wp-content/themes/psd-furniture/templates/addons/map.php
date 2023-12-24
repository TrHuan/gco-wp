<?php
/**
 * Template Name: Addon Map
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

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-googlemap <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="googlemap-box">
                    <div class="content-box">
                        <div class="map-box">
                            <?php the_sub_field('map'); ?>
                        </div>
                    </div>
            	</div>
            </div>
        </div>		
	</div>
</article>