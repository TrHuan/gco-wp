<?php
/**
 * The template for displaying search results pages
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php
    $breadcrumb_all = get_field('breadcrumb', 'option');
    $img_url = $breadcrumb_all;
?>

<div class="lth-breadcrumbs">
    <?php if ($img_url) { ?>
        <?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-box/breadcrumb-image-box.php'); ?>
    <?php } ?>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="position: initial;">
                <div class="module module__breadcrumbs">
                    <div class="module__content">
                        <div class="title-box">
                            <h1 class="title d-none">
                                <?php echo __('Tìm kiếm'); ?>  
                            </h1>

                            <h2 class="title">
                                <?php echo __('Tìm kiếm'); ?>             
                            </h2>
                        </div>
                        
                        <?php if (!is_home()) : ?>
                            <div class="content-box">
                                <nav class="woocommerce-breadcrumb">
                                    <a href="<?php echo get_option('home'); ?>"><?php echo __('Trang chủ'); ?></a>
                                    <?php echo __('Tìm kiếm'); ?>
                                </nav>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="socials-box">
                        <ul>
                            <?php if( have_rows('socials_breadcrumb', 'option') ): ?> 
                                <?php while( have_rows('socials_breadcrumb', 'option') ): the_row(); ?>
                                    <?php
                                        $title = get_sub_field('title', 'option');
                                        $url = get_sub_field('url', 'option');
                                        $icon_image = get_sub_field('icon_image', 'option');
                                        $icon_class = get_sub_field('icon_class', 'option');
                                    ?>

                                    <li>
                                        <a href="<?php if ($url) {echo $url;} else { echo '#';} ?>" title="" target="_blank">
                                            <?php if ($icon_image || $icon_class) { ?>
                                                <span class="icon">
                                                    <?php if ($icon_image) { ?>
                                                        <img src="<?php echo $icon_image; ?>" alt="Social">
                                                    <?php } else { ?>
                                                        <i class="<?php echo $icon_class; ?>"></i>
                                                    <?php } ?>
                                                </span>
                                            <?php } ?>

                                            <?php if ($title) { ?>
                                                <span class="icon-title"><?php echo $title; ?></span>
                                            <?php } ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="main-site main-page main-searchs">
    <div class="main-container">
        <div class="main-content">
            <article class="lth-searchs">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="searchs-box">
                                <div class="title-box">
                                    <h3 class="title"><?php echo __('Tìm kiếm cho: [ ') . get_search_query() . (' ]'); ?></h3>
                                </div>

                                <div class="module__blogs__list">
                                    <div class="module__content" style="margin-bottom: 30px;">
                                        <h3 style="margin-bottom: 15px;"><?php echo __('Dự án') ?></h3>

                                        <div class="groups-box">
                                            <?php
                                                $s = get_search_query();

                                                $args = [
                                                    'post_type' => 'project',
                                                    'posts_per_page' => 12,
                                                    'orderby' => 'post_date',
                                                    's' => $s,
                                                ];
                                                $wp_query = new WP_Query($args);
                                                if ($wp_query->have_posts()) { ?>
                                                    <?php while ($wp_query->have_posts()) {
                                                        $wp_query-> the_post(); ?>

                                                        <div class="item">
                                                            <?php get_template_part('template-parts/post/content', get_post_format()); ?>
                                                        </div>

                                                    <?php } ?>
                                                <?php } else {
                                                    get_template_part('template-parts/post/content', 'none');
                                                }
                                                // reset post data
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>
                                    <div class="module__content">
                                        <h3 style="margin-bottom: 15px;"><?php echo __('Cẩm nang') ?></h3>
                                        
                                        <div class="groups-box">
                                            <?php
                                                $s = get_search_query();

                                                $args = [
                                                    'post_type' => 'post',
                                                    'posts_per_page' => 12,
                                                    'orderby' => 'post_date',
                                                    's' => $s,
                                                ];
                                                $wp_query = new WP_Query($args);
                                                if ($wp_query->have_posts()) { ?>
                                                    <?php while ($wp_query->have_posts()) {
                                                        $wp_query-> the_post(); ?>

                                                        <div class="item">
                                                            <?php get_template_part('template-parts/post/content', get_post_format()); ?>
                                                        </div>
                                                    <?php } ?>
                                                <?php } else {
                                                    get_template_part('template-parts/post/content', 'none');
                                                }
                                                // reset post data
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</main>

<?php get_footer(); ?>
