<?php
/**
 * Template Name: Trang Tin Tức
 * 
 * @author LTH
 * @since 2020
 */
get_header();
$term = get_queried_object(); ?>


<?php
    if ( wp_is_mobile() ) { ?>
        <main class="main main-page main-blogs list-news__pages">
            <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

            <section class="container tops-category__news mb-25s">
                <ul class="list-category__news">
                    <?php
                    $args = array(
                        'type'      => 'post',
                        'child_of'  => 0,
                        'parent'    => '',
                        // 'parent'    => 0,
                        'hide_empty'=> 1,
                    );
                    $categories = get_categories( $args );
                    foreach ( $categories as $category ) {
                    $image = get_field('image', $category); ?>                 
                        <li>
                            <div class="items-category__news">
                                <?php if ($image) { ?>
                                    <a title="" href="<?php echo get_term_link($category->slug, 'category');?>" class="img-category__news"><img alt="<?php echo $category->name ; ?>" src="<?php echo $image; ?>"></a>
                                <?php } ?>
                                <h3> <a title="" href="<?php echo get_term_link($category->slug, 'category');?>" class="name-category__news"><?php echo $category->name ; ?></a></h3>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </section>

            <section class="content-news__pages" style="padding-bottom: 40px;">
                <div class="container">
                    <h2 class="titles-md__alls fs-16s mb-15s"><?php the_title(); ?></h2>

                    <ul class="list-news__pages mb-30s">
                        <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                            $args = [
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_per_page,
                                'paged' => $paged,
                            ];
                            $wp_query = new WP_Query($args);
                            if ($wp_query->have_posts()) { ?>                        

                                <?php while ($wp_query->have_posts()) {
                                    $wp_query-> the_post(); ?>
                                    <li>
                                        <?php //load file tương ứng với post format
                                        get_template_part('template-parts/post/content', 'list'); ?>
                                    </li>
                                <?php } ?>
                                
                                <?php 
                            } else {
                                get_template_part('template-parts/content', 'none');
                            }
                            // reset post data
                            wp_reset_postdata();
                        ?>
                    </ul>
                    <?php require_once(LIBS_DIR . '/pagination-blog.php'); ?>
                </div>
            </section>
        </main>
    <?php } else { ?>
        <main class="main main-page main-blogs">
            <section class="lth-blogs">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module_posts posts-list">
                                <div class="module_title">
                                    <h1 class="title">
                                        <?php echo __('Tin tức'); ?>
                                    </h1>
                                </div>

                                <div class="module_content">
                                    <?php
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                        $args = [
                                            'post_type' => 'post',
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
                                                    get_template_part('template-parts/desktop/post/content', '');
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
                    </div>
                </div>
            </section>
        </main>
    <?php }
?>


<?php get_footer(); ?>
