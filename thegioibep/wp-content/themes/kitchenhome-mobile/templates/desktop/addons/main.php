
<?php if( have_rows('slidershow') ): ?>    
	<section class="lth-slidershow">
		<div class="container-fluid">        		
	        <div class="row">
	            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

    				<?php get_template_part('templates/desktop/addons/slidershow', ''); ?>

    			</div>
    		</div>
    	</div>
    </section>
<?php endif; ?>


 
<?php if( have_rows('products_highlights') ): ?>
    <section class="lth-products lth-products-highlights lth-hot">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/desktop/addons/products-highlights', ''); ?>

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

                    <?php get_template_part('templates/desktop/addons/banner', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


 
<?php if( have_rows('products_category') ): ?>
    <section class="lth-products">
        <div class="container">                   
            <div class="row">

                <?php get_template_part('templates/desktop/addons/products', ''); ?>

            </div>
        </div>
    </section>
<?php endif; ?>


<?php if( have_rows('categories_products') ): ?>
    <section class="lth-section lth-brands">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <?php get_template_part('templates/desktop/addons/categories-products', ''); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if( have_rows('blogs') ): ?>
    <section class="lth-blogs">
        <div class="container">                   
            <div class="row">
                <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> -->

                    <?php get_template_part('templates/desktop/addons/blogs', ''); ?>

                <!-- </div> -->
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if( have_rows('contacts') ): ?>    
    <section class="lth-contacts">
        <div class="container">                   
            <div class="row">               

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <?php get_template_part('templates/desktop/addons/contacts', ''); ?>
                
            </div>
        </div>
    </section>    
<?php endif; ?>