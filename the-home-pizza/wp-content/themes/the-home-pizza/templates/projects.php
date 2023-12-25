<?php
/**
 * Template Name: Trang Dự Án
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-projects">
    <section class="lth-projects">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="module module_posts projects-list"> 
                        <div class="module_content">
                            <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $args = [
                                    'post_type' => 'project',
                                    'post_status' => 'publish',
                                    'posts_per_page' => $posts_per_page,
                                    'paged' => $paged,
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
