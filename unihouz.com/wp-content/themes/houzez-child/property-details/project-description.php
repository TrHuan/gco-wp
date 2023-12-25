<script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/js/readmore.js"></script>
<div class="project-description-wrap" id="project-detail-wrap">
	<div class="block-title-wrap">
		<h2><?php esc_html_e('Giới thiệu', 'houzez'); ?></h2>
	</div>
	<div class="block-content-wrap project-description">
		<?php the_content(); ?>
		<script>
			jQuery('.project-description').readmore({
				speed: 500,
				collapsedHeight: 155,
				moreLink: '<div class="read-full"><a href="#" class="read-more">Xem thêm <i class="fa fa-angle-down"></i></a></div>',
				lessLink: '<div class="read-full"><a href="#" class="read-less">Thu gọn <i class="fa fa-angle-up"></i></a></div>'
			});
		</script>
	</div>
</div>