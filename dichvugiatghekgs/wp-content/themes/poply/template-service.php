<?php
	/*
	Template Name: Mẫu Dịch Vụ
	*/
?>

<?php get_header(); ?>

<?php
    $page_id        = get_the_ID();
    $page_name      = get_the_title();
    $page_content   = wpautop(get_the_content());

    //banner
    $data_page_banner  = array(
        'image_alt'    =>    $page_name
    );

    //field
    $service_slide_video = get_field('service_slide_video');
    $service_pdca = get_field('service_pdca');
?>

<?php get_template_part("resources/views/page-banner"); ?>

<section class="b2 spage">
    <div class="container">
        <h1 class="f2 bold s30 mb-5 text-center about-tit"><?php echo $page_name; ?></h1>
        <div class="row">

            <?php
                $query = query_post_by_custompost_paged('service', 6);
                $max_num_pages = $query->max_num_pages;

                if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();
            ?>

                <?php get_template_part('resources/views/content/category-service', get_post_format()); ?>

            <?php endwhile; wp_reset_postdata(); else: echo ''; endif; ?>

        </div>

        <!--pagination-->
        <?php echo paginationCustom( $max_num_pages ); ?>
    </div>
</section>

<section class="cerfi">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="service-video">

					<?php if(!empty( $service_slide_video )) { ?>
					<?php
					    foreach ($service_slide_video as $foreach_kq) {

					    $url_youtube = $foreach_kq["url_youtube"];
					    $image_youtube = $foreach_kq["image_youtube"];
					?>
	                    <div class="service-vitem">
	                        <a data-fancybox="" href="<?php echo $url_youtube; ?>" title="">
	                        	<img src="<?php echo $image_youtube; ?>" alt="">
	                        </a>
	                    </div>
					<?php } ?>
					<?php } ?>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-r">

					<?php if(!empty( $service_pdca )) { ?>
					<?php
					    foreach ($service_pdca as $foreach_kq) {

					    $post_image = $foreach_kq["image"];
					    $post_title = $foreach_kq["title"];
					?>
	                    <div class="d-flex align-items-center about-item">
	                        <img src="<?php echo $post_image; ?>" alt="" class="lazy">
	                        <span class="medium about-item-stit s14"><?php echo $post_title; ?></span>
	                    </div>
					<?php } ?>
					<?php } ?>
					
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>