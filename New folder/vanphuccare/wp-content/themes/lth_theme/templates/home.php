<?php
/**
 * Template Name: Trang Chủ
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-home">
    <h1 class="title d-none"><?php the_title(); ?></h1>

    <?php the_content(); ?>
</main>

<?php $i; if( have_rows('popup', 'option') ): ?>
<div class="popups popups-home">
	<div class="popups-box">
		<?php while( have_rows('popup', 'option') ) : the_row(); $i++; ?>
		<div class="popup-box popup-<?php echo $i; ?> <?php if ($i == 2) {echo 'show';} ?>">
			<div class="content-box">
				<?php if ($i == 1) { ?>
				<div class="module_header title-box">
					<h2 class="title">
						<?php echo __('Đăng ký ngay'); ?>
					</h2>
				</div>                                
				<?php } elseif ($i == 2) { ?>
				<!-- <div class="module_header title-box">
<h2 class="title">
<?php //echo __('Chỉ còn 1 tuần duy nhất! Giảm ngay 30%'); ?>
</h2>
</div>   --> 
				<?php } ?>

				<div class="popup-content">
					<?php echo do_shortcode(get_sub_field('content')); ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>                
	</div>
</div>
<?php endif; ?>

<?php get_footer(); ?>
