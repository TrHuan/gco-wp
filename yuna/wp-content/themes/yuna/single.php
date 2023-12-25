<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header();

?>

<style type="text/css">
    .blog {
        padding: 40px 0px 20px;
    }
    .bdetail-wrap {
        border-bottom: 1px solid #d1d1d1;
    }
    .bdetail-wrap img {
        margin: 0 auto 18px;
    }
    .bdetail-wrap p {
        padding-bottom: 30px;
    }
    .bdetail-re {
        padding-bottom: 50px;
    }
    .bdetail-re-item {
        margin-top: 20px;
    }
    .bdetail-re-content h2 {
        padding: 15px 0px 10px;
    }
    .bdetail-re-item-img {
        border-radius: 4px;
        overflow: hidden;
    }
</style>

<main class="main-site main-blog-single">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <section class="blog">
        <div class="container">
            <h1 class="s24 pb-2 text-center"><?php the_title(); ?></h1>
            <time datetime="2018-08-05" class="s15 text-center t9 pt-1 pb-4 d-block"><?php the_time('d'); ?> - <?php the_time('F'); ?> - <?php the_time('Y'); ?> | <?php echo __('By'); ?> <strong><?php the_author(); ?></strong></time>

            <div class="text-center">
                <img src="<?php echo lth_custom_img('full', 1124, 533);?>" alt="<?php the_title(); ?>" width="1124" height="533">
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bdetail-wrap">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php $id = get_queried_object_id();

                        $wpseo_primary_term = new WPSEO_Primary_Term( 'category', $id );
                        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                        $term = get_term( $wpseo_primary_term );

                        $args = [
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 2,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post__not_in' => array($id),
                            'cat' => $kq,

                        ];
                        $tets = new WP_Query($args);
                        if ($tets->have_posts()) { ?>
                            <div class="bdetail-re">
                                <?php while ($tets->have_posts()) {
                                    $tets-> the_post(); ?>

                                    <div class="bdetail-re-item">
                                        <div class="row">
                                            <?php if (has_post_thumbnail()) { ?>
                                             <div class="col-sm-4 text-center">
                                                <div class="bdetail-re-item-img">
                                                    <a href="<?php the_permalink(); ?>" title="">
                                                        <img src="<?php echo lth_custom_img('full', 269, 162);?>" alt="<?php the_title(); ?>" width="269" height="162">
                                                    </a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="col-sm-8">
                                                <div class="bdetail-re-content">
                                                    <h2 class="s18 medium">
                                                        <a href="<?php the_permalink(); ?>" title="">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h2>

                                                    <div class="t9 bdetail-re-item-content">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } 
                    ?>
                </div>
            </div>
        </div>
    </section> 
</main>

<?php get_footer(); ?> 
