<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-single">
    <section class="lth-blog-single">
         <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="module module_single blog-single"> 
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

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <aside class="sidebars">
                        <div class="sticky-top">
                            <?php
                                if (is_active_sidebar('sidebar_single_blog')) {
                                    dynamic_sidebar('sidebar_single_blog');
                                }
                            ?>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <?php
        $cates = [];

        $id = get_queried_object_id();

        $terms = get_the_terms( $id, 'category' );

        if ( $terms && ! is_wp_error( $terms ) ) :
                                     
            foreach ( $terms as $term ) {
                $cat_term_id = $term->term_id;

                $cates[$term->term_id] = $cat_term_id;
            }

        endif; 


        foreach ($cates as $kg) {
            // var_dump($kg);
            $kq .= $kg . ' ';
        }

        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order' => 'DESC',
            'post__not_in' => array($id),
            'cat' => $kq,
            // 'tax_query' => array(
            //     array(
            //         'taxonomy' => 'category',
            //         'field' => 'id',
            //         'terms' => $kq,
            //     )
            // ),

        ];
        $wp_query_other = new WP_Query($args);
        if ($wp_query_other->have_posts()) { ?>
        <section class="lth-blogs">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="module module_blogs module_other_blogs"> 
                            <div class="module_title">
                                <h2 class="title"><?php echo __('Bài viết liên quan'); ?></h2>
                            </div>

                            <div class="module_content">

                                <div class="slick-slider slick-blogs">

                                    <?php while ($wp_query_other->have_posts()) {
                                        $wp_query_other-> the_post();
                                        //load file tương ứng với post format
                                        get_template_part('template-parts/post/content', '02');
                                    } ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>                     
        <?php } else {
            //get_template_part('template-parts/content', 'none');
        }
        // reset post data
        wp_reset_postdata();
    ?>
</main>

<?php get_footer(); ?> 
