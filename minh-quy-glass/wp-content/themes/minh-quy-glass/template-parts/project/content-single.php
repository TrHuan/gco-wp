
<div class="module_title">
	<h1 class="title"><?php the_title(); ?></h1>
</div>

<div class="module_content">
	<div class="content-image">
		<?php $images = get_field('gallery_project'); if( $images ) { ?>	
			<div class="slick-slider slick-project-library-for">
				<?php echo lth_custom_imgs_single_project('full', 936, 554); ?>
			</div>

			<div class="slick-slider slick-project-library-nav">
				<?php echo lth_custom_imgs_single_project('full', 210, 124); ?>
			</div>
		<?php } else { ?>
			<div class="image">
				<img src="<?php echo lth_custom_img('full', 936, 554);?>" alt="<?php the_title(); ?>" width="936" height="554">
			</div>
		<?php } ?>
	</div>

	<div class="content-box">
		<?php the_content(); ?>
	</div>
</div>