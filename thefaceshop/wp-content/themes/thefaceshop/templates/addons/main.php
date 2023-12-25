
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



<?php if( have_rows('categories_products') ): ?>
    <section class="lth-categories ptb-80">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/products-categories', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


 
<?php if( have_rows('products_highlights') ): ?>
    <section class="lth-products">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/products-highlights', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


 
<?php if( have_rows('testimonials') ): ?>
    <?php while( have_rows('testimonials') ): the_row(); ?>
        <section class="lth-testimonials testmonial-bg tesmonial-style-two" <?php if (get_sub_field('image')) { ?>style="background-image: url(<?php the_sub_field('image'); ?>)"<?php } ?>>
            <div class="container">                   
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php get_template_part('templates/addons/testimonials', ''); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>


 
<?php if( have_rows('products_selling') ): ?>
    <section class="lth-products">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/products-selling', ''); ?>

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



<?php if( have_rows('brands', 'options') ): ?>
    <section class="lth-brands">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/brands', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if( have_rows('contacts', 'options') ): ?>
    <section class="lth-contacts">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/contact', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if( have_rows('features', 'options') ): ?>
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



<!-- ////////////////////////////////////////////////// -->



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



<?php if( have_rows('services') ): ?>
    <section class="lth-services">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/services', ''); ?>

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