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
                    <div class="module_title">
                        <!-- <h1 class="title">
                            <?php
                                // if (get_post_type() == 'tuyen-dung' || get_queried_object()->taxonomy == 'tuyen-dung-cat') {
                                //     if (is_tax()) {
                                //         single_cat_title();
                                //     } else {
                                //         $archive_page = get_pages(
                                //             array(
                                //                 'meta_key' => '_wp_page_template',
                                //                 'meta_value' => 'templates/tuyen-dung.php'
                                //             )
                                //         );
                                //         echo $archive_id = $archive_page[0]->post_title;
                                //     }
                                // }
                            ?>
                        </h1>
                    </div> -->

                    <?php 
                        $terms = get_terms( array( 'taxonomy' => 'tuyen-dung-cat', 'parent' => 0 ) );

                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){

                            foreach ( $terms as $term ) { ?>
                               
                                <div class="module_title">
                                    <h2 class="title">
                                        <a href=" <?php echo get_term_link($term->slug, 'tuyen-dung-cat') ?>">
                                            <?php echo $term->name ?>
                                        </a>
                                    </h2>
                                </div>

                                <div class="module_content">  
                                    <?php
                                        $args = array(
                                            'post_type' => 'tuyen-dung',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 4,
                                            'orderby' => 'DESC',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'tuyen-dung-cat',
                                                    'field' => 'term_id',
                                                    'terms' => $term,
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

                            <?php }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
