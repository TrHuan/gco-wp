<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header();
$term = get_queried_object(); ?>

<main class="main main-page main-blogs">
    <?php //require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <?php $style = get_field('style', $term);

    if ($style == 'style_01') { ?>
        <?php $categories=get_categories(
            array( 'parent' => $term->term_id )
        );
        if ($categories) { ?>
            <div class="module_header title-box title-page">
                <h1 class="title">
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
                </h1>            
            </div>

            <section class="lth-categories" style="margin-top: 0;">
                <div class="container">
                    <div class="module module_categories">
                        <div class="module_content">
                            <div>
                                <div class="row">
                                    <?php foreach ($categories as $cat) {
                                    $image = get_field('image', $cat); ?>
                                        <div class="item">
                                            <div class="border-dot">
                                                <div class="content category">
                                                    <div class="content-header">
                                                        <div class="content-image">
                                                            <a href="<?php echo esc_url(get_category_link($cat->cat_ID)); ?>">
                                                                <img src="<?php echo $image; ?>" alt="<?php echo $cat->name; ?>">
                                                            </a>
                                                        </div>
                                                        <div class="content-box">
                                                            <h3 class="content-name">
                                                                <a href="<?php echo esc_url(get_category_link($cat->cat_ID)); ?>">
                                                                    <?php echo $cat->name; ?>
                                                                </a>
                                                            </h3>
                                                            <div class="content-excerpt">
                                                                <?php echo wpautop($cat->description); ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="content-footer">
                                                        <a href="<?php echo esc_url(get_category_link($cat->cat_ID)); ?>" title="" class="btn"><?php echo __('Xem thêm'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else { ?>
            <div class="module_header title-box title-cat">
                <div class="cat-bg">
                    <img src="<?php echo ASSETS_URI; ?>/images/bg-4.jpg" alt="Bg">
                </div>
                <h1 class="title">
                    <?php $image = get_field('image', $term); ?>
                    <img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>">
                    <?php single_cat_title(); ?>    
                </h1>            
            </div>

            <section class="lth-blogs blog-list">
                <div class="container">        
                    <div class="module module_blogs">
                        <div class="module_content">
                            <div class="row">                
                                <?php
                                    if (have_posts()) { ?>
                                        <?php while (have_posts()) {
                                            the_post(); ?>
                                             <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <?php get_template_part('template-parts/post/content', ''); ?>
                                            </div>
                                        <?php } ?>

                                        <?php require_once(LIBS_DIR . '/pagination.php');
                                    } else {
                                        get_template_part('template-parts/content', 'none');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php $add_page = get_field('add_page', $term);

        if ($add_page) {
            $args = new WP_Query(array(
                'post_type'      => 'page',
                'posts_per_page' => 1,
                'name'  => $add_page->post_name,
            ));
            while ($args->have_posts()) : $args->the_post();
                the_content();
            endwhile; wp_reset_query();
        } ?>
    <?php } else { ?>
        <div class="module_header title-box title-page">
            <h1 class="title">
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
            </h1>            
        </div>

        <?php $categories=get_categories(
            array( 'parent' => $term->term_id )
        );
        if ($categories) { ?>
            <?php $i; foreach ($categories as $cat) { $i++; ?>
                <section class="lth-blogs blog-list  <?php if ($i % 2 == 0) { ?>blog-list-2<?php } ?>">
                    <div class="container">        
                        <div class="module module_blogs">
                            <div class="module_header title-box">
                                <h2 class="title">
                                    <a href="<?php echo esc_url(get_category_link($cat->cat_ID)); ?>" title="">
                                        <?php echo $cat->name; ?>
                                    </a>
                                </h2>
                            </div>

                            <div class="module_content">
                                <?php
                                    $args = [
                                        'post_type' => 'post',
                                        'post_status' => 'publish',
                                        'category_name' => $cat->name,
                                        'posts_per_page' => 6,
                                        // 'orderby' => $attributes['orderby'],
                                        // 'order' => $attributes['order'],
                                    ];
                                    $wp_query = new WP_Query($args);
                                    if ($wp_query->have_posts()) { ?>

                                        <div class="row">
                                            <?php while ($wp_query->have_posts()) {
                                                $wp_query-> the_post(); ?>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <?php //load file tương ứng với post format
                                                        get_template_part('template-parts/post/content', '2');
                                                    ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } else {
                                        get_template_part('template-parts/content', 'none');
                                    }
                                    // reset post data
                                    wp_reset_postdata();
                                ?>       
                            </div>

                            <?php if ($i > 6) { ?>
                                <div class="module_button">
                                    <a href="<?php echo esc_url(get_category_link($cat->cat_ID)); ?>" class="btn">
                                        <?php echo __('Xem tất cả'); ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php } else { ?>
            <section class="lth-blogs blog-list blog-list-2" style="padding-top: 0;">
                <div class="container">        
                    <div class="module module_blogs">
                        <div class="module_content">
                            <div class="row">                
                                <?php
                                    if (have_posts()) { ?>
                                        <?php while (have_posts()) {
                                            the_post(); ?>
                                             <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <?php get_template_part('template-parts/post/content', '2'); ?>
                                            </div>
                                        <?php } ?>

                                        <?php require_once(LIBS_DIR . '/pagination.php');
                                    } else {
                                        get_template_part('template-parts/content', 'none');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?>
</main>

<?php get_footer(); ?>
