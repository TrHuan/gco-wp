<?php
/**
 * Template Name: Page Services
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>
<main class="main main-page main-services">
    <section class="lth-services">
        <div class="container">
            <div class="row">
                <?php
                    $sidebar = get_field('page_services', 'option');
                    $select = $sidebar['sidebar'];
                ?>
                <?php if ($select) { ?>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <?php } else { ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php } ?>
                    <div class="module module_posts services-list"> 
                        <div class="module_content">
                            <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $args = [
                                    'post_type' => 'thiet-ke',
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
                                            get_template_part('template-parts/service/content', '');
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

                <?php if ($select) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <aside class="sidebars">
                            <?php
                                if (is_active_sidebar('sidebar_service')) {
                                    dynamic_sidebar('sidebar_service');
                                }
                            ?>
                        </aside>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>    

    <?php get_template_part('templates/addons/sogan_page_services', ''); ?>
</main>

<?php get_footer(); ?>
