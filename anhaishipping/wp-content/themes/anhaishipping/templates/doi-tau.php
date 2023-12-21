<?php
/**
 * Template Name: Trang Đội Tàu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-fleets">
    <?php 
        $terms = get_terms( array( 'taxonomy' => 'doi-tau-cat', 'parent' => 0 ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){

            foreach ( $terms as $term ) { ?>
                <section class="lth-fleets">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="module module_fleets fleets-list">
                                    <div class="module_title">
                                        <h2>
                                            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" title="" class="title">
                                                <?php echo $term->name; ?>
                                            </a>
                                        </h2>
                                    </div>

                                    <div class="module_content">
                                        <?php
                                            $args = [
                                                'post_type' => 'doi-tau',
                                                'post_status' => 'publish',
                                                'posts_per_page' => 9999,
                                                'orderby' => 'id',
                                                'order'      => 'DESC',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'doi-tau-cat',
                                                        'field' => 'term_id',
                                                        'terms' => $term,
                                                    )
                                                )
                                            ];
                                            $wp_query = new WP_Query($args);
                                            if ($wp_query->have_posts()) { ?>

                                                <ul>

                                                    <?php while ($wp_query->have_posts()) {
                                                        $wp_query-> the_post();
                                                        //load file tương ứng với post format
                                                        get_template_part('template-parts/doi-tau/content', '');
                                                    } ?>

                                                </ul>
                                            <?php } else {
                                                get_template_part('template-parts/content', 'none');
                                            }
                                            // reset post data
                                            wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php }

        }
    ?>
</main>

<?php get_footer(); ?>
