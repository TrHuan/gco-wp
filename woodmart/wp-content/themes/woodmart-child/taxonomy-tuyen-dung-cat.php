<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php //get_template_part('template-parts/breadcrumbs', ''); ?>

<main class="main main-page main-recruitments">
    <section class="lth-recruitments">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <?php
                        $term_id = get_queried_object()->term_id;
                        $term_taxonomy = get_queried_object()->taxonomy;
                        $term_name = get_queried_object()->name;
                    ?>
                    <!-- <div class="module_title">
                        <h1 class="title">
                            <?php //echo $term_name; ?>
                        </h1>
                    </div> -->

                    <div class="module_content">
                        <?php
                        $args = array(
                            'post_type' => 'tuyen-dung',
                            'post_status' => 'publish',
                            'posts_per_page' => 99999,
                            'orderby' => 'DESC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'tuyen-dung-cat',
                                    'field' => 'term_id',
                                    'terms' => $term_id,
                                )
                            ),
                        );

                        $getposts = new WP_query( $args);
                        if ($getposts->have_posts()) { ?>

                            <div class="groups-box">

                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>                          
                                    <?php get_template_part('template-parts/tuyen-dung/content', ''); ?>                                            
                                <?php endwhile; wp_reset_postdata(); ?>

                            </div>

                        <?php } else { ?> 
                            <?php get_template_part('template-parts/content', 'none'); ?>
                        <?php } ?>  
                    </div>
                </div>
            </div>
        </div>   
    </section>
</main>
<?php get_footer(); ?>
