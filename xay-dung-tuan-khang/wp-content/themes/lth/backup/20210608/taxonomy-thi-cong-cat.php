<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-projects">
    <section class="lth-projects">
        <div class="container">
            <div class="row">
                <?php
                    $sidebar = get_field('page_projects', 'option');
                    $select = $sidebar['sidebar'];
                ?>
                <?php if ($select) { ?>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <?php } else { ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php } ?>
                    <div class="module module_posts projects-list"> 
                        <div class="module_content">
                            <ul class="project-filter project-filter text-center">
                                <?php
                                    $archive_page = get_pages(
                                        array(
                                            'meta_key' => '_wp_page_template',
                                            'meta_value' => 'templates/projects.php'
                                        )
                                    );
                                    $archive_id = $archive_page[0]->ID;
                                ?>
                                <li class="" data-filter=".filter-item">
                                    <a href="<?php echo get_permalink( $archive_id ); ?>"><?php echo __('View All'); ?></a>
                                </li>

                                <?php
                                    $taxonomies = get_terms( array(
                                        'taxonomy' => 'thi-cong-cat',
                                        'hide_empty' => false
                                    ) );

                                    $term_id = get_queried_object()->term_id;
                                     
                                    if ( !empty($taxonomies) ) :
                                        foreach( $taxonomies as $category ) { ?>
                                            <li data-filter=".<?php echo $category->slug; ?>" class="<?php if ($category->term_id == $term_id) {echo 'active';} ?>">
                                                <a href="<?php echo get_term_link( $category ); ?>"><?php echo $category->name; ?> (<?php echo $category->count; ?>)</a>
                                            </li>
                                        <?php }
                                    endif;
                                ?>
                            </ul>

                            <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $term = get_queried_object()->term_id;

                                $args = [
                                    'post_type' => 'thi-cong',
                                    'post_status' => 'publish',
                                    'posts_per_page' => $posts_per_page,
                                    'paged' => $paged,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'thi-cong-cat',
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
                                            get_template_part('template-parts/project/content', 'list');
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
                                if (is_active_sidebar('sidebar_project')) {
                                    dynamic_sidebar('sidebar_project');
                                }
                            ?>
                        </aside>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
