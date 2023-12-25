<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main-site main-page main-blog-details">
    <section class="lth-section lth-blog-details">
         <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="module module__header">
                        <div class="module_title">
                            <h1 class="title"><?php the_title(); ?></h1>

                            <ul class="post-meta">
                                <li>
                                    <i class="icofont-clock-time icon"></i>
                                    <?php the_time('d/m/Y'); ?>
                                </li>
                                <li>
                                    <i class="icofont-eye icon"></i>
                                    <?php echo getPostViews(get_the_ID()); ?>
                                </li>
                                <li class="iframe">
                                    <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>" width="60" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>%2Fdocs%2Fplugins%2F&layout=button&size=small&appId=897190940472200&width=76&height=20" width="76" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="module module_blog_details"> 
                        <div class="module_content">
                            <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        get_template_part('template-parts/post/content', 'single');
                                    }
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                            ?>
                        </div>
                    </div>

                    <div class="lth-section lth-blogs">
                        <div class="module module__header">
                            <div class="module_title">
                                <h2 class="title"><?php echo __('Tin cùng chuyên mục'); ?></h2>
                            </div>
                        </div>

                        <div class="module module_blogs">
                            <div class="module_content">
                                <div class="groups-box">
                                    <?php $id = get_queried_object_id();
                                        $cates = [];
                                        $terms=get_the_category($id);
                                        foreach($terms as $term){
                                            $cat_term_id = $term->term_id;

                                            $cates[$term->term_id] = $cat_term_id;
                                        }

                                        foreach ($cates as $kg) {
                                            $kq .= $kg . ' ';
                                        }

                                        $args = [
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 16,
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                            'post__not_in' => array($id),
                                            'cat' => $kq,

                                        ];
                                        $tets = new WP_Query($args);
                                        if ($tets->have_posts()) { ?>
                                            <?php while ($tets->have_posts()) {
                                                $tets-> the_post(); ?>

                                                <div class="item">
                                                    <article class="post-box">
                                                        <div class="post-content">
                                                            <h3 class="post-name">
                                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                                    <?php the_title(); ?>
                                                                </a>           
                                                            </h3>

                                                            <ul class="post-meta">
                                                                <li>
                                                                    <i class="icofont-clock-time icon"></i>
                                                                    <?php the_time('d/m/Y'); ?>
                                                                </li>
                                                                <li>
                                                                    <i class="icofont-eye icon"></i>
                                                                    <?php echo getPostViews(get_the_ID()); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </article>
                                                </div>
                                            <?php } ?>
                                        <?php } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-box blogs-list-box">
                        <?php if (is_active_sidebar('sidebar_single_blog')) {
                            dynamic_sidebar('sidebar_single_blog');
                        } ?>                     
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 
