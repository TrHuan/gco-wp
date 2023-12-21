<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-single">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <section class="vk-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="vk-shop__box vk-shop__box--style-1 pt-5 pb-5">
                        <?php if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                get_template_part('template-parts/post/content', 'single');
                            }
                        } ?>

                        <?php
                            $id = get_queried_object_id();

                            $wpseo_primary_term = new WPSEO_Primary_Term( 'product_cat', $id );
                            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                            $term = get_term( $wpseo_primary_term );

                            $args = [
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => 2,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'post__not_in' => array($id),
                                'cat' => $term->term_id,
                            ];
                            $tets = new WP_Query($args);
                            if ($tets->have_posts()) { ?>
                            <div class="vk-blog-detail__relate">
                                <div class="row vk-blog__list">
                                    <?php while ($tets->have_posts()) {
                                        $tets-> the_post(); ?>
                                        <div class="col-lg-12 _item">
                                            <?php get_template_part('template-parts/post/content', 'list-2'); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>              
                            <?php }
                            wp_reset_postdata();
                        ?>                        
                    </div> <!--./box-->
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 
