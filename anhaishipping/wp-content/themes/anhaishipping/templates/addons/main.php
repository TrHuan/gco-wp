
<?php
    $add_custom_post_type = get_field('add_custom_post_type');

    $testimonials = $add_custom_post_type['testimonials'];
    $services = $add_custom_post_type['services'];
    $projects = $add_custom_post_type['projects'];
    $products = $add_custom_post_type['products'];
    $brands = $add_custom_post_type['brands'];
?>


<?php if( have_rows('slidershow') ): ?>    
	<section class="lth-slidershow">
		<div class="container-fluid">        		
	        <div class="row">
	            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

    				<?php get_template_part('templates/addons/slidershow', ''); ?>

    			</div>
    		</div>
    	</div>
    </section>
<?php endif; ?>



<?php if( have_rows('banner') ): ?>
    <section class="lth-banner">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/banner', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if( have_rows('features') ): ?>
    <section class="lth-features">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/features', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if( have_rows('projects') ): ?>
    <section class="lth-projects">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/projects', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if( have_rows('videos_images') ): ?>
    <section class="lth-videos-images">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/videos-images', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if( have_rows('blogs') ): ?>
    <section class="lth-blogs">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/blogs', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if( have_rows('contact') ): ?>
    <section class="lth-contact">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/contact', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


 
<?php if ($products == 'true') : if( have_rows('products') ): ?>
    <section class="lth-products">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/products', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; endif; ?>



<?php if ($brands == 'true') : if( have_rows('brands') ): ?>
    <section class="lth-brands">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/brands', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; endif; ?>


 
<?php if ($testimonials == 'true') : if( have_rows('testimonials') ): ?>
    <section class="lth-testimonials">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/testimonials', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; endif; ?>



<?php if ($services == 'true') : if( have_rows('services') ): ?>
    <section class="lth-services">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/services', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; endif; ?>