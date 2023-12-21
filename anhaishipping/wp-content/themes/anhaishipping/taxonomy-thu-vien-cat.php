<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-library">
    <section class="lth-library">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_library library-list">                        
                        <div class="module_title">
                            <h2 class="title">
                                <?php
                                    if (is_category()) {
                                        single_cat_title();  //Category
                                    } elseif (is_author()) {
                                        the_post();
                                        echo ('Archives by author: ' . get_the_author());  //Tác giả
                                        rewind_posts();
                                    } else {
                                        $term = get_queried_object()->term_id;
                                        echo $term_name = get_term( $term )->name;
                                        $term_slug = get_term( $term )->slug;
                                    }
                                ?>
                            </h2>
                        </div>

                        <?php if ($term_slug == 'video') { ?>
                            <div class="module_content module_content_<?php echo $term_slug; ?>">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
