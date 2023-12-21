<?php get_header(); ?>

<?php
$post_id = get_the_ID();

$get_category = get_the_category($post_id);
foreach ($get_category as $get_category_kq) {
	$cat_id   = $get_category_kq->term_id;
}
$cat_name = get_cat_name($cat_id);

//info post
$single_post_title 		= get_the_title($post_id);
$single_post_date 		= get_the_date('d/m/Y', $post_id);
$single_post_link 		= get_permalink($post_id);
$single_post_image 		= getPostImage($post_id, "full");
$single_post_excerpt 	= get_the_excerpt($post_id);
$single_recent_author 	= get_user_by('ID', get_post_field('post_author', get_the_author()));
// $single_post_author 	= $single_recent_author->display_name;
$single_post_tag 		= get_the_tags($post_id);

//banner
$data_page_banner  = array(
	'image_alt'    =>    $cat_name
);
?>

<?php get_template_part("resources/views/page-banner"); ?>

<section class="b2 spage" style="background: url(<?php echo asset('images/bg2.png'); ?>) no-repeat center top; background-size: cover;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="bdetail">
					<h1 class="f2 bold text-center s30 pb-5 bdetail-tit"><?php echo $single_post_title; ?></h1>

					<div class="wp-editor-fix">
						<?php the_content(); ?>
					</div>
				</div>

				<!-- socical-bar -->
				<?php get_template_part("resources/views/socical-bar"); ?>

				<?php if (!empty(get_next_post()) || !empty(get_previous_post())) : ?>
					<div class="post-next-prev">
						<div class="groups-box">
							<?php if (get_previous_post()) : $previous_id = get_previous_post()->ID; ?>
								<div class="item">
									<div class="post-prev-content post-next-prev-content">
										<!-- <span><?php //echo __('Bài viết trước'); 
													?></span> -->
										<a href="<?php echo get_the_permalink($previous_id); ?>"><?php echo get_the_title($previous_id); ?></a>
									</div>
								</div>
							<?php endif; ?>

							<?php if (get_next_post()) : $next_id = get_next_post()->ID; ?>
								<div class="item">
									<div class="post-next-content post-next-prev-content">
										<!-- <span><?php //echo __('Bài viết tiếp'); 
													?></span> -->
										<a href="<?php echo get_the_permalink($next_id); ?>"><?php echo get_the_title($next_id); ?></a>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<!-- related-post -->
				<?php get_template_part("resources/views/template-related-post"); ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>