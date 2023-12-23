<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-abouts">
    <section class="lth-abouts">
        <div class="container-fluid">
            <div class="row">
                <?php if( have_rows('introduce') ): ?>
                    <?php while( have_rows('introduce') ): the_row(); ?>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="module module_abouts"> 
                                <div class="module_content">
                                    <h1 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h1>
                                    <div class="content">
                                        <?php the_sub_field('content'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="module module_abouts"> 
                                <div class="module_image">
                                    <?php if (get_sub_field('image')) { ?>
                                        <div class="image">
                                            <img src="<?php the_sub_field('image'); ?>" alt="Banner" width="1920" height="1080">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="lth-abouts lth-all-food">
        <div class="container-fluid">
            <div class="row">
                <?php if( have_rows('all_food') ): ?>
                    <?php while( have_rows('all_food') ): the_row(); ?>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="module module_abouts"> 
                                <div class="module_image">
                                    <?php if (get_sub_field('image')) { ?>
                                        <div class="image">
                                            <img src="<?php the_sub_field('image'); ?>" alt="Banner" width="1920" height="1080">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="module module_abouts"> 
                                <div class="module_content">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                    <div class="content">
                                        <?php the_sub_field('content'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="lth-abouts lth-home-always-cozy">
        <div class="container-fluid">
            <div class="row">
                <?php if( have_rows('home_is_always_cozy') ): ?>
                    <?php while( have_rows('home_is_always_cozy') ): the_row(); ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module_abouts"> 
                                <div class="module_image">
                                    <?php if (get_sub_field('image')) { ?>
                                        <div class="image">
                                            <img src="<?php the_sub_field('image'); ?>" alt="Banner" width="1920" height="1080">
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="module_content">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                    <div class="content">
                                        <?php the_sub_field('content'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="lth-testimonials">
        <div class="container">
            <div class="row">
                <?php if( have_rows('testimonials') ): ?>
                    <?php while( have_rows('testimonials') ): the_row(); ?>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <div class="module module_evaluate">
                                <div class="module_content">
                                    <ul>
                                        <?php if( have_rows('evaluate') ): ?>
                                            <?php while( have_rows('evaluate') ): the_row(); ?>
                                                <?php
                                                    $title_2 = get_sub_field('title');
                                                    $logo = get_sub_field('logo');
                                                    $point = get_sub_field('point');
                                                    $star = get_sub_field('star');
                                                ?>
                                                <li>
                                                    <p class="name">
                                                        <img src="<?php echo $logo; ?>" alt="<?php echo $title_2; ?>">
                                                        <span><?php echo $title_2; ?></span>
                                                    </p>
                                                    <p class="point">
                                                        <span><?php echo $point; ?></span>
                                                    </p>
                                                    <p class="star">
                                                        <span style="overflow: hidden; white-space: nowrap; display: inline-block;">
                                                            <?php if ($star >= 1) { ?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star.png" alt="Star">
                                                            <?php } ?>
                                                            <?php if (2 > $star && $star > 1) { ?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star-2.png" alt="Star">
                                                            <?php } ?>
                                                            <?php if ($star >= 2) { ?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star.png" alt="Star">
                                                            <?php } ?>
                                                            <?php if (3 > $star && $star > 2) { ?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star-2.png" alt="Star">
                                                            <?php } ?>
                                                            <?php if ($star >= 3) { ?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star.png" alt="Star">
                                                            <?php } ?>
                                                            <?php if (4 > $star && $star > 3) { ?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star-2.png" alt="Star">
                                                            <?php } ?>
                                                            <?php if ($star >= 4) { ?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star.png" alt="Star">
                                                            <?php } ?>
                                                            <?php if (5 > $star && $star > 4) { ?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star-2.png" alt="Star">
                                                            <?php } ?>
                                                            <?php if ($star >= 5) { ?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star.png" alt="Star">
                                                            <?php } ?>
                                                        </span>
                                                    </p>
                                                </li>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="module module-post module_evaluate">
                                <div class="module_title">
                                    <h2 class="title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                </div>

                                <div class="module_content">
                                    <?php
                                        $args = [
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 6,
                                        ];
                                        $wp_query = new WP_Query($args);
                                        if ($wp_query->have_posts()) { ?>

                                            <div class="slick-slider slick-evaluate">

                                                <?php while ($wp_query->have_posts()) {
                                                    $wp_query-> the_post(); ?>
                                                    <div class="item">
                                                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                            <?php
                                                                $brands = get_field('brands');
                                                                $brands_name = $brands['name'];
                                                                $brands_logo = $brands['logo'];
                                                                $url_link_post = $brands['url_link_post'];

                                                                if ($url_link_post) {
                                                                    $hr = $url_link_post;
                                                                } else {
                                                                    $hr = get_the_permalink();
                                                                }
                                                            ?>

                                                            <?php if (has_post_thumbnail()) { ?>
                                                                <div class="post-image">
                                                                    <a href="<?php echo $hr; ?>" title="" class="image">
                                                                        <img src="<?php echo lth_custom_img('full', 283, 212);?>" alt="<?php the_title(); ?>" width="283" height="212">
                                                                    </a>
                                                                </div>
                                                            <?php } ?>

                                                            <div class="post-content">
                                                                <div class="post-brand">
                                                                    <img src="<?php echo $brands_logo; ?>" alt="<?php echo $brands_name; ?>">
                                                                </div>   

                                                                <h3 class="post-name">
                                                                    <a href="<?php echo $hr; ?>" title="<?php the_title(); ?>">
                                                                        <?php the_title(); ?>
                                                                    </a>            
                                                                </h3>

                                                                <div class="post-excerpt">
                                                                    <?php the_excerpt(); ?>
                                                                </div>   

                                                                <div class="post-btn">
                                                                    <a href="<?php echo $hr; ?>" title="" class="btn">
                                                                        <?php echo __('Đọc bài báo'); ?>
                                                                    </a>
                                                                </div>   
                                                            </div>
                                                        </article>
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
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <?php $args = [
                    'post_type' => 'testimonial',
                    'post_status' => 'publish',
                    // 'order_by' => 'rand',
                    // 'order' => 'ASC',
                    'posts_per_page' => 1,
                ];
                $tets = new WP_Query($args);
                if ($tets->have_posts()) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="module module_testimonial module-left">
                            <?php while ($tets->have_posts()) {
                                $tets-> the_post(); ?>

                                <?php get_template_part('template-parts/testimonial/content', ''); ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <?php
                    $args = [
                        'post_type' => 'testimonial',
                        'post_status' => 'publish',
                        // 'order_by' => 'rand',
                        // 'order' => 'ASC',
                        'posts_per_page' => 9,
                    ];
                    $tets = new WP_Query($args);
                    if ($tets->have_posts()) {  $i; ?>
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="module module_testimonial module-right">
                                <?php while ($tets->have_posts()) {
                                    $tets-> the_post(); $i++; ?>
                                    
                                    <?php if ($i != '1') { ?>
                                        <?php get_template_part('template-parts/testimonial/content', ''); ?>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } else {
                        get_template_part('template-parts/content', 'none');
                    }
                    // reset post data
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
