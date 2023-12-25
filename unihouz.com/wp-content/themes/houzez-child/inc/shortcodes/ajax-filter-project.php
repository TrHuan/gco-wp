<?php

// Ajax Filter
add_action('wp_ajax_myfilter', 'project_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'project_filter_function');
function project_filter_function() {
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'du-an',
	);

    if(!empty($_POST['statusfilter'])){
        $args['meta_query'][] = 
			[
				'key'	 	=> 'project_proties',
				'value'	  	=> $_POST['statusfilter'],
				'compare' 	=> '=',
			];
    }

    if(!empty($_POST['projectfilter'])){
        $args['meta_query'][] =
			[
				'key'	 	=> 'location',
				'value'	  	=> $_POST['projectfilter'],
				'compare' 	=> '=',
			];
    }

    if(!empty($_POST['pricefilter'])){
        $args['meta_query'][] =
			[
				'key'	 	=> 'choose-price-range',
				'value'	  	=> $_POST['pricefilter'],
				'compare' 	=> '=',
			];
    }

    if(!empty($_POST['areafilter'])){
        $args['meta_query'][] =
			[
				'key'	 	=> 'maximum_area',
				'value'	  	=> $_POST['areafilter'],
				'compare' 	=> '=',
			];
    }
    //     echo $_POST['projectfilter'];die;
    // // return $_POST['projectfilter'];
    

	$query = new WP_Query($args);
?>

    <div id="properties_module_section" class="page-project">
        <div id="module_properties" class="row">
            <?php if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-md-6 col-12">
                        <div class="item-header">
                            <div class="listing-image-wrap">
                                <div class="listing-thumb">
                                    <a href="<?php the_permalink() ?>" class="listing-featured-thumb hover-effect">
                                        <?php echo get_the_post_thumbnail( get_the_id(), 'large', array( 'class' =>'img-fluid wp-post-image', 'alt' => 'Dự án') ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item-body flex-grow-1">
                            <h2 class="item-title">
                                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            </h2> 
                            <div class="description">
                                <?php echo wp_trim_words( get_the_content(), 25, '.' ); ?>
                            </div>
                            <ul class="item-amenities item-amenities-with-icons">
                                <?php if (get_field('project_location')) { ?>
                                    <li>
                                        <img alt="Vị trí" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/location.png" >
                                        <span class="field"><?php echo get_field('project_location'); ?></span>
                                    </li> 
                                <?php } ?>
                                <?php if (get_field('project_area')) { ?>
                                    <li>
                                        <i class="houzez-icon icon-ruler-triangle mr-1"></i>
                                        <span class="label"> <?php esc_html_e('Diện tích:', 'houzez') ?> </span>
                                        <span class="field"><?php echo get_field('project_area'); ?> </span>
                                    </li>
                                <?php } ?>
                                <?php if (get_field('project_type')) { ?>
                                    <li>
                                        <img alt="Loại hình" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/bds.png">
                                        <span class="label"> <?php esc_html_e('Loại hình:', 'houzez') ?></span>
                                        <span class="field"><?php echo get_field('project_type'); ?> </span>
                                    </li>
                                <?php } ?>
                                <?php if (get_field('project_price')) { ?>
                                    <li>
                                        <img alt="Giá" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                        <span class="label"> <?php esc_html_e('Giá:', 'houzez') ?></span>
                                        <span class="field"><?php echo get_field('project_price'); ?></span>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <img alt="Giá" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                        <span class="area-label"> <?php esc_html_e('Giá:', 'houzez') ?></span>
                                        <span class="field"><?php esc_html_e('Đang cập nhật', 'houzez') ?></span>
                                    </li>
                                <?php } ?>
                            </ul> 

                        </div>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            else : 	echo '<div class="container affter-filter"';
                    echo '<span>Dự án đang cập nhật . . . </span>';
                    echo '</div>';
            endif; ?>
        </div>
    </div>

<?php wp_reset_query();
	die();
}

