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
    
    <section class="lth-blog-single">
         <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="module module_single post-single"> 
                        <div class="module_content">
                            <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        get_template_part('template-parts/post/content', 'single');
                                    }
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <aside class="sidebars">
                        <?php
                            if (is_active_sidebar('sidebar_single_blog')) {
                                dynamic_sidebar('sidebar_single_blog');
                            }
                        ?>
                    </aside>
                </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    $$cates = [];

    $id = get_queried_object_id();

    $terms = get_the_terms( $post->ID, 'category' );

    if ( $terms && ! is_wp_error( $terms ) ) {
                                 
        foreach ( $terms as $term ) {
            $cat_term_id = $term->term_id;

            $cates[$term->term_id] = $cat_term_id;
        }

    }


    foreach ($cates as $kg) {
        $kq .= $kg . ' ';
    }

    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'post__not_in' => array($id),
        'category' => $kq,
    ];
    $tets = new WP_Query($args);
    if ($tets->have_posts()) { ?> 
    <section class="lth-blogs">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="entry-header">
                        <h2 class="title">
                            <?php echo __('Bài viết liên quan'); ?>
                        </h2>
                    </div>

                    <div class="slick-slider slick-blogs blogs">

                        <?php while ($tets->have_posts()) {
                            $tets-> the_post();
                            //load file tương ứng với post format
                            get_template_part('template-parts/post/content', 'list');
                        } ?>

                    </div>   
                </div>
            </div> 
        </div>    
    </section>
<?php } wp_reset_postdata(); ?>

<?php if (is_active_sidebar('sidebar_blocks_categories')) {
    dynamic_sidebar('sidebar_blocks_categories');
} ?>
</main>

<?php get_footer(); ?> 
