<div class="logo-box" style="max-width: 230px; padding: 5px 15px;">
	<?php $logo = get_field('logo', 'option'); ?>

	<?php if ($logo) { ?>
		<a href="<?php echo HOME_URI; ?>">
			<img src="<?php echo $logo; ?>" alt="Logo" width="200" height="88">
		</a>
	<?php } else { ?>
		<h2 class="logo-box">
	        <a href="<?php echo HOME_URI; ?>" title="" class="title"><?php bloginfo('title'); ?></a>
	        <p><?php bloginfo('description'); ?></p>
	    </h2>
	<?php } ?>
</div>