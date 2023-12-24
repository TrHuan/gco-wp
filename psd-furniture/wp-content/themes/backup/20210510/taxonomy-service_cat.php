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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module__services module__handbooks module__services__list">
                                <div class="module__content groups-box">
                                    
                                        <?php
                                            $term_id = get_queried_object()->term_id;
                                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                             
                                            $args = array(
                                                'post_type' => 'service',
                                                'post_status' => 'publish',
                                                'posts_per_page' => $posts_per_page,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'service_cat',
                                                        'field'    => 'id',
                                                        'terms'    => $term_id,
                                                    ),
                                                ),
                                                'paged' => $paged,
                                            );

                                            $terms = get_terms( array(
                                                'taxonomy' => 'service_cat',
                                                'hide_empty' => false,
                                            ) );

                                            the_field('top_content_block', $terms);

                                            $wp_query = new WP_Query($args);
                                            if ($wp_query->have_posts()) { ?>
                                                <?php while ($wp_query->have_posts()) {
                                                    $wp_query-> the_post(); ?>

                                                    <div class="item">
                                                        <div class="content-box">
                                                            <?php if (has_post_thumbnail()) { ?>
                                                                <div class="content-image">
                                                                    <div class="image">
                                                                        <a class="post-link" href="<?php the_permalink(); ?>">
                                                                            <img src="<?php echo lth_custom_img('full', 480, 320); ?>" alt="<?php the_title(); ?>" width="480" height="320">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>

                                                            <div class="content">
                                                                <h4 class="content-name">
                                                                    <a class="post-link" href="<?php the_permalink(); ?>">
                                                                        <?php the_title(); ?>
                                                                    </a>
                                                                </h4>
                                                                <div class="content-excerpt">
                                                                    <?php the_excerpt(); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                <?php } wp_reset_postdata(); ?>

                                            <?php } else { ?> 
                                                <?php get_template_part('template-parts/content', 'none'); ?>
                                            <?php } 
                                        ?>
                                    
                                </div>

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
                                    <?php echo do_shortcode('[contact-form-7 id="666" title="Liên hệ với chúng tôi 2"]') ?>
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