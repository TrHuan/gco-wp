<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <?php $term = get_queried_object();
    $add_page = get_field('add_page', $term);

    if (!$add_page) {
        $style = get_field('style', $term);
        if ($style == 'style_01') { ?>
            <section class="news-pages">
                <div class="container mb-100s">
                    <h2 class="fs-40s title-after__mains titles-bold__alls text-color__blues mb-40s">
                        <?php
                            if (is_category()) {
                                single_cat_title();  //Category
                            } elseif (is_author()) {
                                the_post();
                                echo ('Archives by author: ' . get_the_author());  //Tác giả
                                rewind_posts();
                            } else {
                                echo _('Archives');
                            }
                        ?>                                    
                    </h2>

                    <?php if (is_active_sidebar('sidebar_blog')) {
                        dynamic_sidebar('sidebar_blog');
                    } ?>

                    <div class="list-news__pages">
                        <h3 class="text-color__blues titles-medium__alls fs-24s mb-30s titles-transform__alls"><?php echo __('Bài viết'); ?></h3>
                        
                        <?php
                            if (have_posts()) { ?>

                                <div class="row mb-50s">

                                    <?php while (have_posts()) {
                                        the_post(); ?>
                                         <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <?php get_template_part('template-parts/post/content', ''); ?>
                                        </div>
                                    <?php } ?>
                                    
                                </div>

                                <?php require_once(LIBS_DIR . '/pagination.php');
                            } else {
                                get_template_part('template-parts/content', 'none');
                            }
                        ?>
                    </div>
                </div>
            </section>
        <?php } else { ?>
            <section class="project-pages">
                <div class="container mb-100s">
                    <h2 class="fs-40s title-after__mains titles-bold__alls text-color__blues mb-40s">
                        <?php
                            if (is_category()) {
                                single_cat_title();  //Category
                            } elseif (is_author()) {
                                the_post();
                                echo ('Archives by author: ' . get_the_author());  //Tác giả
                                rewind_posts();
                            } else {
                                echo _('Archives');
                            }
                        ?>                                    
                    </h2>

                    <?php
                        if (have_posts()) { ?>

                            <div class="row gutter-10 mb-50s">

                                <?php while (have_posts()) {
                                    the_post(); ?>
                                     <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <?php get_template_part('template-parts/project/content', ''); ?>
                                    </div>
                                <?php } ?>
                                
                            </div>

                            <?php require_once(LIBS_DIR . '/pagination.php');
                        } else {
                            get_template_part('template-parts/content', 'none');
                        }
                    ?>
                </div>
                <div class="btn-why__choose">
                    <?php $advise = get_field('advise', $term); ?>
                    <p class="fs-20s mb-30s titles-bold__alls text-color__blues titles-center__alls"><?php echo $advise['title']; ?></p>
                    <ul class="list-btn__choose">
                        <li><a href="#" title="" class="btn-oranges__second"><img src="<?php echo ASSETS_URI; ?>/images/chat-ions-btn.svg" alt=""> <?php echo __('Tư vấn miễn phí'); ?></a></li>
                        <li><a href="#" title="" class="btn-blues__alls"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo __('Gọi báo giá'); ?> <span class="titles-medium__alls"> <?php echo $advise['phone']; ?> </span><?php echo __('( Zalo)'); ?></a></li>
                    </ul>
                </div>
            </section>
        <?php }
    } else {
        $args = new WP_Query(array(
            'post_type'      => 'page',
            'posts_per_page' => 1,
            'name'  => $add_page->post_name,
        ));
        while ($args->have_posts()) : $args->the_post();
            the_content();
        endwhile; wp_reset_query();
    } ?>
</main>

<?php get_footer(); ?>
