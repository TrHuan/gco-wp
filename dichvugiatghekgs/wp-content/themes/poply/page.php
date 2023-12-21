<?php get_header(); ?>

<?php
	$page_id       = get_the_ID();
	$page_name     = get_the_title();
	$page_content  = get_the_content(); //woo phải dùng the_content()

	//banner
    $data_page_banner  = array(
        'image_alt'    =>    $page_name
    );
?>

<?php get_template_part("resources/views/page-banner"); ?>

<section class="b2 spage" style="background: url(<?php echo asset('images/bg2.png'); ?>) no-repeat center top; background-size: cover;">
    <div class="container">
        <h1 class="f2 bold s30 mb-5 text-center about-tit"><?php echo $page_name; ?></h1>

		<div class="wp-editor-fix">
            <?php the_content(); ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>