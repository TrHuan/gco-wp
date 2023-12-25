<?php
/**
 * Template Name: Trang Tin Tức
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <section class="blog">
        <div class="container">
            <?php if( have_rows('page_blogs','option') ): ?>  
                <?php while( have_rows('page_blogs','option') ): the_row(); ?>
                    <?php 
                    $terms = get_sub_field('categories');
                    if( $terms ): ?>
                        <ul class="nav nav-pills justify-content-lg-center mb-5 beauty-tabs" role="tablist">
                            <?php foreach( $terms as $term ): ?>
                                <li class="nav-item">
                                    <a class="" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                                        <?php echo esc_html( $term->name ); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <div class="row blog-row">
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = [
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => $posts_per_page,
                        'paged' => $paged,
                    ];
                    $wp_query = new WP_Query($args);
                    if ($wp_query->have_posts()) { 
                        while ($wp_query->have_posts()) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <?php $wp_query-> the_post();
                                    //load file tương ứng với post format
                                    get_template_part('template-parts/post/content', '');
                                ?>
                            </div>
                        <?php } ?>
                        
                        <?php require_once(LIBS_DIR . '/pagination.php');
                    } else {
                        get_template_part('template-parts/content', 'none');
                    }
                    // reset post data
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
