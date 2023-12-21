<?php
	/*
	Template Name: Mẫu Tin tức
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
?>

<?php get_template_part("resources/views/page-banner"); ?>

<section class="b2 spage" style="background: url(<?php echo asset('images/bg2.png'); ?>) no-repeat center top; background-size: cover;">
    <div class="container">
        <div class="row blog-row">

            <?php
                $query = query_post_by_custompost_paged('post', 9);
                $max_num_pages = $query->max_num_pages;

                if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();
            ?>

                <?php get_template_part('resources/views/content/category-post', get_post_format()); ?>

            <?php endwhile; wp_reset_postdata(); else: echo ''; endif; ?>

        </div>

        <!--pagination-->
        <?php echo paginationCustom( $max_num_pages ); ?>
    </div>
</section>

<?php get_footer(); ?>