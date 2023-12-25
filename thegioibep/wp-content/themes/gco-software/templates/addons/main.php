<?php if( have_rows('slidershow') ): ?>    
	<section class="slide-mains">
    	<?php get_template_part('templates/addons/slidershow', ''); ?>
    </section>
<?php endif; ?>
<?php if( have_rows('mobile') ): ?>  
    <?php while( have_rows('mobile') ): the_row(); ?>
        <?php if( have_rows('categories_product') ): ?>  
            <?php while( have_rows('categories_product') ): the_row(); ?>
                <section class="category-products__mains mb-15s">
                    <div class="container">
                        <div class="row gutter-6">
                            <?php if( have_rows('category') ): ?>  
                                <?php while( have_rows('category') ): the_row(); ?>
                                    <div class="col-lg-3 col-md-3 col-sm-3  col-3">
                                        <div class="items-category__mains">
                                            <?php
                                                $name = get_sub_field('name');
                                                $image = get_sub_field('image');
                                            ?>
                                            <a title="" href="<?php echo get_term_link( $name->term_id, 'product_cat' ); ?>">
                                                <img alt="<?php echo $name->name; ?>" src="<?php echo $image; ?>" width="" height="">
                                                <h3 class="names-category__mains">
                                                    <?php echo $name->name; ?>
                                                </h3>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php if( have_rows('products_highlights') ): ?>
    <section class="prds-sale__mains">
        <div class="container">
            <?php get_template_part('templates/addons/products-highlights', ''); ?> 
        </div>
    </section>
<?php endif; ?>
<?php if( have_rows('banner') ): ?>
    <section class="banner-prds__mains mb-20s">
        <div class="container">
            <?php get_template_part('templates/addons/banner', ''); ?>            
        </div>
    </section>
<?php endif; ?>
<?php if( have_rows('products_category') ): ?>
    <section class="group-prds__alls mb-15s">
        <div class="container">
            <?php get_template_part('templates/addons/products', ''); ?>            
        </div>
    </section>
<?php endif; ?>
<?php if( have_rows('categories_products') ): ?>
    <section class="trademark-mains mb-20s">
        <div class="container">
            <?php get_template_part('templates/addons/categories-products', ''); ?>            
        </div>
    </section>
<?php endif; ?>
<?php if( have_rows('mobile') ): ?>  
    <?php while( have_rows('mobile') ): the_row(); ?>
        <?php if( have_rows('tin_tuc_su_kien') ): ?>
            <section class="news-mains mb-25s">
                <div class="container">
                    <?php get_template_part('templates/addons/blogs', ''); ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php if( have_rows('contacts') ): ?>  
     <section class="register-sale">
        <?php get_template_part('templates/addons/contacts', ''); ?>
    </section>
<?php endif; ?>