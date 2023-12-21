<?php
/**
 * Template Name: Trang Thư Viện
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-abouts">
    <?php 
        $terms = get_terms( array( 'taxonomy' => 'thu-vien-cat', 'parent' => 0 ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){

            foreach ( $terms as $term ) { ?>
                <section class="lth-library">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="module module_library library-list">
                                    <div class="module_title">
                                        <h2>
                                            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" title="" class="title">
                                                <?php echo $term->name; ?>
                                            </a>
                                        </h2>
                                    </div>

                                    <?php if ($term->slug == 'video') { ?>
                                        <div class="module_content module_content_<?php echo $term->slug; ?>">
                                            <?php
                                                $args = [
                                                    'post_type' => 'thu-vien',
                                                    'post_status' => 'publish',
                                                    'posts_per_page' => 12,
                                                    'orderby' => 'id',
                                                    'order'      => 'DESC',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'thu-vien-cat',
                                                            'field' => 'term_id',
                                                            'terms' => $term,
                                                        )
                                                    )
                                                ];
                                                $wp_query = new WP_Query($args);
                                                if ($wp_query->have_posts()) { $i; ?>
                                                    <?php while ($wp_query->have_posts()) {
                                                        $wp_query-> the_post(); $i++; ?>

                                                        <?php if ($i % 2 == 1) { ?>
                                                            <ul class="groups-box">
                                                        <?php } ?>

                                                            
                                                            <?php //load file tương ứng với post format
                                                            get_template_part('template-parts/thu-vien/content', ''); ?>

                                                        <?php if ($i % 2 == 0) { ?>
                                                            </ul>
                                                        <?php } ?>

                                                    <?php } ?>
                                                <?php } else {
                                                    get_template_part('template-parts/content', 'none');
                                                }
                                                // reset post data
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="module_content module_content_<?php echo $term->slug; ?>">
                                            <?php
                                                $args = [
                                                    'post_type' => 'thu-vien',
                                                    'post_status' => 'publish',
                                                    'posts_per_page' => 12,
                                                    'orderby' => 'id',
                                                    'order'      => 'DESC',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'thu-vien-cat',
                                                            'field' => 'term_id',
                                                            'terms' => $term,
                                                        )
                                                    )
                                                ];
                                                $wp_query = new WP_Query($args);
                                                if ($wp_query->have_posts()) { $i; ?>
                                                    <?php while ($wp_query->have_posts()) {
                                                        $wp_query-> the_post(); $i++; ?>

                                                        <?php if ($i % 3 == 1) { ?>
                                                            <ul class="groups-box">
                                                        <?php } ?>

                                                            
                                                            <?php //load file tương ứng với post format
                                                            get_template_part('template-parts/thu-vien/content', ''); ?>

                                                        <?php if ($i % 3 == 0) { ?>
                                                            </ul>
                                                        <?php } ?>

                                                    <?php } ?>
                                                <?php } else {
                                                    get_template_part('template-parts/content', 'none');
                                                }
                                                // reset post data
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    <?php } ?>

                                    <div class="module_button">
                                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" title="" class="btn">
                                            <?php echo __('Xem thêm'); ?>
                                        </a>
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
