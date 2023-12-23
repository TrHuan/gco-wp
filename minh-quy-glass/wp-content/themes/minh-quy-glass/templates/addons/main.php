<?php if( get_row_layout() == 'slidershow' ): ?> 

	<?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];

    	$settings = get_sub_field('settings');
        $color = $settings['color'];
    	$bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

    	if ($bg_img) {
    		$bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
    	} else {
    		$bg = 'background-color:' . $bg;
    	}

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

    	$style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>
    
	<section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-slidershow <?php echo $class; ?>" <?php echo $style; ?>>
		<div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">        		
	        <div class="row">
	            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

    				<?php get_template_part('templates/addons/slidershow', ''); ?>

    			</div>
    		</div>
    	</div>
    </section>

<?php endif; ?>



<?php if( get_row_layout() == 'features' ): ?> 

    <?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];

        $settings = get_sub_field('settings');
        $color = $settings['color'];
        $bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

        if ($bg_img) {
            $bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
        } else {
            $bg = 'background-color:' . $bg;
        }

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

        $style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>

    <section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-features <?php echo $class; ?>" <?php echo $style; ?>>
        <div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/features', ''); ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>



<?php if( get_row_layout() == 'brands' ): ?> 

    <?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];
        
        $settings = get_sub_field('settings');
        $color = $settings['color'];
        $bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

        if ($bg_img) {
            $bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
        } else {
            $bg = 'background-color:' . $bg;
        }

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

        $style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>

    <section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-brands <?php echo $class; ?>" <?php echo $style; ?>>
        <div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/brands', ''); ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>



<?php if( get_row_layout() == 'testimonials' ): ?> 

    <?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];
        
        $settings = get_sub_field('settings');
        $color = $settings['color'];
        $bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

        if ($bg_img) {
            $bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
        } else {
            $bg = 'background-color:' . $bg;
        }

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

        $style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>

    <section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-testimonials <?php echo $class; ?>" <?php echo $style; ?>>
        <div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/testimonials', ''); ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>



<?php if( get_row_layout() == 'services' ): ?> 

    <?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];
        
        $settings = get_sub_field('settings');
        $color = $settings['color'];
        $bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

        if ($bg_img) {
            $bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
        } else {
            $bg = 'background-color:' . $bg;
        }

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

        $style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>

    <section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-services <?php echo $class; ?>" <?php echo $style; ?>>
        <div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/services', ''); ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>



<?php if( get_row_layout() == 'projects' ): ?> 

    <?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];
        
        $settings = get_sub_field('settings');
        $color = $settings['color'];
        $bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

        if ($bg_img) {
            $bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
        } else {
            $bg = 'background-color:' . $bg;
        }

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

        $style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>

    <section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-projects <?php echo $class; ?>" <?php echo $style; ?>>
        <div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/projects', ''); ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>



<?php if( get_row_layout() == 'blogs' ): ?> 

    <?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];
        
        $settings = get_sub_field('settings');
        $color = $settings['color'];
        $bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

        if ($bg_img) {
            $bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
        } else {
            $bg = 'background-color:' . $bg;
        }

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

        $style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>

    <section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-posts <?php echo $class; ?>" <?php echo $style; ?>>
        <div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/blogs', ''); ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>



<?php if( get_row_layout() == 'products' ): ?> 

    <?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];
        
        $settings = get_sub_field('settings');
        $color = $settings['color'];
        $bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

        if ($bg_img) {
            $bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
        } else {
            $bg = 'background-color:' . $bg;
        }

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

        $style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>

    <section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-products <?php echo $class; ?>" <?php echo $style; ?>>
        <div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/products', ''); ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>



<?php if( get_row_layout() == 'banner' ): ?> 

    <?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];
        
        $settings = get_sub_field('settings');
        $color = $settings['color'];
        $bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

        if ($bg_img) {
            $bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
        } else {
            $bg = 'background-color:' . $bg;
        }

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

        $style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>

    <section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-banner <?php echo $class; ?>" <?php echo $style; ?>>
        <div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/banner', ''); ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>



<?php if( get_row_layout() == 'html' ): ?> 

    <?php        
        $general = get_sub_field('general');
        $id = $general['id'];
        $class = $general['class'];
        $full_width = $general['full_width'];
        
        $settings = get_sub_field('settings');
        $color = $settings['color'];
        $bg = $settings['background_color'];
        $bg_img = $settings['background_image'];
        $margin_top = $settings['margin_top'];
        $margin_bottom = $settings['margin_bottom'];

        if ($bg_img) {
            $bg = 'background-image: url(' . $bg_img . '); background-size: cover; background-repeat: no-repeat;';
        } else {
            $bg = 'background-color:' . $bg;
        }

        if ($margin_top) {
            $top = 'margin-top: ' . $margin_top;
        }

        if ($margin_bottom) {
            $bottom = 'margin-bottom: ' . $margin_bottom;
        }

        $style = 'style="color: ' . $color . '; ' . $bg . '; ' . $top . '; ' . $bottom . '"';
    ?>

    <section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-html <?php echo $class; ?>" <?php echo $style; ?>>
        <div class="<?php if ($full_width == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/html', ''); ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>