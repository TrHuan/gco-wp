<?php
/**
 * Template Name: Page Project
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-categories.php'); ?>

<main class="main-site main-page main-posts">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-projects">
                <div class="container-fuild">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module__projects module__projects__list module__banners">
                                <div class="module__content">
                                    <?php
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                        $args = [
                                            'post_type' => 'project',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 4,
                                            'paged' => $paged,
                                        ];
                                        $wp_query = new WP_Query($args);
                                        if ($wp_query->have_posts()) { $i; ?>
                                            <?php while ($wp_query->have_posts()) {
                                                $wp_query-> the_post(); $i++; ?>
                                                <div class="item lth-banners <?php if ($i%2!=0) { ?>style-06<?php } else { ?>style-07<?php } ?>">
                                                    <div class="content-box groups-box">
                                                        <?php if (has_post_thumbnail()) { ?>
                                                            <div class="content-image">
                                                                <div class="image">
                                                                    <a class="post-link" href="<?php the_permalink(); ?>">
                                                                        <img src="<?php echo lth_custom_img('full', 792, 530); ?>" alt="<?php the_title(); ?>" width="480" height="320">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                        <div class="content">
                                                            <h4 class="content-name"> 
                                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                                    <?php the_title(); ?>
                                                                </a>  
                                                            </h4>
                                                            <div class="content-excerpt">
                                                                <?php the_excerpt(); ?>
                                                            </div>

                                                            <div class="content-date">
                                                                <p class="date-month">
                                                                    <span><?php the_time('d'); ?></span>
                                                                    <span><?php the_time('m'); ?></span>
                                                                </p>
                                                                <p class="year"><?php the_time('y'); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
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
                
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module__content">
                                <?php require_once(LIBS_DIR . '/paginations/pagination.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>   
            </article>

            <article class="lth-contacts">
                <div class="container">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module__contacts">
                                <div class="title-box">
                                    <h3 class="title"><?php echo __('Liên hệ với chúng tôi'); ?></h3>
                                    <?php 
                                        $description_form_contact = get_field('description_form_contact'); 
                                        if ($description_form_contact) { 
                                    ?>
                                        <p><?php echo $description_form_contact; ?></p>
                                    <?php }?>
                                </div>

                                <div class="content-box">
                                    <?php echo do_shortcode('[contact-form-7 id="656" title="Liên hệ với chúng tôi"]') ?>
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
