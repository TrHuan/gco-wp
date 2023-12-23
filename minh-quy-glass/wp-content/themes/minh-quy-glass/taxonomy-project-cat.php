<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-projects">
    <section class="lth-projects">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="module module_projects module_projects_list">       
                        <div class="module_title">
                            <p class="infor"><?php echo __('Dưới đây là những dự án mà Minh Quý Glass đã và đang tham gia triển khai thi công') ?></p>
                        </div>
                                              
                        <!-- <div class="module_title">
                            <h2 class="title"> -->
                                <?php
                                    // if (is_category()) {
                                    //     single_cat_title();  //Category
                                    // } elseif (is_author()) {
                                    //     the_post();
                                    //     echo ('Archives by author: ' . get_the_author());  //Tác giả
                                    //     rewind_posts();
                                    // } else {
                                    //     //echo _('Archives');

                                    //     $term = get_queried_object()->term_id;
                                    //     echo $term_name = get_term( $term )->name;
                                    // }
                                ?>
                            <!-- </h2>
                        </div> -->

                        <div class="module_content">
                            <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $term = get_queried_object()->term_id;

                                $args = [
                                    'post_type' => 'project',
                                    'post_status' => 'publish',
                                    'posts_per_page' => $posts_per_page,
                                    'paged' => $paged,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'project-cat',
                                            'field' => 'term_id',
                                            'terms' => $term
                                        )
                                    )
                                ];
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>

                                    <div class="groups-box">

                                        <?php while ($wp_query->have_posts()) {
                                            $wp_query-> the_post();
                                            //load file tương ứng với post format
                                            get_template_part('template-parts/project/content', '');
                                        } ?>

                                    </div>
                                    
                                    <?php require_once(LIBS_DIR . '/pagination.php');
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata();
                            ?>
                        </div>                   
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <aside class="sidebars">                 
                        <?php
                            if (is_active_sidebar('sidebar_project')) {
                                dynamic_sidebar('sidebar_project');
                            }
                        ?>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
