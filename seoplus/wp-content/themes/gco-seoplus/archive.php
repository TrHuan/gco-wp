<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-categories.php'); ?>

<main class="main-site main-page main-posts">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="posts-box">
                                <div class="content-box">                                    
                                    <?php
                                    if (have_posts()) { ?>

                                        <div class="groups-box">
                                            <?php while (have_posts()) {
                                                the_post(); ?>

                                                <div class="item">
                                                    <?php
                                                        //load file tương ứng với post format
                                                        get_template_part('template-parts/post/content', get_post_format());
                                                    ?>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <?php require_once(LIBS_DIR . '/paginations/pagination.php');
                                        
                                    } else {
                                        get_template_part('template-parts/post/content', 'none');
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="sidebars">
                                <!-- Sidebar -->
                                <?php if (is_active_sidebar('sidebar_blogs')) { ?>

                                    <aside class="lth-sidebars">
                                        <?php dynamic_sidebar('sidebar_blogs'); ?>
                                    </aside>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <?php
                $page__blogs = get_field('page__blogs', 'option');
                if( $page__blogs ):
                    $select = $page__blogs['show_blogs'];

                    if ($select) {
                        if( have_rows('page__blogs', 'option') ):
                            while( have_rows('page__blogs', 'option') ): the_row();
                                if( have_rows('blogs', 'option') ):
                                    while( have_rows('blogs', 'option') ): the_row();
                                        get_template_part('templates/blogs/related-posts', '');
                                    endwhile;
                                endif;
                            endwhile;
                        endif;
                    }
                endif;
            ?>

            <?php
                $page__blogs = get_field('page__blogs', 'option');
                if( $page__blogs ):
                    $select = $page__blogs['show_products'];

                    if ($select) {
                        if( have_rows('page__blogs', 'option') ):
                            while( have_rows('page__blogs', 'option') ): the_row();
                                if( have_rows('products', 'option') ):
                                    while( have_rows('products', 'option') ): the_row();
                                        get_template_part('woocommerce/product-box/related-products', '');
                                    endwhile;
                                endif;
                            endwhile;
                        endif;
                    }
                endif;
            ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>
