<?php get_header(); ?>



<?php

	$category_info 	= get_category_by_slug( get_query_var('category_name') );

	$cat_id 		= $category_info->term_id;

	$cat_name 		= get_cat_name($cat_id);

	$cat_desc 		= wpautop( category_description($cat_id) );

	$cat_link 		= esc_url( get_term_link($cat_id) );

	

	//banner

	$data_page_banner  = array(

		'image_alt'    =>    $cat_name

	);

?>



<?php get_template_part("resources/views/page-banner"); ?>



<section class="b2 spage" style="background: url(<?php echo asset('images/bg2.png'); ?>) no-repeat center top; background-size: cover;">

    <div class="container">

        <div class="row blog-row">



            <?php

                $query = query_post_by_category_paged($cat_id, 9);

                $max_num_pages = $query->max_num_pages;



                if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();

            ?>



                <?php get_template_part('resources/views/content/category-post', get_post_format()); ?>



            <?php endwhile; wp_reset_postdata(); else: echo ''; endif; ?>



        </div>



        <!--pagination-->

        <?php echo paginationCustom( $max_num_pages ); ?>

    </div>

</section>



<?php get_footer(); ?>