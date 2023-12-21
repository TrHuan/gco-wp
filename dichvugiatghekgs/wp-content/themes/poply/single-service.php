<?php get_header(); ?>

<?php
$service_id = get_the_ID();

// info service
$single_service_title       = get_the_title($service_id);
$single_service_date        = get_the_date('d/m/Y', $service_id);
$single_service_link        = get_permalink($service_id);
$single_service_image       = getPostImage($service_id, "full");
$single_service_excerpt     = get_the_excerpt($service_id);
$single_recent_author       = get_user_by('ID', get_post_field('post_author', get_the_author()));
// $single_service_author      = $single_recent_author->display_name;
// $single_service_tag         = get_the_tags($service_id);

//banner
$data_page_banner  = array(
    'image_alt'    =>    $single_service_title
);
?>

<?php get_template_part("resources/views/page-banner"); ?>

<section class="b2 spage" style="background: url(<?php echo asset('images/bg4.png'); ?>) no-repeat center top;background-size: contain;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-md-1 order-12">
                <aside class="sdetail-aside">
                    <?php dynamic_sidebar('sidebar-service'); ?>
                </aside>
            </div>

            <div class="col-lg-9 order-md-12 order-1">
                <div class="sdetail-wrap2">
                    <h1 class="s30 f2 bold sdetail-tit"><?php echo $single_service_title; ?></h1>

                    <div class="wp-editor-fix">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>