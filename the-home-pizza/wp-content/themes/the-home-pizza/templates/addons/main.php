
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



<?php if( have_rows('introduce') ): ?>
    <section class="lth-banner">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/introduce', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


 
<?php if( have_rows('products_highlights') ): ?>
    <section class="lth-products lth-products-highlights">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/products-highlights', ''); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


 
<?php if( have_rows('products') ): ?>
    <section class="lth-products">
        <div class="container">                   
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php get_template_part('templates/addons/products', ''); ?>

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